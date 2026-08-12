<?php
/**
 * The template for displaying the footer
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

/* ── Social icon artwork ─────────────────────────────────────────────────
   One place for the brand icons, shared by the footer and the article
   templates. Defined with a function_exists guard so whichever template
   loads first wins and the other reuses it.

   TO SWAP AN ICON: change its filename below.
   TO ADD ONE (youtube, say): add the key here and it is picked up
   automatically - anything not listed keeps the theme's existing glyph, so
   nothing breaks while artwork is missing. */
if (!function_exists('ee_social_icon_url')) {
    function ee_social_icon_url($key) {
        $base = 'https://www.extraaedge.com/wp-content/uploads/2026/social-icons/';
        $map  = array(
            'facebook'  => 'facebook-icon.webp',
            'instagram' => 'instagram-icon.webp',
            'linkedin'  => 'linkedin-icon.webp',
            'twitter'   => 'twitter-icon.webp',
            'whatsapp'  => 'whatsapp-icon.webp',
            'call'      => 'call-now-icon.webp',
        );
        return isset($map[$key]) ? $base . $map[$key] : '';
    }
}
?>

</main><!-- /#main-content (opened in header.php) -->

<!--  Start Footer Section -->

<!-- Fonts: Inter loads site-wide from header.php (design system: Inter only) -->
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
    /* RESET & BASE - variables scoped here (NOT to global :root) so they don't bleed into other sections */
    #extraaedge-footer-engine {
        all: unset;
        --ee-orange: #DE6E30;
        --ee-blue-brand: #19335D;
        --ee-slate-900: #0F172A;
        --ee-slate-600: #475569;
        --ee-slate-100: #F1F5F9;
        --ee-white: #FFFFFF;
        --ee-radius-lg: 24px;
        --ee-radius-sm: 12px;
        --ee-transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        /* flow-root contains the child sections' top/bottom margins so the
           first block's margin-top:10px can't escape and reveal the (dark)
           page background as a black strip above the footer. */
        display: flow-root;
        background: var(--ee-white);
        font-family: 'Inter', sans-serif;
        color: var(--ee-slate-900);
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
        width: 100%;
    }

    /* 10px Margin Rule */
    #extraaedge-footer-engine .ee-section-block {
        margin-top: 10px !important;
        margin-bottom: 10px !important;
        padding: 20px 0;
        display: block;
    }

    #extraaedge-footer-engine .ee-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 24px;
    }

    #extraaedge-footer-engine h2,
    #extraaedge-footer-engine h3,
    #extraaedge-footer-engine h4 { font-family: 'Inter', sans-serif; font-weight: 800; margin: 0; }
    #extraaedge-footer-engine ul { list-style: none; padding: 0; margin: 0; }
    #extraaedge-footer-engine a { text-decoration: none; color: inherit; transition: var(--ee-transition); display: inline-block; }

    /* 1. HERO CTA */
    #extraaedge-footer-engine .ee-hero-card {
        background: linear-gradient(135deg, var(--ee-slate-900) 0%, #1e293b 100%);
        color: white;
        border-radius: var(--ee-radius-lg);
        padding: clamp(40px, 6vw, 70px) 30px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    #extraaedge-footer-engine .ee-hero-h2 { font-size: clamp(26px, 4vw, 38px); margin-bottom: 15px; }
    #extraaedge-footer-engine .ee-hero-p { color: #94a3b8; max-width: 600px; margin: 0 auto 30px; font-size: 16px; }
    #extraaedge-footer-engine .ee-cta-flex { display: flex; gap: 15px; justify-content: center; flex-wrap: wrap; }
    #extraaedge-footer-engine .ee-btn {
        padding: 14px 32px;
        border-radius: var(--ee-radius-sm);
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        font-size: 15px;
        min-width: 200px;
        justify-content: center;
    }
    #extraaedge-footer-engine .ee-btn-call { background: var(--ee-orange); color: white; box-shadow: 0 10px 20px rgba(222, 110, 48, 0.2); }
    #extraaedge-footer-engine .ee-btn-wa { background: #25D366; color: white; box-shadow: 0 10px 20px rgba(37, 211, 102, 0.2); }
    #extraaedge-footer-engine .ee-btn:hover { transform: translateY(-3px); filter: brightness(1.1); }

    /* 2. CONTACT CONNECTORS */
    #extraaedge-footer-engine .ee-contact-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }
    #extraaedge-footer-engine .ee-glass-card {
        background: var(--ee-slate-100);
        padding: 30px;
        border-radius: var(--ee-radius-lg);
        transition: var(--ee-transition);
        border: 1px solid transparent;
    }
    #extraaedge-footer-engine .ee-glass-card:hover { background: white; border-color: var(--ee-orange); box-shadow: 0 20px 40px rgba(0,0,0,0.05); }
    #extraaedge-footer-engine .ee-label { font-size: 11px; font-weight: 800; text-transform: uppercase; color: var(--ee-orange); letter-spacing: 1.5px; margin-bottom: 12px; display: block; }
    #extraaedge-footer-engine .ee-card-title { font-size: 20px; margin-bottom: 18px; color: var(--ee-blue-brand); }
    #extraaedge-footer-engine .ee-link-item { display: flex; align-items: center; gap: 12px; margin-bottom: 10px; font-size: 15px; font-weight: 600; color: var(--ee-slate-600); }
    #extraaedge-footer-engine .ee-link-item i { color: var(--ee-blue-brand); width: 20px; }
    #extraaedge-footer-engine .ee-link-item .ee-link-art { width: 20px; height: 20px; object-fit: contain; flex-shrink: 0; }
    #extraaedge-footer-engine .ee-link-item a:hover { color: var(--ee-orange); transform: translateX(5px); }

    /* 3. COMPLIANCE (DARK THEME #19335D) */
    #extraaedge-footer-engine .ee-compliance-block {
        background: var(--ee-blue-brand);
        color: white;
        border-radius: var(--ee-radius-lg);
        padding: 40px;
    }
    #extraaedge-footer-engine .ee-compliance-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 30px;
    }
    #extraaedge-footer-engine .ee-cert-group { display: flex; gap: 50px; align-items: center; flex-wrap: wrap; justify-content: center; }
    #extraaedge-footer-engine .ee-cert-item { display: flex; flex-direction: column; align-items: center; gap: 10px; text-align: center; }
    #extraaedge-footer-engine .ee-cert-item img {
        height: 75px;
        width: auto;
        object-fit: contain;
        filter: drop-shadow(0 0 8px rgba(255,255,255,0.2));
        display: block;
    }
    #extraaedge-footer-engine .ee-cert-item p { font-size: 11px; font-weight: 800; opacity: 0.8; text-transform: uppercase; margin: 0; letter-spacing: 1px; }

    /* 4. APP-STYLE NAV MENU - 6-column grid that mirrors the header.
       Desktop: 6 cols, tablet: 3 cols, mobile: collapsible accordions. */
    #extraaedge-footer-engine .ee-nav-matrix {
        display: grid;
        grid-template-columns: repeat(6, minmax(0, 1fr));
        gap: 28px;
        padding: 40px 0;
        border-bottom: 1px solid var(--ee-slate-100);
    }
    @media (max-width: 1200px) {
        #extraaedge-footer-engine .ee-nav-matrix { grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 24px; }
    }
    #extraaedge-footer-engine .ee-nav-title { font-size: 12px; text-transform: uppercase; letter-spacing: 2px; color: var(--ee-slate-900); font-weight: 800; margin-bottom: 18px; display: block; }
    #extraaedge-footer-engine .ee-nav-matrix ul { list-style: none; margin: 0; padding: 0; }
    #extraaedge-footer-engine .ee-nav-matrix li { margin-bottom: 9px; line-height: 1.35; }
    #extraaedge-footer-engine .ee-nav-matrix a { color: var(--ee-slate-600); font-size: 13.5px; font-weight: 500; display: inline-block; transition: color .2s ease, transform .2s ease; }
    #extraaedge-footer-engine .ee-nav-matrix a:hover { color: var(--ee-orange); transform: translateX(4px); }

    /* 5. ECOSYSTEM & SOCIAL */
    #extraaedge-footer-engine .ee-ecosystem-bar {
        padding: 40px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 25px;
    }
    #extraaedge-footer-engine .ee-social-cluster { display: flex; gap: 12px; }
    #extraaedge-footer-engine .ee-social-icon {
        width: 44px; height: 44px;
        background: var(--ee-slate-100);
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 18px; color: var(--ee-blue-brand);
    }
    #extraaedge-footer-engine .ee-social-icon:hover { background: var(--ee-orange); color: white; transform: translateY(-5px); }
    /* The brand artwork carries its own colour and shape, so it drops the
       grey chip and the orange hover fill that the glyph version needs. */
    #extraaedge-footer-engine .ee-social-icon--art,
    #extraaedge-footer-engine .ee-social-icon--art:hover { background: none; }
    #extraaedge-footer-engine .ee-social-icon--art img { width: 100%; height: 100%; object-fit: contain; display: block; }
    /* YouTube has no artwork file yet, so its glyph is drawn at chip size in
       the platform's own red - it reads at the same weight as the artwork
       tiles beside it instead of a small mark lost in a grey chip. */
    #extraaedge-footer-engine .ee-social-icon .fa-youtube { font-size: 40px; color: #FF0000; }
    #extraaedge-footer-engine .ee-social-icon:has(.fa-youtube),
    #extraaedge-footer-engine .ee-social-icon:has(.fa-youtube):hover { background: none; }
    #extraaedge-footer-engine .ee-store-cluster { display: flex; gap: 12px; }
    #extraaedge-footer-engine .ee-store-cluster img { height: 40px; }

    /* 6. LEGAL FOOTER */
    #extraaedge-footer-engine .ee-legal-footer {
        background: #f8fafc;
        text-align: center;
        border-radius: var(--ee-radius-lg);
        padding: 40px 20px !important;
    }
    #extraaedge-footer-engine .ee-copy-text { font-weight: 700; font-size: 14px; margin-bottom: 20px; display: block; color: var(--ee-slate-600); }
    #extraaedge-footer-engine .ee-legal-links { display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; }
    #extraaedge-footer-engine .ee-legal-links a { font-size: 13px; color: var(--ee-slate-600); font-weight: 600; }
    #extraaedge-footer-engine .ee-legal-links a:hover { color: var(--ee-orange); }

    /* REVEAL ANIMATIONS */
    #extraaedge-footer-engine .ee-reveal { opacity: 0; transform: translateY(30px); transition: 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
    #extraaedge-footer-engine .ee-reveal.visible { opacity: 1; transform: translateY(0); }

    /* MOBILE ACCORDION */
    @media (max-width: 768px) {
        #extraaedge-footer-engine .ee-nav-matrix { grid-template-columns: 1fr; gap: 10px; }
        #extraaedge-footer-engine .ee-nav-col { background: var(--ee-slate-100); border-radius: 16px; padding: 16px 20px; }
        #extraaedge-footer-engine .ee-nav-col ul { max-height: 0; overflow: hidden; transition: max-height 0.3s ease; }
        #extraaedge-footer-engine .ee-nav-col.active ul { max-height: 600px; margin-top: 15px; }
        #extraaedge-footer-engine .ee-nav-title { margin-bottom: 0; display: flex; justify-content: space-between; align-items: center; cursor: pointer; }
        #extraaedge-footer-engine .ee-nav-title::after { content: '\f078'; font-family: 'Font Awesome 6 Free'; font-weight: 900; font-size: 12px; }
        #extraaedge-footer-engine .ee-nav-col.active .ee-nav-title::after { content: '\f077'; }
        #extraaedge-footer-engine .ee-compliance-flex { text-align: center; justify-content: center; }
        #extraaedge-footer-engine .ee-ecosystem-bar { flex-direction: column; }
    }
</style>

<style id="ee-footer-boundary-fix">
    /* Belt-and-suspenders: never let a dark page background show as a strip
       directly above the footer. Force the wrappers white on the home page and
       drop the first footer block's collapsing top margin. */
    body.home, body.home #main-content { background-color: #ffffff !important; }
    #extraaedge-footer-engine { margin-top: 0 !important; }
    #extraaedge-footer-engine > *:first-child { margin-top: 0 !important; }
</style>

<?php do_action('ee_before_footer'); ?>

<?php if (!function_exists('ee_should_hide_part') || !ee_should_hide_part('footer')): ?>
<div id="extraaedge-footer-engine">

    <!-- Closing positioning statement (brand audit #40) + the story's last door -->
    <section class="ee-container" style="text-align:center;padding:34px 22px 0">
        <a href="/book-a-demo/" style="display:inline-flex;align-items:center;gap:8px;background:#DE6E30;color:#fff;font-family:'Inter',system-ui,sans-serif;font-weight:800;font-size:14.5px;border-radius:999px;padding:14px 30px;text-decoration:none;box-shadow:0 14px 30px -12px rgba(222,110,48,.6);margin-bottom:18px">Book a Demo &rarr;</a>
        <p style="margin:0;font-family:'Inter',system-ui,sans-serif;font-size:15px;font-weight:800;color:#19335D;line-height:1.55">ExtraaEdge - India&rsquo;s Intelligent Admissions Growth Platform.
            <span style="display:block;font-size:13px;font-weight:600;color:#5a6b85;margin-top:4px">Built for education. Driven by AI simplicity.</span></p>
    </section>


    <!-- Contact Grid -->
    <section class="ee-container ee-section-block">
        <div class="ee-contact-grid">
            <div class="ee-glass-card ee-reveal">
                <span class="ee-label">Quick Connect</span>
                <h3 class="ee-card-title">Emails</h3>
                <div class="ee-link-item"><i class="fa-solid fa-envelope"></i><a href="mailto:sales@theextraaedge.com">sales@theextraaedge.com</a></div>
                <div class="ee-link-item"><i class="fa-solid fa-paper-plane"></i><a href="mailto:hiring@theextraaedge.com">hiring@theextraaedge.com</a></div>
            </div>
            <div class="ee-glass-card ee-reveal">
                <span class="ee-label">Growth</span>
                <h3 class="ee-card-title">Sales & Partnerships</h3>
                <div class="ee-link-item"><i class="fa-solid fa-handshake"></i><a href="tel:+919028065511">9028065511</a></div>
                <div class="ee-link-item"><i class="fa-solid fa-headset"></i><a href="tel:+918956982897">8956982897</a></div>
            </div>
            <?php /* HR card is careers-only — hidden on every other page */
            if (is_page('careers') || is_post_type_archive('career') || is_singular('career')) : ?>
            <div class="ee-glass-card ee-reveal">
                <span class="ee-label">Talent</span>
                <h3 class="ee-card-title">Openings & HR</h3>
                <div class="ee-link-item"><i class="fa-solid fa-user-plus"></i><a href="tel:+918956755927">8956755927</a></div>
                <div class="ee-link-item"><img class="ee-link-art" src="<?php echo esc_url(ee_social_icon_url('whatsapp')); ?>" alt="" width="20" height="20" loading="lazy" decoding="async"><a href="https://api.whatsapp.com/send/?phone=918956982897&text=Hi" target="_blank" rel="noopener">Chat with HR</a></div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Compliance Section -->
    <section class="ee-container ee-section-block">
        <div class="ee-compliance-block ee-reveal">
            <div class="ee-compliance-flex">
                <div class="ee-comp-text">
                    <h3 style="color:white; margin-bottom:10px; font-size:24px;">Global Data Integrity</h3>
                    <p style="opacity:0.6; font-size:15px; margin:0;">Secured with enterprise-grade standards.</p>
                </div>
                <div class="ee-cert-group">
                    <div class="ee-cert-item">
                        <img src="https://www.extraaedge.com/wp-content/uploads/2025/09/iso-0001.png" alt="ISO 27001 Certified" loading="lazy">
                        <p>ISO 27001</p>
                    </div>
                    <div class="ee-cert-item">
                        <img src="https://www.extraaedge.com/wp-content/uploads/2025/09/GDPR-NEW.png" alt="GDPR Compliant" loading="lazy">
                        <p>GDPR Compliant</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nav Matrix -->
    <section class="ee-container ee-section-block">
        <?php
        /* Footer nav mirrors the header mega-menu structure so the
           editor only manages content in ONE place - the same
           helpers feed the header dropdowns and these footer cols. */
        $ft_products   = function_exists('ee_get_product_menu_items')  ? ee_get_product_menu_items()  : array();
        $ft_industries = function_exists('ee_get_industry_menu_items') ? ee_get_industry_menu_items() : array();
        $ft_usecases   = function_exists('ee_get_usecase_items')       ? ee_get_usecase_items()       : array();
        $ft_solutions  = function_exists('ee_get_solution_items')      ? ee_get_solution_items()      : array('admission'=>array(),'study_abroad'=>array(),'recruitment'=>array());

        /* Hide products marked "Hide from menu" in admin */
        $ft_products = array_filter($ft_products, function ($p) {
            return !isset($p['column']) || $p['column'] !== 'hidden';
        });

        /* Flatten all 3 Solutions columns into one list for the footer column */
        $ft_solutions_flat = array();
        foreach (array('admission','study_abroad','recruitment') as $sc) {
            if (!empty($ft_solutions[$sc]) && is_array($ft_solutions[$sc])) {
                foreach ($ft_solutions[$sc] as $row) $ft_solutions_flat[] = $row;
            }
        }
        ?>
        <nav class="ee-nav-matrix ee-reveal" aria-label="Footer navigation">
            <!-- Products -->
            <div class="ee-nav-col">
                <span class="ee-nav-title">Products</span>
                <ul>
                    <?php foreach ($ft_products as $p) : ?>
                        <li><a href="<?php echo esc_url($p['url']); ?>"><?php echo esc_html($p['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Solutions -->
            <div class="ee-nav-col">
                <span class="ee-nav-title">Solutions</span>
                <ul>
                    <?php foreach ($ft_solutions_flat as $s) :
                        $url = !empty($s['url']) ? $s['url'] : '#';
                        if (strpos($url, 'http') !== 0 && strpos($url, '//') !== 0) {
                            $url = home_url($url);
                        }
                    ?>
                        <li><a href="<?php echo esc_url($url); ?>"><?php echo esc_html($s['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Industries -->
            <div class="ee-nav-col">
                <span class="ee-nav-title">Industries</span>
                <ul>
                    <?php foreach ($ft_industries as $ind) : ?>
                        <li><a href="<?php echo esc_url($ind['url']); ?>"><?php echo esc_html($ind['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Use Cases -->
            <div class="ee-nav-col">
                <span class="ee-nav-title">Use Cases</span>
                <ul>
                    <?php foreach ($ft_usecases as $uc) : ?>
                        <li><a href="<?php echo esc_url($uc['url']); ?>"><?php echo esc_html($uc['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Resources (matches header Resources dropdown) -->
            <div class="ee-nav-col">
                <span class="ee-nav-title">Resources</span>
                <ul>
                    <?php $ef_res = function_exists('ee_get_resources_menu_items') ? ee_get_resources_menu_items() : array();
                    foreach ($ef_res as $ef_r): ?>
                        <li><a href="<?php echo esc_url($ef_r['url'] ?? '#'); ?>"><?php echo esc_html($ef_r['title'] ?? ''); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Company (matches header Company dropdown) -->
            <div class="ee-nav-col">
                <span class="ee-nav-title">Company</span>
                <ul>
                    <?php $ef_co = function_exists('ee_get_company_menu_items') ? ee_get_company_menu_items() : array();
                    foreach ($ef_co as $ef_c): ?>
                        <li><a href="<?php echo esc_url($ef_c['url'] ?? '#'); ?>"><?php echo esc_html($ef_c['title'] ?? ''); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>

        <div class="ee-ecosystem-bar ee-reveal">
            <div class="ee-social-cluster">
                <?php
                $ef_soc = function_exists('ee_get_social_links') ? ee_get_social_links() : array();
                $ef_soc_icons = array(
                    'facebook'  => array('fa-facebook-f', 'Facebook'),
                    'instagram' => array('fa-instagram',  'Instagram'),
                    'youtube'   => array('fa-youtube',    'YouTube'),
                    'twitter'   => array('fa-x-twitter',  'Twitter X'),
                    'linkedin'  => array('fa-linkedin-in','LinkedIn'),
                );
                foreach ($ef_soc_icons as $ef_key => $ef_meta):
                    $ef_url = $ef_soc[$ef_key] ?? '';
                    if (!$ef_url) continue;
                    /* Brand artwork where we have it, Font Awesome otherwise -
                       which is what still draws YouTube. */
                    $ef_ico = ee_social_icon_url($ef_key); ?>
                    <a href="<?php echo esc_url($ef_url); ?>" class="ee-social-icon<?php echo $ef_ico ? ' ee-social-icon--art' : ''; ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr($ef_meta[1]); ?>"><?php
                    if ($ef_ico) : ?><img src="<?php echo esc_url($ef_ico); ?>" alt="" width="44" height="44" loading="lazy" decoding="async"><?php
                    else : ?><i class="fa-brands <?php echo esc_attr($ef_meta[0]); ?>"></i><?php
                    endif; ?></a>
                <?php endforeach; ?>
            </div>
            <div class="ee-store-cluster">
                <a href="https://play.google.com/store/apps/details?id=com.extraaedge.android&hl=en_in" target="_blank" rel="noopener"><img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Get it on Google Play" loading="lazy"></a>
                <a href="https://apps.apple.com/in/app/extraaedge-new/id6449466185" target="_blank" rel="noopener"><img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg" alt="Download on the App Store" loading="lazy"></a>
            </div>
        </div>
    </section>

    <!-- Legal Footer -->
    <?php $ef_set = function_exists('ee_get_footer_settings') ? ee_get_footer_settings() : array('copyright' => '', 'legal_links' => array()); ?>
    <section class="ee-container ee-section-block">
        <div class="ee-legal-footer">
            <span class="ee-copy-text"><?php echo esc_html($ef_set['copyright']); ?></span>
            <div class="ee-legal-links">
                <?php foreach ((array) ($ef_set['legal_links'] ?? array()) as $ef_l):
                    $ef_ext = !empty($ef_l['url']) && strpos($ef_l['url'], home_url()) !== 0; ?>
                    <a href="<?php echo esc_url($ef_l['url'] ?? '#'); ?>"<?php echo $ef_ext ? ' target="_blank" rel="noopener"' : ''; ?>><?php echo esc_html($ef_l['title'] ?? ''); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
<?php endif; ?>

<script>
(function() {
    // Entrance Animations
    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) entry.target.classList.add('visible');
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('#extraaedge-footer-engine .ee-reveal').forEach(function(el) {
            observer.observe(el);
        });
    } else {
        document.querySelectorAll('#extraaedge-footer-engine .ee-reveal').forEach(function(el) {
            el.classList.add('visible');
        });
    }

    // Mobile Accordion
    var navCols = document.querySelectorAll('#extraaedge-footer-engine .ee-nav-col');
    navCols.forEach(function(col) {
        var title = col.querySelector('.ee-nav-title');
        if (title) {
            title.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    var isActive = col.classList.contains('active');
                    navCols.forEach(function(c) { c.classList.remove('active'); });
                    if (!isActive) col.classList.add('active');
                }
            });
        }
    });
})();
</script>

<!-- End Footer Section -->

<?php if (!is_singular('post')): /* blog posts (single.php) already ship their own complete
   WhatsApp/Call/TOC floating system with a reading-progress badge —
   rendering this one too would show two overlapping stacks. */ ?>
<!-- ============ SITE-WIDE FLOATING ACTIONS: TOC sheet + WhatsApp + Call — ee-footer-tpl v2026-08-03-fab-nounderline ============ -->
<style id="ee-fabs-css">
/* ── The article template's floating widget, verbatim ────────────────────
   Copied out of single.php rule for rule, with its --b-* variables
   resolved to the literals they hold there (border #E5E7EB, muted
   #6B7280, orange #DE6E30 / dark #B85920 / light #FFF3EC, blue #19335D).
   The class names are kept identical on purpose: the site-wide
   ee-brand-tokens stylesheet in functions.php carries !important rules
   for .ee-float-btn / .ee-float-whatsapp / .ee-float-call /
   .ee-book-bubble, so reusing the names is what makes this render
   pixel-for-pixel like a blog post instead of merely close to it.
   single.php still owns its own copy; this whole block is skipped there. */

/* TOC button - docks bottom-LEFT, the side single.php puts it on, so it
   never lands on top of the contact stack. Only ever visible <=1200px on
   a page that actually has a Contents box. */
.ee-fabs{position:fixed;left:14px;bottom:16px;display:flex;flex-direction:column;gap:14px;z-index:996}
.ee-fab{width:50px;height:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;border:2.5px solid #fff;cursor:pointer;box-shadow:0 6px 14px rgba(15,32,64,.28);transition:transform .2s,box-shadow .2s;text-decoration:none}
.ee-fab:hover,.ee-fab:focus-visible{transform:translateY(-2px) scale(1.05);box-shadow:0 10px 22px rgba(15,32,64,.34)}
.ee-fab svg{width:22px;height:22px}
.ee-fab-toc{background:#19335D;color:#fff;display:none}
@media(max-width:1200px){.ee-fab-toc.ee-has-toc{display:flex}}

/* Book Demo bubble */
.ee-book-bubble{position:fixed;right:20px;bottom:160px;background:#fff;color:#DE6E30 !important;border:2px solid #DE6E30;text-decoration:none;padding:9px 18px 9px 14px;border-radius:50px;display:inline-flex;align-items:center;gap:8px;font-size:13.5px;font-weight:700;box-shadow:0 8px 22px rgba(222,110,48,.18);z-index:990;transition:all .2s ease;}
.ee-book-bubble:hover{background:#FFF3EC;color:#B85920 !important;border-color:#B85920;transform:translateY(-2px) scale(1.04);box-shadow:0 12px 28px rgba(222,110,48,.25);}
.ee-book-bubble svg{color:inherit;width:18px;height:18px;}
.ee-book-bubble img.ee-qn-img{width:18px !important;height:18px !important;}

/* WhatsApp / Call stack */
.ee-floating-contact{position:fixed;right:20px;bottom:20px;display:flex;flex-direction:column;gap:12px;z-index:1000;}
.ee-float-btn{display:flex;align-items:center;gap:10px;padding:11px 18px 11px 14px;border-radius:50px;background:#fff;border:1px solid #E5E7EB;font-weight:600;font-size:13.5px;text-decoration:none;box-shadow:0 6px 20px rgba(15,32,64,.12);transition:all .25s ease;cursor:pointer;font-family:inherit;}
.ee-float-btn:hover{transform:translateY(-2px) scale(1.03);box-shadow:0 12px 28px rgba(15,32,64,.18);}
.ee-float-btn .ee-float-icon-wrap{width:34px;height:34px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;overflow:hidden;background:transparent !important;}
.ee-float-btn .ee-float-icon-wrap svg{width:18px;height:18px;}
/* Brand artwork brings its own colour disc, so the tinted circle behind it
   is dropped and the image fills the wrap. */
.ee-float-btn .ee-float-icon-wrap.ee-float-icon-art{background:none !important;animation:none;}
.ee-float-btn .ee-float-icon-wrap.ee-float-icon-art img{width:100%;height:100%;object-fit:contain;display:block;}
.ee-float-btn .ee-float-label{display:flex;flex-direction:column;line-height:1.15;}
.ee-float-btn .ee-float-label small{font-size:10px;font-weight:500;letter-spacing:.04em;text-transform:uppercase;color:#6B7280;}
.ee-float-btn .ee-float-label strong{font-size:13px;font-weight:700;letter-spacing:.01em;color:#19335D;}
.ee-float-whatsapp{color:#1DA851;}
.ee-float-whatsapp .ee-float-icon-wrap{background:rgba(37,211,102,.14);color:#1DA851;animation:ee-wa-pulse 2.4s infinite;}
@keyframes ee-wa-pulse{0%,100%{box-shadow:0 0 0 0 rgba(37,211,102,.35);}50%{box-shadow:0 0 0 8px rgba(37,211,102,0);}}
.ee-float-call{color:#DE6E30;}
.ee-float-call .ee-float-icon-wrap{background:#FFF3EC;color:#DE6E30;}
.ee-float-call .ee-float-icon-wrap svg{animation:ee-phone-shake 1.6s infinite;}
@keyframes ee-phone-shake{0%,60%,100%{transform:rotate(0);}10%,30%,50%{transform:rotate(-12deg);}20%,40%{transform:rotate(12deg);}}

/* No underline, ever. These sit outside #main-content, so whichever
   stylesheet was drawing a rule under the label on hover (text-decoration,
   a border, or the gradient-underline trick) is shut off here for every
   state. Only the box itself reacts - lift + shadow, nothing on the text. */
.ee-book-bubble,.ee-book-bubble:link,.ee-book-bubble:visited,.ee-book-bubble:hover,.ee-book-bubble:focus,.ee-book-bubble:active,.ee-book-bubble *,
.ee-floating-contact .ee-float-btn,.ee-floating-contact .ee-float-btn:link,.ee-floating-contact .ee-float-btn:visited,.ee-floating-contact .ee-float-btn:hover,.ee-floating-contact .ee-float-btn:focus,.ee-floating-contact .ee-float-btn:active,.ee-floating-contact .ee-float-btn *{
    text-decoration:none !important;
    text-decoration-line:none !important;
}
/* Borders and gradient-underlines are killed on the inner spans only, so
   the pill's own 1px border and the Book Demo outline survive. */
.ee-book-bubble span,.ee-book-bubble span *,
.ee-floating-contact .ee-float-btn span,.ee-floating-contact .ee-float-btn span *{
    border:0 !important;
    background-image:none !important;
}
/* box-shadow is reset on the label only - the icon wrap needs its own,
   that is what draws the WhatsApp pulse ring. */
.ee-book-bubble span,.ee-book-bubble span *,
.ee-floating-contact .ee-float-label,.ee-floating-contact .ee-float-label *{
    box-shadow:none !important;
}

@media (max-width:820px){
    /* Same as the article: the bubble steps aside on phones. */
    .ee-book-bubble{display:none !important;}
    /* single.php parks the stack at bottom:110px to clear its sticky
       "Book Demo Now" bar. No other template has that bar, so the stack
       keeps the desktop 20px offset here and everything else matches. */
    .ee-floating-contact{right:12px;bottom:20px;gap:8px;z-index:999;}
    .ee-floating-contact .ee-float-btn{padding:8px 14px 8px 10px;font-size:12px;}
    .ee-floating-contact .ee-float-icon-wrap{width:30px;height:30px;}
    .ee-floating-contact .ee-float-icon-wrap svg{width:16px;height:16px;}
    .ee-fabs{left:12px;bottom:20px;}
}
@media (max-width:480px){
    .ee-floating-contact .ee-float-btn .ee-float-label{display:none;}
    .ee-floating-contact .ee-float-btn{padding:8px;border-radius:50%;width:44px;height:44px;justify-content:center;box-sizing:border-box;}
    .ee-floating-contact .ee-float-icon-wrap{width:24px;height:24px;background:transparent !important;}
}
.ee-toc-backdrop{position:fixed;inset:0;background:rgba(10,20,40,.45);opacity:0;visibility:hidden;transition:opacity .25s;z-index:997}
.ee-toc-backdrop.open{opacity:1;visibility:visible}
.ee-toc-sheet{position:fixed;left:0;right:0;bottom:0;background:#fff;border-radius:18px 18px 0 0;box-shadow:0 -14px 40px rgba(15,32,64,.25);transform:translateY(105%);transition:transform .3s cubic-bezier(.3,.8,.3,1);z-index:998;max-height:72vh;display:flex;flex-direction:column}
.ee-toc-sheet.open{transform:none}
.ee-toc-sheet-head{display:flex;align-items:center;justify-content:space-between;padding:14px 18px 10px;font:700 15px/1 Inter,system-ui,sans-serif;color:#19335D;border-bottom:1px solid #EDF1F7}
.ee-toc-sheet-head button{border:0;background:#F1F5FA;color:#19335D;width:32px;height:32px;border-radius:50%;font-size:15px;cursor:pointer}
.ee-toc-sheet-body{overflow-y:auto;padding:8px 18px 24px}
.ee-toc-sheet-body .toc-wrapper{position:static!important;box-shadow:none!important}
</style>
<?php if (is_front_page()) echo '<style>.ee-fab-toc{display:none!important}</style>'; ?>
<div class="ee-fabs">
  <button type="button" class="ee-fab ee-fab-toc" id="eeFabToc" aria-label="Open table of contents" aria-expanded="false">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M8 6h13M8 12h13M8 18h13"/><circle cx="3.5" cy="6" r="1.3" fill="currentColor" stroke="none"/><circle cx="3.5" cy="12" r="1.3" fill="currentColor" stroke="none"/><circle cx="3.5" cy="18" r="1.3" fill="currentColor" stroke="none"/></svg>
  </button>
</div>

<!-- Book Demo bubble + WhatsApp / Call stack — identical markup to single.php -->
<?php /* Book-Demo floating bubble removed 2026-08-10 - the WhatsApp / Call
         stack below stays; header CTA + in-page CTAs cover demo booking. */ ?>
<div class="ee-floating-contact" role="region" aria-label="Quick contact">
  <a class="ee-float-btn ee-float-whatsapp" href="https://api.whatsapp.com/send/?phone=918956982897" target="_blank" rel="noopener" aria-label="WhatsApp">
    <span class="ee-float-icon-wrap ee-float-icon-art"><img src="<?php echo esc_url(ee_social_icon_url('whatsapp')); ?>" alt="" loading="lazy" decoding="async"></span>
    <span class="ee-float-label"><small>Chat on</small><strong>WhatsApp</strong></span>
  </a>
  <a class="ee-float-btn ee-float-call" href="tel:+918956982897" aria-label="Call us">
    <span class="ee-float-icon-wrap ee-float-icon-art"><img src="<?php echo esc_url(ee_social_icon_url('call')); ?>" alt="" loading="lazy" decoding="async"></span>
    <span class="ee-float-label"><small>Call us</small><strong>+91 89569 82897</strong></span>
  </a>
</div>
<div class="ee-toc-backdrop" id="eeTocBackdrop"></div>
<div class="ee-toc-sheet" id="eeTocSheet" role="dialog" aria-modal="true" aria-label="Table of contents">
  <div class="ee-toc-sheet-head">Contents <button type="button" id="eeTocClose" aria-label="Close">&#10005;</button></div>
  <div class="ee-toc-sheet-body" id="eeTocSheetBody"></div>
</div>
<script>
(function(){
  /* belt-and-suspenders: if any old/cached markup or a theme override ever
     leaves a second floating-action stack in the DOM, keep only the first. */
  ['.ee-fabs', '.ee-floating-contact', '.ee-book-bubble'].forEach(function(sel){
    var dupes = document.querySelectorAll(sel);
    for (var i = 1; i < dupes.length; i++) dupes[i].remove();
  });
  var fab=document.getElementById('eeFabToc'), sheet=document.getElementById('eeTocSheet'),
      back=document.getElementById('eeTocBackdrop'), body=document.getElementById('eeTocSheetBody'),
      closeBtn=document.getElementById('eeTocClose'), home=null, moved=false;
  if(!fab||!sheet) return;
  /* Show the TOC icon only on pages that actually have a Contents box —
     most site pages won't, so the icon must not appear (and do nothing)
     on every page just because the FABs are now site-wide. */
  if (document.getElementById('toc')) fab.classList.add('ee-has-toc');
  function openSheet(){
    var t=document.getElementById('toc');
    if(t && !moved){ home=t.parentNode; body.appendChild(t); moved=true; }
    sheet.classList.add('open'); back.classList.add('open'); fab.setAttribute('aria-expanded','true');
  }
  function closeSheet(){ sheet.classList.remove('open'); back.classList.remove('open'); fab.setAttribute('aria-expanded','false'); }
  fab.addEventListener('click', function(){ sheet.classList.contains('open') ? closeSheet() : openSheet(); });
  closeBtn.addEventListener('click', closeSheet);
  back.addEventListener('click', closeSheet);
  body.addEventListener('click', function(e){ if(e.target.closest('a')) closeSheet(); });
  window.addEventListener('resize', function(){
    if(moved && home && window.innerWidth>1200){ var t=document.getElementById('toc'); if(t){ home.appendChild(t); moved=false; closeSheet(); } }
  });
})();
</script>
<?php endif; ?>

<!-- ee-footer v2026-07-31-menu-modern -->
<!-- (removed) ee-menu-modern - the menu surface is part of the header
     redesign now, so keeping a second copy here only fought it. -->

<style id="ee-btn-standard">
/* ── One button, everywhere ──────────────────────────────────────────────
   Every call to action across the site renders as the same orange
   gradient button: 10px corners, white 700 label, a trailing arrow and a
   soft orange shadow. This lives in the footer because the footer is the
   one template that loads on every page and renders last, so it settles
   the look after any section stylesheet has had its say.

   Scope is calls to action only. Controls that are not CTAs - filter
   pills, carousel arrows, FAQ toggles, the search clear - keep their own
   styling; making those orange too would leave a page with no visual
   hierarchy left. */
.ee-home .btn.btn-primary,.ee-home .btn.btn-dark,
#site-header .eh-cta,
#trusted-institutions .btn-primary,
.eep-explore-btn,.eep-mbook,
#stories .cis-btn.primary,
#ee-cro .roi-out .cta,#ee-switch .swl .cta,#ee-platform .eep-cta-btn,
.vsx-apply,.vsx-cta-btn,.vsx-card-cta,
#ee-solutions .solb-cta,
.eebk-book,
#ee-form-7 input[type="submit"],#ee-form-7 button[type="submit"],
.ee-btn{
  display:inline-flex!important; align-items:center!important; justify-content:center!important;
  gap:10px!important;
  background:linear-gradient(135deg,#E8843F 0%,#DE6E30 100%)!important;
  color:#fff!important;
  border:0!important; border-radius:10px!important;
  font-family:'Inter',system-ui,sans-serif!important;
  font-weight:700!important; letter-spacing:-.01em!important;
  text-decoration:none!important;
  box-shadow:0 10px 24px -8px rgba(222,110,48,.6)!important;
  transition:transform .2s ease, box-shadow .2s ease, background .2s ease!important;
}
.ee-home .btn.btn-primary:hover,.ee-home .btn.btn-dark:hover,
#site-header .eh-cta:hover,
#trusted-institutions .btn-primary:hover,
.eep-explore-btn:hover,.eep-mbook:hover,
#stories .cis-btn.primary:hover,
#ee-cro .roi-out .cta:hover,#ee-switch .swl .cta:hover,#ee-platform .eep-cta-btn:hover,
.vsx-apply:hover,.vsx-cta-btn:hover,.vsx-card-cta:hover,
#ee-solutions .solb-cta:hover,
.eebk-book:hover,
#ee-form-7 input[type="submit"]:hover,#ee-form-7 button[type="submit"]:hover,
.ee-btn:hover{
  background:linear-gradient(135deg,#DE6E30 0%,#C25F26 100%)!important;
  transform:translateY(-2px)!important;
  box-shadow:0 14px 30px -8px rgba(222,110,48,.72)!important;
}
.ee-home .btn.btn-primary:focus-visible,
#site-header .eh-cta:focus-visible,
.eep-explore-btn:focus-visible,.vsx-apply:focus-visible,
#ee-solutions .solb-cta:focus-visible,.eebk-book:focus-visible,
.ee-btn:focus-visible{
  outline:3px solid var(--focus-ring,#1A5FB4)!important; outline-offset:3px!important;
}
/* the trailing arrow, added only where the button does not already carry
   an icon of its own */
.ee-home .btn.btn-primary:not(:has(svg)):not(:has(img)):not(:has(.arr))::after,
#site-header .eh-cta:not(:has(svg)):not(:has(img)):not(:has(.arr))::after,
#trusted-institutions .btn-primary:not(:has(svg)):not(:has(img)):not(:has(.arr))::after,
.eep-explore-btn:not(:has(svg)):not(:has(img)):not(:has(.arr))::after,
.eep-mbook:not(:has(svg)):not(:has(img)):not(:has(.arr))::after,
.vsx-cta-btn:not(:has(svg)):not(:has(img)):not(:has(.arr))::after,
#stories .cis-btn.primary:not(:has(svg)):not(:has(img)):not(:has(.arr))::after,
#ee-cro .roi-out .cta:not(:has(svg)):not(:has(img)):not(:has(.arr))::after,
#ee-switch .swl .cta:not(:has(svg)):not(:has(img)):not(:has(.arr))::after,
#ee-platform .eep-cta-btn:not(:has(svg)):not(:has(img)):not(:has(.arr))::after,
.vsx-apply:not(:has(svg)):not(:has(img)):not(:has(.arr))::after,
#ee-solutions .solb-cta:not(:has(svg)):not(:has(img)):not(:has(.arr))::after,
.eebk-book:not(:has(svg)):not(:has(img)):not(:has(.arr))::after,
.ee-btn:not(:has(svg)):not(:has(img)):not(:has(.arr))::after{
  content:"\2192"; display:inline-block!important; font-size:1.05em; line-height:1;
  opacity:1; transform:none; position:static; width:auto; height:auto;
  background:none; border:0; box-shadow:none;
}
/* an arrow that came in a span is sized like the one the standard draws */
.arr{ font-size:1.05em!important; line-height:1!important; }
/* icons that came with a button sit at the arrow's size and colour */
.ee-home .btn.btn-primary svg,.eep-explore-btn svg,.eep-explore-btn img,
.eebk-book svg,#ee-solutions .solb-cta svg,.ee-btn svg{
  width:17px!important; height:17px!important; }
/* the Vidya card CTA carried its arrow in a white disc - flatten it so it
   matches the plain arrow every other button now shows */
.vsx-apply .vsx-arw2{ background:none!important; color:#fff!important;
  width:auto!important; height:auto!important; box-shadow:none!important; }
.vsx-apply .vsx-arw2 svg{ width:17px!important; height:17px!important; }
/* the header CTA carries a circular arrow badge of its own. Rather than
   revive it, hide it and draw the same plain arrow every other button
   shows - the badge is the one shape that would not match. */
#site-header .eh-cta svg,#site-header .eh-cta img{ display:none!important; }
#site-header .eh-cta::before{ display:none!important; }
#site-header .eh-cta::after{
  content:"\2192"!important; display:inline-block!important;
  position:static!important; width:auto!important; height:auto!important;
  margin:0!important; inset:auto!important; transform:none!important;
  background:none!important; border:0!important; box-shadow:none!important;
  opacity:1!important; font-size:1.05em!important; line-height:1!important;
  color:#fff!important; }

/* sizes: one default, a compact variant where a button sits inside a card */
.ee-home .btn.btn-primary,.ee-home .btn.btn-dark,
#trusted-institutions .btn-primary,.eep-explore-btn,
#ee-solutions .solb-cta,.eebk-book,
#ee-cro .roi-out .cta,#ee-switch .swl .cta,#ee-platform .eep-cta-btn,
#ee-form-7 input[type="submit"],#ee-form-7 button[type="submit"],.ee-btn{
  padding:14px 26px!important; font-size:15.5px!important; }
#site-header .eh-cta{ padding:0 20px!important; font-size:15px!important; }
.vsx-apply,.vsx-cta-btn,.eep-mbook,#stories .cis-btn.primary{
  padding:11px 18px!important; font-size:14px!important; }
@media(max-width:640px){
  .ee-home .btn.btn-primary,.ee-home .btn.btn-dark,
  #trusted-institutions .btn-primary,.eep-explore-btn,
  #ee-solutions .solb-cta,.eebk-book,
  #ee-cro .roi-out .cta,#ee-switch .swl .cta,#ee-platform .eep-cta-btn,.ee-btn{
    padding:12px 20px!important; font-size:14px!important; }
  .vsx-apply,.vsx-cta-btn,.eep-mbook{ padding:10px 15px!important; font-size:12.5px!important; }
}
@media(prefers-reduced-motion:reduce){
  .ee-home .btn.btn-primary,#site-header .eh-cta,.eep-explore-btn,.vsx-apply,.ee-btn{
    transition:none!important; }
}
</style>

<?php wp_footer(); ?>
</body>
</html>
