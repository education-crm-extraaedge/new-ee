<?php
/**
 * single-webinar.php — Webinar event landing page
 * Schema: Event (OnlineEventAttendanceMode)
 * Custom fields:
 *   _seo_title, _seo_description, _seo_keywords, _og_image
 *   _webinar_subtitle, _webinar_start (ISO 8601), _webinar_end, _webinar_timezone
 *   _webinar_speaker_name, _webinar_speaker_role, _webinar_register_url
 *   _webinar_agenda, _webinar_cta_text, _webinar_status (scheduled|live|completed)
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    if (!is_singular('webinar')) return;
    global $post;
    $pid       = $post->ID;
    $title     = get_post_meta($pid, '_seo_title', true) ?: get_the_title($pid);
    $desc      = get_post_meta($pid, '_seo_description', true) ?: wp_trim_words(wp_strip_all_tags($post->post_content), 30);
    $image     = get_post_meta($pid, '_og_image', true) ?: get_the_post_thumbnail_url($pid, 'full');
    $url       = get_permalink($pid);
    $keywords  = get_post_meta($pid, '_seo_keywords', true);
    $start     = get_post_meta($pid, '_webinar_start', true);
    $end       = get_post_meta($pid, '_webinar_end', true);
    $speaker   = get_post_meta($pid, '_webinar_speaker_name', true);
    $sp_role   = get_post_meta($pid, '_webinar_speaker_role', true);
    $reg_url   = get_post_meta($pid, '_webinar_register_url', true) ?: $url;
    $status    = get_post_meta($pid, '_webinar_status', true) ?: 'scheduled';
    if ($keywords) echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";

    $status_map = array(
        'scheduled' => 'https://schema.org/EventScheduled',
        'live'      => 'https://schema.org/EventScheduled',
        'completed' => 'https://schema.org/EventScheduled',
        'cancelled' => 'https://schema.org/EventCancelled',
        'postponed' => 'https://schema.org/EventPostponed',
    );

    $schema = array(
        '@context'            => 'https://schema.org',
        '@type'               => 'Event',
        '@id'                 => $url . '#event',
        'name'                => $title,
        'description'         => $desc,
        'image'               => $image,
        'url'                 => $url,
        'eventStatus'         => $status_map[$status] ?? 'https://schema.org/EventScheduled',
        'eventAttendanceMode' => 'https://schema.org/OnlineEventAttendanceMode',
        'location'            => array(
            '@type' => 'VirtualLocation',
            'url'   => $reg_url,
        ),
        'organizer'           => array('@id' => 'https://www.extraaedge.com/#organization'),
        'offers'              => array(
            '@type'         => 'Offer',
            'url'           => $reg_url,
            'price'         => '0',
            'priceCurrency' => 'USD',
            'availability'  => 'https://schema.org/InStock',
            'validFrom'     => get_the_date('c', $pid),
        ),
    );
    if ($start) $schema['startDate'] = $start;
    if ($end)   $schema['endDate']   = $end;
    if ($speaker) {
        $schema['performer'] = array(
            '@type'    => 'Person',
            'name'     => $speaker,
            'jobTitle' => $sp_role ?: 'Speaker',
        );
    }
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
});

get_header();
while (have_posts()) : the_post();

$pid       = get_the_ID();
$subtitle  = get_post_meta($pid, '_webinar_subtitle', true);
$start     = get_post_meta($pid, '_webinar_start', true);
$tz        = get_post_meta($pid, '_webinar_timezone', true) ?: 'IST';
$speaker   = get_post_meta($pid, '_webinar_speaker_name', true);
$sp_role   = get_post_meta($pid, '_webinar_speaker_role', true);
$reg_url   = get_post_meta($pid, '_webinar_register_url', true) ?: '#register';
$agenda    = get_post_meta($pid, '_webinar_agenda', true);
$status    = get_post_meta($pid, '_webinar_status', true) ?: 'scheduled';
$cta_text  = get_post_meta($pid, '_webinar_cta_text', true) ?: 'Register Free';
$hero_img  = get_the_post_thumbnail_url($pid, 'full');

$start_display = $start ? date_i18n('D, M j, Y · g:i A', strtotime($start)) . ' ' . esc_html($tz) : '';
?>

<style>
.wb-hero{background:linear-gradient(135deg,#19335D 0%,#1e3d70 100%);color:#fff;padding:60px 0 50px;position:relative;overflow:hidden}
.wb-hero:before{content:"";position:absolute;inset:0;background:radial-gradient(circle at 20% 30%,rgba(222,110,48,.18),transparent 50%);pointer-events:none}
.wb-hero .container{position:relative;max-width:1240px;margin:0 auto;padding:0 24px;display:grid;grid-template-columns:1.1fr .9fr;gap:48px;align-items:center}
.wb-badge{display:inline-flex;align-items:center;gap:8px;background:rgba(222,110,48,.18);color:#FBC8A8;font-family:'Inter',sans-serif;font-weight:700;font-size:11px;text-transform:uppercase;letter-spacing:1.5px;padding:8px 18px;border-radius:9999px;margin-bottom:18px;border:1px solid rgba(222,110,48,.32)}
.wb-status-live{background:rgba(220,38,38,.22);color:#FCA5A5;border-color:rgba(220,38,38,.4)}
.wb-status-live:before{content:"";width:8px;height:8px;border-radius:50%;background:#EF4444;box-shadow:0 0 0 0 rgba(239,68,68,.6);animation:wb-pulse 1.6s infinite}
@keyframes wb-pulse{0%{box-shadow:0 0 0 0 rgba(239,68,68,.6)}70%{box-shadow:0 0 0 10px rgba(239,68,68,0)}100%{box-shadow:0 0 0 0 rgba(239,68,68,0)}}
.wb-hero h1{font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(30px,4vw,48px);line-height:1.15;font-weight:900;margin:0 0 16px;letter-spacing:-.02em;color:#fff}
.wb-hero .sub{font-size:clamp(15px,1.3vw,17px);color:rgba(255,255,255,.85);line-height:1.7;margin-bottom:24px}
.wb-meta{display:flex;flex-direction:column;gap:10px;margin-bottom:24px;font-family:'Inter',sans-serif;font-size:14px;color:rgba(255,255,255,.9)}
.wb-meta span{display:inline-flex;align-items:center;gap:8px;font-weight:600}
.wb-cta-row{display:flex;gap:14px;flex-wrap:wrap}
.wb-btn-primary{display:inline-flex;align-items:center;gap:8px;background:#DE6E30;color:#fff;font-family:'Inter',sans-serif;font-weight:700;font-size:15px;padding:15px 32px;border-radius:14px;text-decoration:none;transition:all .3s ease;box-shadow:0 8px 24px rgba(222,110,48,.4)}
.wb-btn-primary:hover{transform:translateY(-3px);background:#c85d20}
.wb-hero img{width:100%;height:auto;border-radius:20px;box-shadow:0 30px 80px rgba(0,0,0,.4)}

.wb-body{background:#fff;padding:60px 0}
.wb-body .container{max-width:1100px;margin:0 auto;padding:0 24px;display:grid;grid-template-columns:1fr 320px;gap:48px}
.wb-body article{font-family:'Inter',sans-serif;color:#19335D;line-height:1.8}
.wb-body article h2{font-family:'Plus Jakarta Sans',sans-serif;font-size:clamp(24px,3vw,32px);font-weight:800;color:#19335D;margin:32px 0 14px}
.wb-body article p{font-size:16px;color:#475569;margin-bottom:16px}
.wb-body article ul,.wb-body article ol{margin:0 0 20px 20px;color:#475569}
.wb-body article li{margin-bottom:8px}
.wb-body article a{color:#DE6E30;font-weight:600}

.wb-speaker-card{background:#F8FAFC;border-radius:18px;padding:24px;margin:30px 0;display:flex;gap:18px;align-items:center;border:1px solid #E2E8F0}
.wb-speaker-card .avatar{width:64px;height:64px;border-radius:50%;background:linear-gradient(135deg,#DE6E30,#19335D);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:22px;font-family:'Plus Jakarta Sans',sans-serif}
.wb-speaker-card .info{font-family:'Inter',sans-serif}
.wb-speaker-card .info b{display:block;color:#19335D;font-size:16px}
.wb-speaker-card .info span{color:#475569;font-size:14px}

.wb-aside{position:sticky;top:100px;align-self:start}
.wb-aside-card{background:linear-gradient(135deg,#DE6E30 0%,#c85d20 100%);color:#fff;border-radius:24px;padding:32px;box-shadow:0 24px 60px rgba(222,110,48,.3)}
.wb-aside-card h3{font-family:'Plus Jakarta Sans',sans-serif;font-size:20px;font-weight:800;margin:0 0 10px;color:#fff}
.wb-aside-card p{font-size:14px;color:rgba(255,255,255,.95);line-height:1.6;margin-bottom:18px}
.wb-aside-card a{display:block;background:#fff;color:#DE6E30;text-align:center;padding:14px;border-radius:12px;font-weight:700;text-decoration:none}

@media(max-width:900px){.wb-hero .container,.wb-body .container{grid-template-columns:1fr;gap:32px}.wb-aside{position:relative;top:0}}
</style>

<main id="main-content" role="main">
  <section class="wb-hero" aria-labelledby="webinar-heading">
    <div class="container">
      <div>
        <div class="wb-badge<?php echo $status === 'live' ? ' wb-status-live' : ''; ?>">
          <?php echo $status === 'live' ? 'LIVE NOW' : ($status === 'completed' ? '📺 On-Demand Webinar' : '🎙 Upcoming Webinar'); ?>
        </div>
        <h1 id="webinar-heading"><?php the_title(); ?></h1>
        <?php if ($subtitle) : ?><p class="sub"><?php echo esc_html($subtitle); ?></p><?php endif; ?>
        <div class="wb-meta">
          <?php if ($start_display) : ?><span>📅 <?php echo esc_html($start_display); ?></span><?php endif; ?>
          <?php if ($speaker) : ?><span>👤 <?php echo esc_html($speaker); ?><?php if ($sp_role) echo ' · ' . esc_html($sp_role); ?></span><?php endif; ?>
          <span>🎥 Online · Free</span>
        </div>
        <div class="wb-cta-row">
          <a href="<?php echo esc_url($reg_url); ?>" class="wb-btn-primary" rel="nofollow"><?php echo esc_html($cta_text); ?></a>
        </div>
      </div>
      <?php if ($hero_img) : ?>
        <figure><img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?> — ExtraaEdge Webinar" width="640" height="480" fetchpriority="high" decoding="async"></figure>
      <?php endif; ?>
    </div>
  </section>

  <section class="wb-body">
    <div class="container">
      <article itemscope itemtype="https://schema.org/Event">
        <?php the_content(); ?>
        <?php if ($speaker) : ?>
        <div class="wb-speaker-card">
          <div class="avatar"><?php echo esc_html(strtoupper(substr($speaker, 0, 1))); ?></div>
          <div class="info">
            <b><?php echo esc_html($speaker); ?></b>
            <span><?php echo esc_html($sp_role ?: 'Speaker'); ?></span>
          </div>
        </div>
        <?php endif; ?>

        <?php if ($agenda) : ?>
        <h2>Webinar Agenda</h2>
        <ul>
          <?php foreach (explode("\n", trim($agenda)) as $line) : $line = trim($line); if ($line) echo '<li>' . esc_html($line) . '</li>'; endforeach; ?>
        </ul>
        <?php endif; ?>
      </article>

      <aside class="wb-aside" role="complementary">
        <div class="wb-aside-card">
          <h3>Save Your Seat</h3>
          <p>Limited spots available — register now to receive the joining link and the recording afterwards.</p>
          <a href="<?php echo esc_url($reg_url); ?>" rel="nofollow">🎟 <?php echo esc_html($cta_text); ?></a>
        </div>
      </aside>
    </div>
  </section>
</main>

<?php endwhile; get_footer(); ?>
