<?php
/**
 * page-resources.php — Custom landing for /resources/.
 * Wired via the template_redirect override in functions.php.
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

add_action('wp_head', function () {
    $title = 'Resources — Insights & Tools for Modern Admissions | ExtraaEdge';
    $desc  = 'Blogs, ebooks, webinars, case studies, news, and support — everything you need to scale enrollment, all in one place.';
    $url   = home_url($_SERVER['REQUEST_URI'] ?? '/resources/');
    $ogimg = home_url('/wp-content/uploads/2022/06/class-1.png');
    echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta name="keywords" content="education resources, admissions blogs, enrollment ebooks, education webinars, CRM case studies, education news, help center">' . "\n";
    echo '<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">' . "\n";
    echo '<meta name="theme-color" content="#19335D">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($ogimg) . '">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">' . "\n";

    /* JSON-LD CollectionPage + ItemList */
    $items = array(
        array('Blogs',        '/blog/',                'Latest insights, trends, and best practices for student admissions and enrollment.'),
        array('Ebooks',       '/ebooks/',              'In-depth guides and playbooks to master education marketing and admissions.'),
        array('Webinars',     '/webinars/',            'Live and on-demand sessions with industry experts and product walkthroughs.'),
        array('Case Studies', '/case-studies/',        'Real success stories from institutions scaling enrollment with our platform.'),
        array('News & Media', '/news/',                'Press coverage, announcements, and the latest from our newsroom.'),
        array('Help Center',  '/help/',                'Step-by-step guides, FAQs, and documentation to get the most out of the platform.'),
    );
    $list = array('@context' => 'https://schema.org', '@type' => 'ItemList', 'name' => 'Resource Categories', 'numberOfItems' => count($items), 'itemListElement' => array());
    foreach ($items as $i => $row) {
        $list['itemListElement'][] = array(
            '@type' => 'ListItem', 'position' => $i + 1,
            'name' => $row[0], 'url' => home_url($row[1]), 'description' => $row[2],
        );
    }
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode(array('@context'=>'https://schema.org','@type'=>'CollectionPage','name'=>'ExtraaEdge Resources','description'=>$desc,'url'=>$url,'provider'=>array('@type'=>'Organization','name'=>'ExtraaEdge','url'=>home_url('/')))) . "</script>\n";
    echo "<script type=\"application/ld+json\">" . wp_json_encode($list) . "</script>\n";
}, 5);

get_header();

$resources = array(
    array('id'=>'blogs',        'title'=>'Blogs',        'url'=>home_url('/blog/'),         'desc'=>'Latest insights, trends, and best practices for student admissions and enrollment.',                 'colors'=>array('#DE6E30','#F7B267')),
    array('id'=>'ebooks',       'title'=>'Ebooks',       'url'=>home_url('/ebooks/'),       'desc'=>'In-depth guides and playbooks to master education marketing and admissions.',                          'colors'=>array('#19335D','#3E6BB0')),
    array('id'=>'webinars',     'title'=>'Webinars',     'url'=>home_url('/webinars/'),     'desc'=>'Live and on-demand sessions with industry experts and product walkthroughs.',                          'colors'=>array('#7C3AED','#C084FC')),
    array('id'=>'case-studies', 'title'=>'Case Studies', 'url'=>home_url('/case-studies/'), 'desc'=>'Real success stories from institutions scaling enrollment with our platform.',                         'colors'=>array('#0E9F6E','#6EE7B7')),
    array('id'=>'news-media',   'title'=>'News & Media', 'url'=>home_url('/news/'),         'desc'=>'Press coverage, announcements, and the latest from our newsroom.',                                     'colors'=>array('#DC2626','#FB7185')),
    array('id'=>'help-center',  'title'=>'Help Center',  'url'=>home_url('/help/'),         'desc'=>'Step-by-step guides, FAQs, and documentation to get the most out of the platform.',                   'colors'=>array('#0891B2','#67E8F9')),
);

$icons = array(
    'blogs'        => '<path d="M5 4h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1Z" stroke="currentColor" stroke-width="1.7"/><path d="M8 9h8M8 13h8M8 17h5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
    'ebooks'       => '<path d="M4 5a2 2 0 0 1 2-2h6v18H6a2 2 0 0 1-2-2V5Z" stroke="currentColor" stroke-width="1.7"/><path d="M20 5a2 2 0 0 0-2-2h-6v18h6a2 2 0 0 0 2-2V5Z" stroke="currentColor" stroke-width="1.7"/>',
    'webinars'     => '<rect x="3" y="5" width="18" height="12" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M10 9.5l4 2.5-4 2.5v-5Z" fill="currentColor"/><path d="M8 20h8" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
    'case-studies' => '<path d="M5 21V9l7-5 7 5v12" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M8 21v-6h8v6" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M10.5 11.5l1.5 1.5 2.5-2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>',
    'news-media'   => '<path d="M4 5h13v14H6a2 2 0 0 1-2-2V5Z" stroke="currentColor" stroke-width="1.7"/><path d="M17 9h2a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2" stroke="currentColor" stroke-width="1.7"/><path d="M7 9h6M7 12h6M7 15h4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>',
    'help-center'  => '<circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.7"/><path d="M9.5 9.2a2.5 2.5 0 0 1 4.5 1.5c0 1.7-2.5 2-2.5 3.3" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><circle cx="12" cy="17" r="1" fill="currentColor"/>',
);
?>
<style>
.ee-res{
  --clr-orange:#DE6E30;--clr-orange-dark:#C25A22;--clr-orange-light:#F7D9C8;--clr-orange-ultra:#FFF3EC;
  --clr-navy:#19335D;--clr-navy-mid:#1E3F73;--clr-navy-dark:#112240;
  --clr-white:#FFFFFF;--clr-gray-50:#F9FAFB;--clr-gray-100:#F3F4F6;--clr-gray-200:#E5E7EB;--clr-gray-400:#9CA3AF;--clr-gray-500:#6B7280;--clr-gray-700:#374151;--clr-gray-900:#111827;
  --font-base:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',system-ui,sans-serif;
  --radius-sm:.5rem;--radius-md:.75rem;--radius-lg:1rem;--radius-xl:1.25rem;--radius-2xl:1.5rem;--radius-3xl:2rem;
  --shadow-card:0 1px 3px rgba(0,0,0,.06),0 4px 16px rgba(25,51,93,.07);
  --shadow-hover:0 8px 32px rgba(25,51,93,.14),0 2px 8px rgba(25,51,93,.08);
  --shadow-cta:0 20px 60px rgba(25,51,93,.22);
  --shadow-orange:0 8px 28px rgba(222,110,48,.38);
  --transition-base:all .28s cubic-bezier(.4,0,.2,1);
  --transition-fast:all .18s cubic-bezier(.4,0,.2,1);
  --transition-slow:all .45s cubic-bezier(.4,0,.2,1);
  font-family:var(--font-base);color:var(--clr-gray-700);line-height:1.6;-webkit-font-smoothing:antialiased
}
.ee-res *,.ee-res *::before,.ee-res *::after{box-sizing:border-box}
.ee-res a{text-decoration:none;color:inherit}
.ee-res button{font-family:inherit;cursor:pointer;border:0;background:none;color:inherit}

.ee-res .ecrm-section{width:100%;background:var(--clr-white);position:relative;overflow:hidden;padding:5rem 1.25rem}
@media (min-width:640px){.ee-res .ecrm-section{padding:6rem 2.5rem}}
@media (min-width:1024px){.ee-res .ecrm-section{padding:7rem 4rem}}
.ee-res .ecrm-section::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 60% 40% at 10% 0%,rgba(222,110,48,.045) 0%,transparent 60%),radial-gradient(ellipse 50% 35% at 90% 100%,rgba(25,51,93,.04) 0%,transparent 55%);pointer-events:none}
.ee-res .ecrm-container{max-width:76rem;margin:0 auto;position:relative;z-index:1}

.ee-res .ecrm-header{text-align:center;margin-bottom:4.5rem}
@media (min-width:640px){.ee-res .ecrm-header{margin-bottom:5.5rem}}
.ee-res .ecrm-eyebrow{display:inline-flex;align-items:center;gap:.5rem;background:linear-gradient(135deg,var(--clr-orange-ultra),#FEE8D6);border:1px solid var(--clr-orange-light);color:var(--clr-orange);font-size:.75rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;padding:.45rem 1rem;border-radius:100px;margin-bottom:1.25rem}
.ee-res .ecrm-eyebrow-dot{width:6px;height:6px;background:var(--clr-orange);border-radius:50%;animation:ee-res-pulse 2s ease-in-out infinite}
@keyframes ee-res-pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.5;transform:scale(.75)}}
.ee-res .ecrm-headline{font-size:clamp(1.875rem,5vw,3.25rem);font-weight:900;color:var(--clr-navy);line-height:1.12;letter-spacing:-.03em;margin:0 auto 1.25rem;max-width:46rem}
.ee-res .ecrm-headline mark{background:none;color:var(--clr-orange);position:relative}
.ee-res .ecrm-headline mark::after{content:'';position:absolute;left:0;right:0;bottom:2px;height:3px;background:linear-gradient(90deg,var(--clr-orange),transparent);border-radius:2px}
.ee-res .ecrm-subheadline{font-size:clamp(1rem,2vw,1.125rem);color:var(--clr-gray-500);line-height:1.7;max-width:42rem;margin:0 auto;font-weight:400}

.ee-res .ecrm-trust-bar{display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:.75rem 2rem;margin-bottom:4.5rem;padding:1.5rem 2rem;background:var(--clr-gray-50);border:1px solid var(--clr-gray-100);border-radius:var(--radius-2xl)}
.ee-res .ecrm-trust-label{font-size:.75rem;font-weight:700;color:var(--clr-gray-400);text-transform:uppercase;letter-spacing:.12em;width:100%;text-align:center;margin-bottom:.25rem}
@media (min-width:640px){.ee-res .ecrm-trust-label{width:auto;margin-bottom:0}}
.ee-res .ecrm-trust-item{display:flex;align-items:center;gap:.4rem;font-size:.8125rem;font-weight:600;color:var(--clr-gray-500)}
.ee-res .ecrm-trust-check{width:14px;height:14px;background:linear-gradient(135deg,var(--clr-orange),var(--clr-orange-dark));border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0}

.ee-res .ecrm-grid{display:grid;grid-template-columns:1fr;gap:1.25rem;margin-bottom:0}
@media (min-width:480px){.ee-res .ecrm-grid{grid-template-columns:repeat(2,1fr)}}
@media (min-width:1024px){.ee-res .ecrm-grid{grid-template-columns:repeat(3,1fr);gap:1.5rem}}

.ee-res .ecrm-card{position:relative;display:flex;flex-direction:column;background:var(--clr-white);border:1.5px solid var(--clr-gray-100);border-radius:var(--radius-2xl);padding:1.75rem;text-decoration:none;color:inherit;transition:var(--transition-base);box-shadow:var(--shadow-card);overflow:hidden;will-change:transform;outline:none}
@media (min-width:640px){.ee-res .ecrm-card{padding:2rem}}
.ee-res .ecrm-card-bg{position:absolute;inset:0;z-index:0;background-image:var(--card-bg);background-size:cover;background-position:center;background-repeat:no-repeat;opacity:.45;transform:scale(1.02);transition:var(--transition-slow);pointer-events:none}
.ee-res .ecrm-card-bg::after{content:'';position:absolute;inset:0;background:linear-gradient(180deg,rgba(255,255,255,.30) 0%,rgba(255,255,255,.62) 55%,rgba(255,255,255,.86) 100%)}
.ee-res .ecrm-card:hover .ecrm-card-bg,.ee-res .ecrm-card:focus-visible .ecrm-card-bg{opacity:.6;transform:scale(1.06)}
.ee-res .ecrm-card::before{content:'';position:absolute;top:0;left:1.5rem;right:1.5rem;height:2px;background:linear-gradient(90deg,transparent,var(--clr-orange),transparent);border-radius:0 0 2px 2px;opacity:0;transition:var(--transition-base)}
.ee-res .ecrm-card::after{content:'';position:absolute;inset:0;background:linear-gradient(135deg,var(--clr-orange-ultra) 0%,transparent 60%);opacity:0;transition:var(--transition-slow);pointer-events:none}
.ee-res .ecrm-card:hover,.ee-res .ecrm-card:focus-visible{transform:translateY(-6px);border-color:var(--clr-orange-light);box-shadow:var(--shadow-hover)}
.ee-res .ecrm-card:hover::before,.ee-res .ecrm-card:focus-visible::before{opacity:1}
.ee-res .ecrm-card:hover::after,.ee-res .ecrm-card:focus-visible::after{opacity:1}
.ee-res .ecrm-card:focus-visible{outline:2px solid var(--clr-orange);outline-offset:3px}
.ee-res .ecrm-card-icon{position:relative;z-index:1;width:3.25rem;height:3.25rem;border-radius:var(--radius-lg);background:var(--clr-orange-ultra);border:1px solid var(--clr-orange-light);display:flex;align-items:center;justify-content:center;margin-bottom:1.25rem;transition:var(--transition-base);flex-shrink:0;overflow:hidden}
.ee-res .ecrm-card:hover .ecrm-card-icon,.ee-res .ecrm-card:focus-visible .ecrm-card-icon{background:var(--clr-orange);border-color:var(--clr-orange);box-shadow:var(--shadow-orange)}
.ee-res .ecrm-card-icon svg{width:1.625rem;height:1.625rem;color:var(--clr-orange);transition:var(--transition-base)}
.ee-res .ecrm-card:hover .ecrm-card-icon svg,.ee-res .ecrm-card:focus-visible .ecrm-card-icon svg{color:var(--clr-white)}
.ee-res .ecrm-card-body{position:relative;z-index:1;flex:1;display:flex;flex-direction:column}
.ee-res .ecrm-card-title{font-size:1.0625rem;font-weight:700;color:var(--clr-navy);margin-bottom:.5rem;line-height:1.35;letter-spacing:-.01em}
.ee-res .ecrm-card-desc{font-size:.875rem;color:var(--clr-gray-500);line-height:1.65;flex:1}
.ee-res .ecrm-card-link{display:inline-flex;align-items:center;gap:.375rem;font-size:.8125rem;font-weight:700;color:var(--clr-orange);margin-top:1.125rem;opacity:0;transform:translateX(-6px);transition:var(--transition-base)}
.ee-res .ecrm-card-link svg{transition:var(--transition-fast)}
.ee-res .ecrm-card:hover .ecrm-card-link,.ee-res .ecrm-card:focus-visible .ecrm-card-link{opacity:1;transform:translateX(0)}
.ee-res .ecrm-card:hover .ecrm-card-link svg,.ee-res .ecrm-card:focus-visible .ecrm-card-link svg{transform:translateX(3px)}
.ee-res .ecrm-card-num{position:absolute;top:1.5rem;right:1.5rem;font-size:.6875rem;font-weight:800;color:var(--clr-gray-200);letter-spacing:.08em;transition:var(--transition-base);z-index:1}
.ee-res .ecrm-card:hover .ecrm-card-num,.ee-res .ecrm-card:focus-visible .ecrm-card-num{color:var(--clr-orange-light)}

@keyframes ee-res-fadeUp{from{opacity:0;transform:translateY(22px)}to{opacity:1;transform:translateY(0)}}
@keyframes ee-res-fadeIn{from{opacity:0}to{opacity:1}}
.ee-res .ecrm-anim{opacity:0}
.ee-res .ecrm-anim.is-visible{animation:ee-res-fadeUp .6s ease forwards}
.ee-res .ecrm-anim-fade.is-visible{animation:ee-res-fadeIn .7s ease forwards}
.ee-res .ecrm-d1{animation-delay:.05s}.ee-res .ecrm-d2{animation-delay:.12s}.ee-res .ecrm-d3{animation-delay:.19s}.ee-res .ecrm-d4{animation-delay:.26s}.ee-res .ecrm-d5{animation-delay:.33s}.ee-res .ecrm-d6{animation-delay:.40s}.ee-res .ecrm-d7{animation-delay:.47s}

.ee-res .sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
.ee-res .skip-link{position:absolute;top:-100%;left:0;background:var(--clr-orange);color:#fff;font-weight:700;padding:.75rem 1.5rem;border-radius:0 0 var(--radius-md) 0;z-index:9999;transition:top .2s}
.ee-res .skip-link:focus{top:0}

@media (prefers-reduced-motion:reduce){
  .ee-res *,.ee-res *::before,.ee-res *::after{animation-duration:.01ms!important;animation-iteration-count:1!important;transition-duration:.01ms!important}
  .ee-res .ecrm-anim{opacity:1}
  .ee-res .ecrm-eyebrow-dot{animation:none}
}
</style>

<div class="ee-res">
<a href="#edu-resources-grid" class="skip-link">Skip to resource categories</a>

<section class="ecrm-section" id="resources-showcase" aria-labelledby="ecrm-heading">
  <div class="ecrm-container">

    <header class="ecrm-header ecrm-anim ecrm-anim-fade ecrm-d1">
      <p class="ecrm-eyebrow"><span class="ecrm-eyebrow-dot" aria-hidden="true"></span> The Resource Library</p>
      <h1 id="ecrm-heading" class="ecrm-headline">Everything you need to <mark>grow enrollment.</mark></h1>
      <p class="ecrm-subheadline">Blogs, ebooks, webinars, case studies, news, and support — all the insights and tools to master modern admissions, in one place.</p>
    </header>

    <div class="ecrm-trust-bar ecrm-anim ecrm-d2" role="list" aria-label="Resource library highlights">
      <span class="ecrm-trust-label">What you'll find inside</span>
      <?php foreach (array('Expert-written insights','Updated weekly','Free downloads','Real success stories','24/7 self-serve support') as $t): ?>
        <div class="ecrm-trust-item" role="listitem">
          <span class="ecrm-trust-check" aria-hidden="true"><svg width="8" height="8" viewBox="0 0 8 8" fill="none"><path d="M1.5 4L3.5 6L6.5 2.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
          <span><?php echo esc_html($t); ?></span>
        </div>
      <?php endforeach; ?>
    </div>

    <div id="edu-resources-grid" class="ecrm-grid" role="list" aria-label="Resource categories">
      <?php foreach ($resources as $i => $r):
        $pos = $i + 1;
        $delay = 'ecrm-d' . min($pos + 2, 7);
        $svg = isset($icons[$r['id']]) ? $icons[$r['id']] : $icons['blogs'];
        /* Inline SVG gradient as data-URL — exact PHP analog of makeDummyImage() */
        $bg_svg  = '<svg xmlns="http://www.w3.org/2000/svg" width="600" height="400" viewBox="0 0 600 400">';
        $bg_svg .= '<defs><linearGradient id="g" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="' . $r['colors'][0] . '"/><stop offset="100%" stop-color="' . $r['colors'][1] . '"/></linearGradient></defs>';
        $bg_svg .= '<rect width="600" height="400" fill="url(#g)"/>';
        $bg_svg .= '<circle cx="480" cy="90"  r="150" fill="#ffffff" opacity="0.12"/>';
        $bg_svg .= '<circle cx="120" cy="330" r="110" fill="#ffffff" opacity="0.10"/>';
        $bg_svg .= '<circle cx="300" cy="200" r="60"  fill="#ffffff" opacity="0.08"/></svg>';
        $bg_url = 'data:image/svg+xml;charset=utf-8,' . rawurlencode($bg_svg);
      ?>
        <div role="listitem">
          <a href="<?php echo esc_url($r['url']); ?>" class="ecrm-card ecrm-anim <?php echo esc_attr($delay); ?>" style="--card-bg:url('<?php echo esc_attr($bg_url); ?>')" aria-label="<?php echo esc_attr($r['title'] . ' — ' . $r['desc']); ?>" data-resource-id="<?php echo esc_attr($r['id']); ?>">
            <span class="ecrm-card-bg" aria-hidden="true"></span>
            <span class="ecrm-card-num" aria-hidden="true">0<?php echo $pos; ?></span>
            <div class="ecrm-card-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><?php echo $svg; ?></svg></div>
            <div class="ecrm-card-body">
              <h3 class="ecrm-card-title"><?php echo esc_html($r['title']); ?></h3>
              <p class="ecrm-card-desc"><?php echo esc_html($r['desc']); ?></p>
              <span class="ecrm-card-link" aria-hidden="true">Browse <?php echo esc_html($r['title']); ?> <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M2 7H12M8 3L12 7L8 11" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
</div>

<script>
(function(){
  var root = document.querySelector('.ee-res'); if (!root) return;
  if (!('IntersectionObserver' in window)){
    root.querySelectorAll('.ecrm-anim').forEach(function(el){ el.classList.add('is-visible'); });
    return;
  }
  var obs = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
      if (entry.isIntersecting){
        entry.target.classList.add('is-visible');
        obs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
  root.querySelectorAll('.ecrm-anim').forEach(function(el){ obs.observe(el); });
})();
</script>

<?php get_footer(); ?>
