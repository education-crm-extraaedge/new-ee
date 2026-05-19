<?php
/**
 * Custom landing template for /use-cases/.
 *
 * Wired up via the template_redirect override in functions.php — visiting
 * https://example.com/use-cases/ loads this file regardless of whether a
 * matching WP Page exists.
 *
 * Content source: ee_get_usecase_items() (seeded fallback + admin override
 * via Appearance → 🎯 Use Cases).
 */
if (!defined('ABSPATH')) exit;

$ee_usecases = function_exists('ee_get_usecase_items') ? ee_get_usecase_items() : array();

/* SEO meta tags — emitted via wp_head() */
add_action('wp_head', function () use ($ee_usecases) {
    $title = 'Admissions CRM Use Cases — Management, Field Agents, Counselors | ExtraaEdge';
    $desc  = 'Optimize admissions for Management, Field Agents, and Counselors. Automated workflows to convert more students.';
    $url   = home_url($_SERVER['REQUEST_URI'] ?? '/use-cases/');
    echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";

    /* JSON-LD Service with OfferCatalog */
    $offers = array();
    foreach ($ee_usecases as $uc) {
        $offers[] = array(
            '@type' => 'Offer',
            'itemOffered' => array(
                '@type' => 'Service',
                'name'  => wp_strip_all_tags($uc['title']),
                'description' => wp_strip_all_tags($uc['desc']),
                'url'   => home_url($uc['url']),
            ),
        );
    }
    $schema = array(
        '@context' => 'https://schema.org',
        '@type'    => 'Service',
        'name'     => 'ExtraaEdge Admission Use Cases',
        'provider' => array('@type' => 'Organization', 'name' => 'ExtraaEdge'),
        'hasOfferCatalog' => array(
            '@type' => 'OfferCatalog',
            'name'  => 'Admission Roles',
            'itemListElement' => $offers,
        ),
    );
    echo "\n<script type=\"application/ld+json\">" . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";

    add_filter('pre_get_document_title', function () use ($title) { return $title; }, 99);
}, 1);

get_header();
?>

<style>
/* ── Use Cases landing — scoped to #ee-usecase-section ── */
#ee-usecase-section {
    --ee-blue:   #19335D;
    --ee-orange: #DE6E30;
    --ee-slate:  #64748B;

    font-family: 'Inter', system-ui, sans-serif !important;
    margin: 10px 0 !important;
    padding: 10px 0 !important;
    background: #ffffff;
    position: relative;
    overflow: hidden;
    width: 100%;
}

#ee-usecase-section .bg-graphic {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    z-index: 1;
    pointer-events: none;
}

#ee-usecase-section .canvas-container {
    position: absolute;
    width: 100%; height: 100%;
    opacity: 0.4;
}

#ee-usecase-section .content-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 80px 24px;
    position: relative;
    z-index: 10;
}

#ee-usecase-section .section-label {
    display: inline-block;
    color: var(--ee-orange);
    font-weight: 800;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 16px;
}

#ee-usecase-section .headline {
    color: var(--ee-blue);
    font-size: clamp(32px, 5vw, 48px);
    font-weight: 900;
    line-height: 1.1;
    letter-spacing: -0.03em;
    margin-bottom: 24px;
}

#ee-usecase-section .usecase-grid {
    display: grid;
    gap: 32px;
    grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
    margin-top: 64px;
}

#ee-usecase-section .uc-card {
    background: rgba(255, 255, 255, 0.8);
    -webkit-backdrop-filter: blur(12px);
    backdrop-filter: blur(12px);
    border: 1px solid #E2E8F0;
    border-radius: 20px;
    padding: 48px;
    text-decoration: none !important;
    display: flex;
    flex-direction: column;
    transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
}

#ee-usecase-section .uc-card:hover {
    transform: translateY(-12px);
    border-color: var(--ee-orange);
    box-shadow: 0 30px 60px -15px rgba(25, 51, 93, 0.12);
    background: #ffffff;
}

#ee-usecase-section .icon-box {
    width: 130px; height: 130px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 22px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 32px;
    transition: all 0.4s ease;
    padding: 0;
    overflow: hidden;
}

/* Oversize the inner image and clip the transparent edges so logos
   with different amounts of canvas padding all read at a similar
   visual size. */
#ee-usecase-section .icon-box img,
#ee-usecase-section .icon-box svg {
    width: 135%;
    height: 135%;
    max-width: 135%;
    max-height: 135%;
    object-fit: contain;
    transition: transform 0.4s ease;
}

@media (max-width: 640px) {
    #ee-usecase-section .icon-box { width: 96px; height: 96px; }
}

#ee-usecase-section .uc-card:hover .icon-box {
    background: #fff7f0;
    border-color: rgba(222, 110, 48, 0.35);
    box-shadow: 0 12px 28px rgba(222, 110, 48, 0.18);
}

#ee-usecase-section .uc-card:hover .icon-box img {
    transform: scale(1.06);
}
#ee-usecase-section .uc-card:hover .icon-box svg {
    color: var(--ee-orange);
    transform: scale(1.06);
}

#ee-usecase-section .uc-title {
    color: var(--ee-blue);
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 16px;
}

#ee-usecase-section .uc-body {
    color: var(--ee-slate);
    font-size: 16px;
    line-height: 1.7;
    margin-bottom: 32px;
    flex-grow: 1;
}

#ee-usecase-section .uc-link {
    display: flex;
    align-items: center;
    gap: 10px;
    color: var(--ee-orange);
    font-weight: 700;
    font-size: 15px;
    transition: gap 0.3s ease;
}

#ee-usecase-section .uc-card:hover .uc-link {
    gap: 15px;
}

#ee-usecase-section .uc-cta {
    display: inline-flex;
    align-items: center;
    padding: 1rem 3rem;
    background: var(--ee-blue);
    color: #fff !important;
    font-weight: 900;
    border-radius: 9999px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 12px 32px rgba(25, 51, 93, 0.2);
    margin-top: 5rem;
}
#ee-usecase-section .uc-cta:hover {
    background: var(--ee-orange);
    box-shadow: 0 18px 48px rgba(222, 110, 48, 0.28);
    transform: translateY(-2px);
}
#ee-usecase-section .uc-cta svg {
    margin-left: 0.75rem;
    width: 20px;
    height: 20px;
    transition: transform 0.3s ease;
}
#ee-usecase-section .uc-cta:hover svg { transform: translateX(8px); }

#ee-usecase-section [data-reveal] {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}
#ee-usecase-section [data-reveal].visible {
    opacity: 1;
    transform: translateY(0);
}

@media (max-width: 640px) {
    #ee-usecase-section .uc-card { padding: 32px; }
    #ee-usecase-section .content-wrapper { padding: 48px 18px; }
}
@media (prefers-reduced-motion: reduce) {
    #ee-usecase-section [data-reveal] { opacity: 1; transform: none; }
    #ee-usecase-section .canvas-container { display: none; }
}
</style>

<section id="ee-usecase-section">
    <div class="bg-graphic">
        <canvas id="flowCanvas" class="canvas-container"></canvas>
    </div>

    <div class="content-wrapper">
        <header style="max-width:48rem;">
            <span class="section-label" data-reveal>Convert more students. Automatically.</span>
            <h1 class="headline" data-reveal>Empowering Every Stakeholder in the Admissions Funnel</h1>
        </header>

        <div class="usecase-grid">
            <?php foreach ($ee_usecases as $uc) :
                $has_img = !empty($uc['icon']);
                $lucide  = $uc['lucide'] ?? '';
            ?>
            <a href="<?php echo esc_url($uc['url']); ?>" class="uc-card" data-reveal aria-label="<?php echo esc_attr($uc['title']); ?>">
                <div class="icon-box">
                    <?php if ($has_img) : ?>
                        <img src="<?php echo esc_url($uc['icon']); ?>" alt="<?php echo esc_attr($uc['title']); ?>" loading="lazy"
                             onerror="this.outerHTML='<svg width=&quot;40&quot; height=&quot;40&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot;><circle cx=&quot;12&quot; cy=&quot;12&quot; r=&quot;9&quot;/></svg>'">
                    <?php elseif ($lucide) : ?>
                        <i data-lucide="<?php echo esc_attr($lucide); ?>" style="width:40px;height:40px;color:#19335D"></i>
                    <?php else : ?>
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#19335D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="9"/>
                        </svg>
                    <?php endif; ?>
                </div>
                <h3 class="uc-title"><?php echo esc_html($uc['title']); ?></h3>
                <p class="uc-body"><?php echo wp_kses_post($uc['desc']); ?></p>
                <div class="uc-link">
                    Learn More
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

        <footer style="text-align:center;" data-reveal>
            <a href="/book-demo/" class="uc-cta">
                Request a Demo
                <svg fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"></path></svg>
            </a>
        </footer>
    </div>
</section>

<script>
(function(){
    /* ── 1. Background particles ── */
    var canvas = document.getElementById('flowCanvas');
    if (canvas && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        var ctx = canvas.getContext('2d');
        var w, h, particles = [];
        function resize() {
            w = canvas.width  = canvas.parentElement.offsetWidth;
            h = canvas.height = canvas.parentElement.offsetHeight;
        }
        function FlowParticle() {
            this.init = function () {
                this.x = Math.random() * w;
                this.y = Math.random() * h;
                this.size = Math.random() * 2 + 0.5;
                this.speed = Math.random() * 0.4 + 0.1;
                this.opacity = Math.random() * 0.3;
            };
            this.init();
            this.draw = function () {
                ctx.fillStyle = 'rgba(25, 51, 93, ' + this.opacity + ')';
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            };
            this.update = function () {
                this.x += this.speed;
                this.y += Math.sin(this.x * 0.01) * 0.2;
                if (this.x > w) this.x = -10;
            };
        }
        function render() {
            ctx.clearRect(0, 0, w, h);
            particles.forEach(function (p) { p.update(); p.draw(); });
            requestAnimationFrame(render);
        }
        window.addEventListener('resize', resize, { passive: true });
        resize();
        for (var i = 0; i < 60; i++) particles.push(new FlowParticle());
        render();
    }

    /* ── 2. Scroll reveal ── */
    function revealHandler() {
        var reveals = document.querySelectorAll('#ee-usecase-section [data-reveal]');
        reveals.forEach(function (el, i) {
            var rect = el.getBoundingClientRect();
            var isVisible = rect.top < window.innerHeight - 80;
            if (isVisible && !el.classList.contains('visible')) {
                setTimeout(function () { el.classList.add('visible'); }, i * 80);
            }
        });
    }
    window.addEventListener('scroll', revealHandler, { passive: true });
    window.addEventListener('load', revealHandler);
    revealHandler();

    /* Re-initialise Lucide icons after PHP renders */
    if (window.lucide && typeof window.lucide.createIcons === 'function') {
        window.lucide.createIcons();
    }
})();
</script>

<?php get_footer();
