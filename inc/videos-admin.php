<?php
/**
 * 🎬 Videos — the admin screen for the /videos/ library.
 *
 * Built for a non-coder: pick a category, see every video in it as a
 * thumbnail row, remove one with the × on it, and add a new one by
 * pasting a YouTube link. Nothing here edits inc/videos-data.php — the
 * shipped list stays untouched and every change is stored in two
 * options, so a theme update can never wipe the client's work and
 * "remove" is always undoable.
 *
 *   ee_video_extras — videos added here
 *   ee_video_hidden — IDs of shipped videos removed here
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

/** Accepts a full YouTube URL in any of its shapes, or a bare ID. */
function ee_video_parse_id($raw) {
    $raw = trim((string) $raw);
    if ($raw === '') return '';
    if (preg_match('~^[A-Za-z0-9_-]{11}$~', $raw)) return $raw;
    if (preg_match('~(?:v=|youtu\.be/|/embed/|/shorts/|/live/|/v/)([A-Za-z0-9_-]{11})~', $raw, $m)) return $m[1];
    return '';
}

/** Title of the shipped/live category with this slug, for display. */
function ee_video_cat_name($slug) {
    $c = ee_video_category($slug);
    return $c ? $c['name'] : $slug;
}

add_action('admin_menu', function () {
    add_submenu_page('ee-site', 'Videos', '🎬 Videos', 'manage_options', 'ee-videos', 'ee_videos_render_admin');
});

/** Ordered YouTube IDs the admin picked for the home-page carousel.
 *  Empty = the home page falls back to its built-in curated set. */
function ee_home_videos() {
    $v = get_option('ee_home_videos', array());
    return is_array($v) ? array_values(array_filter(array_map('strval', $v))) : array();
}

/* ── home-page toggle ────────────────────────────────────────────────── */
add_action('admin_post_ee_videos_home', function () {
    if (!current_user_can('manage_options')) wp_die('Forbidden');
    check_admin_referer('ee_videos_home');

    $id  = ee_video_parse_id(wp_unslash($_GET['v'] ?? ''));
    $cat = sanitize_title(wp_unslash($_GET['cat'] ?? ''));
    $msg = '';
    if ($id !== '') {
        $sel = ee_home_videos();
        if (in_array($id, $sel, true)) {
            update_option('ee_home_videos', array_values(array_diff($sel, array($id))));
            $msg = 'home_off';
        } elseif (count($sel) >= 12) {
            $msg = 'home_full'; /* the carousel stays sane at a dozen */
        } else {
            $sel[] = $id;
            update_option('ee_home_videos', $sel);
            $msg = 'home_on';
        }
    }
    wp_safe_redirect(add_query_arg(array('page' => 'ee-videos', 'cat' => $cat, 'msg' => $msg), admin_url('admin.php')));
    exit;
});

/* ── add ─────────────────────────────────────────────────────────────── */
add_action('admin_post_ee_videos_add', function () {
    if (!current_user_can('manage_options')) wp_die('Forbidden');
    check_admin_referer('ee_videos_add');

    $id    = ee_video_parse_id(wp_unslash($_POST['url'] ?? ''));
    $title = sanitize_text_field(wp_unslash($_POST['title'] ?? ''));
    $cat   = wp_unslash($_POST['cat'] ?? '');
    $sec   = sanitize_text_field(wp_unslash($_POST['section'] ?? ''));

    /* "__new" is compared before sanitising — sanitize_title('__new')
       returns 'new', which would silently file it under a real slug. */
    if ($cat === '__new') {
        $newName = sanitize_text_field(wp_unslash($_POST['new_cat'] ?? ''));
        $catSlug = sanitize_title($newName);
        $catName = $newName;
    } else {
        $catSlug = sanitize_title($cat);
        $catName = ee_video_cat_name($catSlug);
    }
    if ($sec === '__new') $sec = sanitize_text_field(wp_unslash($_POST['new_section'] ?? ''));

    $err = '';
    if ($id === '')                 $err = 'link';
    elseif ($title === '')          $err = 'title';
    elseif ($catSlug === '')        $err = 'cat';
    else {
        foreach (ee_video_library() as $c) {
            foreach ($c['sections'] as $s) {
                foreach ($s['videos'] as $v) {
                    if ($v[1] === $id) { $err = 'dupe'; break 3; }
                }
            }
        }
    }
    if ($err) {
        wp_safe_redirect(add_query_arg(array('page' => 'ee-videos', 'cat' => $catSlug, 'err' => $err), admin_url('admin.php')));
        exit;
    }

    /* Adding back a video that was removed earlier simply un-hides it. */
    $hidden = ee_video_hidden();
    if (in_array($id, $hidden, true)) {
        update_option('ee_video_hidden', array_values(array_diff($hidden, array($id))));
        wp_safe_redirect(add_query_arg(array('page' => 'ee-videos', 'cat' => $catSlug, 'msg' => 'restored'), admin_url('admin.php')));
        exit;
    }

    $extras   = ee_video_extras();
    $extras[] = array(
        'id'       => $id,
        'title'    => $title,
        'cat'      => $catSlug,
        'cat_name' => $catName,
        'section'  => $sec !== '' ? $sec : 'More videos',
    );
    update_option('ee_video_extras', $extras);
    wp_safe_redirect(add_query_arg(array('page' => 'ee-videos', 'cat' => $catSlug, 'msg' => 'added'), admin_url('admin.php')));
    exit;
});

/* ── remove ──────────────────────────────────────────────────────────── */
add_action('admin_post_ee_videos_remove', function () {
    if (!current_user_can('manage_options')) wp_die('Forbidden');
    check_admin_referer('ee_videos_remove');

    $id  = ee_video_parse_id(wp_unslash($_GET['v'] ?? ''));
    $cat = sanitize_title(wp_unslash($_GET['cat'] ?? ''));
    if ($id !== '') {
        /* An added video is dropped outright; a shipped one is hidden, so
           the Removed list below can put it straight back. */
        $extras = ee_video_extras();
        $kept   = array_values(array_filter($extras, function ($x) use ($id) { return $x['id'] !== $id; }));
        if (count($kept) !== count($extras)) {
            update_option('ee_video_extras', $kept);
        } else {
            $hidden = ee_video_hidden();
            if (!in_array($id, $hidden, true)) { $hidden[] = $id; update_option('ee_video_hidden', $hidden); }
        }
    }
    wp_safe_redirect(add_query_arg(array('page' => 'ee-videos', 'cat' => $cat, 'msg' => 'removed'), admin_url('admin.php')));
    exit;
});

/* ── restore ─────────────────────────────────────────────────────────── */
add_action('admin_post_ee_videos_restore', function () {
    if (!current_user_can('manage_options')) wp_die('Forbidden');
    check_admin_referer('ee_videos_restore');
    $id = ee_video_parse_id(wp_unslash($_GET['v'] ?? ''));
    $hidden = ee_video_hidden();
    if ($id !== '') update_option('ee_video_hidden', array_values(array_diff($hidden, array($id))));
    wp_safe_redirect(add_query_arg(array('page' => 'ee-videos', 'msg' => 'restored'), admin_url('admin.php')));
    exit;
});

/* ── screen ──────────────────────────────────────────────────────────── */
function ee_videos_render_admin() {
    if (!current_user_can('manage_options')) return;

    $lib  = ee_video_library();
    $slug = isset($_GET['cat']) ? sanitize_title(wp_unslash($_GET['cat'])) : '';
    $cat  = $slug ? ee_video_category($slug) : null;
    if (!$cat && $lib) { $cat = $lib[0]; $slug = $cat['slug']; }

    $msg = isset($_GET['msg']) ? sanitize_key($_GET['msg']) : '';
    $err = isset($_GET['err']) ? sanitize_key($_GET['err']) : '';

    /* Removed videos, looked up in the shipped list so we can show a title. */
    $hidden = ee_video_hidden();
    $gone   = array();
    if ($hidden) {
        foreach (ee_video_library_builtin() as $c) {
            foreach ($c['sections'] as $s) {
                foreach ($s['videos'] as $v) {
                    if (in_array($v[1], $hidden, true)) {
                        $gone[] = array('title' => $v[0], 'id' => $v[1], 'cat' => $c['name']);
                    }
                }
            }
        }
    }
    $extraIds = wp_list_pluck(ee_video_extras(), 'id');
    $homeSel  = ee_home_videos();
    ?>
    <div class="wrap ee-vadm">
        <h1>🎬 Videos</h1>
        <p class="ee-vadm-lead">Everything on <a href="<?php echo esc_url(home_url('/videos/')); ?>" target="_blank">/videos/</a>. Pick a category, then add a video by pasting its YouTube link, or remove one with the <strong>×</strong> on its thumbnail. Nothing is ever deleted for good &mdash; removed videos sit at the bottom of this page and can be put back with one click.
        <br>&#11088; The <strong>Home</strong> button on a thumbnail puts that video in the home page&rsquo;s &ldquo;What Our Clients Are Saying&rdquo; carousel, in the order you pick them
        (<strong><?php echo count($homeSel); ?></strong> selected<?php echo $homeSel ? '' : ' &mdash; the home page is showing its default set'; ?>, max 12).</p>

        <?php if ($msg === 'added') : ?><div class="notice notice-success"><p>Video added. <a href="<?php echo esc_url(home_url('/videos/' . $slug . '/')); ?>" target="_blank">See it on the site &rarr;</a></p></div><?php endif; ?>
        <?php if ($msg === 'removed') : ?><div class="notice notice-success"><p>Video removed from the site. You can put it back from <strong>Removed videos</strong> at the bottom of this page.</p></div><?php endif; ?>
        <?php if ($msg === 'restored') : ?><div class="notice notice-success"><p>Video is back on the site.</p></div><?php endif; ?>
        <?php if ($msg === 'home_on') : ?><div class="notice notice-success"><p>Added to the home page carousel. <a href="<?php echo esc_url(home_url('/#stories')); ?>" target="_blank">See the home page &rarr;</a></p></div><?php endif; ?>
        <?php if ($msg === 'home_off') : ?><div class="notice notice-success"><p>Removed from the home page carousel<?php echo ee_home_videos() ? '' : ' &mdash; none selected now, so the home page shows its default set'; ?>.</p></div><?php endif; ?>
        <?php if ($msg === 'home_full') : ?><div class="notice notice-error"><p>The home carousel holds at most <strong>12</strong> videos. Remove one first (click its &#11088; Home button again).</p></div><?php endif; ?>
        <?php if ($err) : ?>
            <div class="notice notice-error"><p><?php
                if ($err === 'link')       echo 'That does not look like a YouTube link. Paste the full link (e.g. https://www.youtube.com/watch?v=XXXXXXXXXXX) or just the 11-character ID.';
                elseif ($err === 'title')  echo 'Please give the video a title &mdash; that is what visitors read under the thumbnail.';
                elseif ($err === 'cat')    echo 'Please choose a category, or type a name for the new one.';
                elseif ($err === 'dupe')   echo 'That video is already in the library.';
                else                       echo 'Something went wrong. Please try again.';
            ?></p></div>
        <?php endif; ?>

        <!-- add -->
        <div class="ee-vadm-card">
            <h2>Add a video</h2>
            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="ee-vadm-add">
                <input type="hidden" name="action" value="ee_videos_add">
                <?php wp_nonce_field('ee_videos_add'); ?>
                <p class="ee-vadm-row">
                    <label>YouTube link<br>
                        <input type="text" name="url" class="regular-text" placeholder="https://www.youtube.com/watch?v=..." required>
                    </label>
                    <label>Title shown on the site<br>
                        <input type="text" name="title" class="regular-text" placeholder="e.g. Customer Success Story: ..." required>
                    </label>
                </p>
                <p class="ee-vadm-row">
                    <label>Category<br>
                        <select name="cat" id="eeVCat">
                            <?php foreach ($lib as $c) : ?>
                                <option value="<?php echo esc_attr($c['slug']); ?>" <?php selected($c['slug'], $slug); ?>><?php echo esc_html($c['name']); ?></option>
                            <?php endforeach; ?>
                            <option value="__new">＋ New category&hellip;</option>
                        </select>
                        <input type="text" name="new_cat" id="eeVCatNew" placeholder="New category name" class="regular-text" style="display:none;margin-top:6px">
                    </label>
                    <label>Section inside that category<br>
                        <select name="section" id="eeVSec">
                            <?php if ($cat) foreach ($cat['sections'] as $s) : ?>
                                <option value="<?php echo esc_attr($s['name']); ?>"><?php echo esc_html($s['name']); ?></option>
                            <?php endforeach; ?>
                            <option value="__new">＋ New section&hellip;</option>
                        </select>
                        <input type="text" name="new_section" id="eeVSecNew" placeholder="New section name" class="regular-text" style="display:none;margin-top:6px">
                    </label>
                </p>
                <?php submit_button('Add video', 'primary', 'submit', false); ?>
                <span class="description" style="margin-left:10px">Sections are the sub-headings on the category page, like &ldquo;University &amp; Colleges&rdquo;.</span>
            </form>
        </div>

        <!-- category tabs -->
        <h2 class="nav-tab-wrapper ee-vadm-tabs">
            <?php foreach ($lib as $c) : ?>
                <a class="nav-tab <?php echo $c['slug'] === $slug ? 'nav-tab-active' : ''; ?>"
                   href="<?php echo esc_url(add_query_arg(array('page' => 'ee-videos', 'cat' => $c['slug']), admin_url('admin.php'))); ?>"><?php echo esc_html($c['name']); ?></a>
            <?php endforeach; ?>
        </h2>

        <?php if ($cat) : ?>
            <?php foreach ($cat['sections'] as $sec) : ?>
                <h3 class="ee-vadm-sec"><?php echo esc_html($sec['name']); ?></h3>
                <div class="ee-vadm-grid">
                    <?php foreach ($sec['videos'] as $v) :
                        $rm = wp_nonce_url(admin_url('admin-post.php?action=ee_videos_remove&v=' . rawurlencode($v[1]) . '&cat=' . rawurlencode($slug)), 'ee_videos_remove');
                        $mine = in_array($v[1], $extraIds, true); ?>
                        <div class="ee-vadm-tile">
                            <a class="ee-vadm-x" href="<?php echo esc_url($rm); ?>"
                               onclick="return confirm('Remove this video from the site?\n\n<?php echo esc_js($v[0]); ?>');"
                               aria-label="Remove this video" title="Remove from the site">&times;</a>
                            <img src="https://i.ytimg.com/vi/<?php echo esc_attr($v[1]); ?>/mqdefault.jpg" alt="" loading="lazy">
                            <div class="ee-vadm-t"><?php echo esc_html($v[0]); ?></div>
                            <div class="ee-vadm-m">
                                <a href="https://www.youtube.com/watch?v=<?php echo esc_attr($v[1]); ?>" target="_blank" rel="noopener">Preview</a>
                                <?php if ($mine) : ?><span class="ee-vadm-badge">Added here</span><?php endif; ?>
                                <?php $hmPos = array_search($v[1], $homeSel, true);
                                      $hm = wp_nonce_url(admin_url('admin-post.php?action=ee_videos_home&v=' . rawurlencode($v[1]) . '&cat=' . rawurlencode($slug)), 'ee_videos_home'); ?>
                                <a class="ee-vadm-hm<?php echo $hmPos !== false ? ' is-on' : ''; ?>" href="<?php echo esc_url($hm); ?>"
                                   title="<?php echo $hmPos !== false ? 'Remove from the home page carousel' : 'Show on the home page carousel'; ?>">&#11088; Home<?php echo $hmPos !== false ? ' #' . ($hmPos + 1) : ''; ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <?php if (!$cat['sections']) : ?>
                <p class="description">This category has no videos yet. Add one with the form above.</p>
            <?php endif; ?>
        <?php endif; ?>

        <!-- removed -->
        <div class="ee-vadm-card" style="margin-top:34px">
            <h2>Removed videos</h2>
            <?php if (!$gone) : ?>
                <p class="description">Nothing has been removed. Anything you remove will appear here so you can put it back.</p>
            <?php else : ?>
                <table class="widefat striped" style="max-width:900px">
                    <thead><tr><th style="width:150px">Video</th><th>Title</th><th style="width:190px">Was in</th><th style="width:110px"></th></tr></thead>
                    <tbody>
                    <?php foreach ($gone as $g) :
                        $back = wp_nonce_url(admin_url('admin-post.php?action=ee_videos_restore&v=' . rawurlencode($g['id'])), 'ee_videos_restore'); ?>
                        <tr>
                            <td><img src="https://i.ytimg.com/vi/<?php echo esc_attr($g['id']); ?>/mqdefault.jpg" alt="" style="width:132px;height:74px;object-fit:cover;border-radius:5px;display:block"></td>
                            <td><?php echo esc_html($g['title']); ?></td>
                            <td><?php echo esc_html($g['cat']); ?></td>
                            <td><a class="button" href="<?php echo esc_url($back); ?>">Put back</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>

    <style>
    .ee-vadm-lead{ max-width:820px; color:#475569; font-size:13.5px; line-height:1.7; }
    .ee-vadm-card{ background:#fff; border:1px solid #dcdcde; border-radius:8px; padding:6px 22px 20px; margin:18px 0; max-width:1100px; }
    .ee-vadm-card h2{ font-size:15px; margin:16px 0 10px; }
    .ee-vadm-row{ display:flex; gap:22px; flex-wrap:wrap; margin:0 0 14px; }
    .ee-vadm-row label{ font-weight:600; font-size:12.5px; color:#1d2327; }
    .ee-vadm-tabs{ margin-top:26px; }
    .ee-vadm-sec{ font-size:14px; margin:24px 0 10px; color:#19335D; }
    .ee-vadm-grid{ display:grid; grid-template-columns:repeat(auto-fill,minmax(196px,1fr)); gap:14px; max-width:1300px; }
    .ee-vadm-tile{ position:relative; display:flex; flex-direction:column; background:#fff;
      border:1px solid #dcdcde; border-radius:8px; overflow:hidden; }
    .ee-vadm-tile img{ width:100%; aspect-ratio:16/9; object-fit:cover; display:block; background:#eef2f7; }
    /* flex:1 keeps the Preview row on its own line whatever the title does,
       so a clamped three-line title can never sit on top of it */
    .ee-vadm-t{ flex:1 1 auto; padding:9px 10px 6px; font-size:12.5px; font-weight:600; line-height:1.35; color:#1d2327;
      display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; }
    .ee-vadm-m{ display:flex; align-items:center; justify-content:space-between; gap:6px; padding:0 10px 10px; font-size:11.5px; }
    .ee-vadm-badge{ background:#FFF3EC; color:#B5551D; border-radius:4px; padding:2px 6px; font-weight:700; font-size:10px; }
    .ee-vadm-hm{ margin-left:auto; background:#F4F6FA; color:#5a6b85; border:1px solid #e2e8f0; border-radius:5px; padding:2px 8px; font-weight:700; font-size:10.5px; text-decoration:none; white-space:nowrap; }
    .ee-vadm-hm:hover{ border-color:#DE6E30; color:#B5551D; }
    .ee-vadm-hm.is-on{ background:#FFF3EC; border-color:#DE6E30; color:#B5551D; }
    .ee-vadm-x{ position:absolute; top:6px; right:6px; z-index:2; width:24px; height:24px; border-radius:50%;
      background:rgba(179,45,46,.94); color:#fff !important; text-decoration:none; font-size:15px; line-height:24px;
      text-align:center; font-weight:700; box-shadow:0 2px 6px rgba(0,0,0,.3); }
    .ee-vadm-x:hover{ background:#b32d2e; }
    </style>
    <script>
    (function(){
      /* "＋ New …" reveals its text box; the section list reloads to match
         the chosen category so the options are never from the wrong one. */
      function bind(sel, box){
        var s = document.getElementById(sel), b = document.getElementById(box);
        if (!s || !b) return;
        function sync(){ b.style.display = (s.value === '__new') ? 'block' : 'none'; if (s.value === '__new') b.focus(); }
        s.addEventListener('change', sync); sync();
      }
      bind('eeVCat', 'eeVCatNew');
      bind('eeVSec', 'eeVSecNew');

      var cat = document.getElementById('eeVCat');
      if (cat) cat.addEventListener('change', function(){
        if (cat.value === '__new') return;              /* new category has no sections yet */
        var u = new URL(window.location.href);
        u.searchParams.set('cat', cat.value);
        u.searchParams.delete('msg'); u.searchParams.delete('err');
        window.location.href = u.toString();
      });
    })();
    </script>
    <?php
}
