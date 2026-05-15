<?php
/**
 * The template for displaying the footer
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;
?>

</main><!-- /#main-content (opened in header.php) -->

<!--  Start Footer Section -->

<!-- Plus Jakarta Sans font (only Inter + Open Sans loaded in header.php — Jakarta Sans is footer-specific) -->
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
    /* RESET & BASE — variables scoped here (NOT to global :root) so they don't bleed into other sections */
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
        display: block;
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
    #extraaedge-footer-engine h4 { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; margin: 0; }
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

    /* 4. APP-STYLE NAV MENU */
    #extraaedge-footer-engine .ee-nav-matrix {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 30px;
        padding: 40px 0;
        border-bottom: 1px solid var(--ee-slate-100);
    }
    #extraaedge-footer-engine .ee-nav-title { font-size: 12px; text-transform: uppercase; letter-spacing: 2px; color: var(--ee-slate-900); font-weight: 800; margin-bottom: 20px; display: block; }
    #extraaedge-footer-engine .ee-nav-matrix li { margin-bottom: 10px; }
    #extraaedge-footer-engine .ee-nav-matrix a { color: var(--ee-slate-600); font-size: 14px; font-weight: 500; }
    #extraaedge-footer-engine .ee-nav-matrix a:hover { color: var(--ee-orange); transform: translateX(6px); }

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

<div id="extraaedge-footer-engine">

    <!-- Hero CTA -->
    <section class="ee-container ee-section-block">
        <div class="ee-hero-card ee-reveal">
            <h2 class="ee-hero-h2">The Unified Admissions Engine</h2>
            <p class="ee-hero-p">Experience the power of the most advanced Education CRM & Marketing Automation platform today.</p>
            <div class="ee-cta-flex">
                <a href="tel:+918956982897" class="ee-btn ee-btn-call">
                    <i class="fa-solid fa-phone-volume"></i> Call Sales
                </a>
                <a href="https://api.whatsapp.com/send/?phone=918956982897&text=Hi&type=phone_number&app_absent=0" class="ee-btn ee-btn-wa" target="_blank" rel="noopener">
                    <i class="fa-brands fa-whatsapp"></i> WhatsApp "Hi"
                </a>
            </div>
        </div>
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
            <div class="ee-glass-card ee-reveal">
                <span class="ee-label">Talent</span>
                <h3 class="ee-card-title">Openings & HR</h3>
                <div class="ee-link-item"><i class="fa-solid fa-user-plus"></i><a href="tel:+918956755927">8956755927</a></div>
                <div class="ee-link-item"><i class="fa-brands fa-whatsapp"></i><a href="https://api.whatsapp.com/send/?phone=918956982897&text=Hi" target="_blank" rel="noopener">Chat with HR</a></div>
            </div>
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
        <nav class="ee-nav-matrix ee-reveal">
            <div class="ee-nav-col">
                <span class="ee-nav-title">Products</span>
                <ul>
                    <li><a href="/products/education-crm/">Education CRM</a></li>
                    <li><a href="/products/chatbot-for-education/">Education Chatbot</a></li>
                    <li><a href="/products/application-management-system/">Application Management</a></li>
                    <li><a href="/products/mobile-crm/">Mobile CRM</a></li>
                    <li><a href="/products/whatsapp-api/">WhatsApp Bot</a></li>
                    <li><a href="/products/ivr/">IVR</a></li>
                </ul>
            </div>
            <div class="ee-nav-col">
                <span class="ee-nav-title">Use Cases</span>
                <ul>
                    <li><a href="/use-cases/counselors/">Counsellors</a></li>
                    <li><a href="/use-cases/on-field-agents/">Field Agents</a></li>
                    <li><a href="/use-cases/management/">Management</a></li>
                </ul>
                <span class="ee-nav-title" style="margin-top:20px;">Help</span>
                <ul>
                    <li><a href="/help-center/">Help Center</a></li>
                    <li><a href="/help-docs/">Help Docs</a></li>
                </ul>
            </div>
            <div class="ee-nav-col">
                <span class="ee-nav-title">Company</span>
                <ul>
                    <li><a href="/about/">About Us</a></li>
                    <li><a href="/partners/">Become a Partner</a></li>
                    <li><a href="/customers/">Our Customers</a></li>
                    <li><a href="/investors/">Investor & Advisors</a></li>
                    <li><a href="/careers/">Careers</a></li>
                    <li><a href="/team/">Team</a></li>
                </ul>
            </div>
            <div class="ee-nav-col">
                <span class="ee-nav-title">Comparison</span>
                <ul>
                    <li><a href="/comparison/ee-vs-meritto/">EE vs Meritto</a></li>
                    <li><a href="/comparison/ee-vs-ls/">EE vs LS</a></li>
                    <li><a href="/comparison/ee-vs-zoho/">EE vs Zoho</a></li>
                </ul>
            </div>
            <div class="ee-nav-col">
                <span class="ee-nav-title">Industries</span>
                <ul>
                    <li><a href="/industries/overseas/">Overseas CRM</a></li>
                    <li><a href="/industries/school/">School</a></li>
                    <li><a href="/industries/edtech/">EdTech</a></li>
                    <li><a href="/industries/vocational/">Vocational</a></li>
                    <li><a href="/industries/coaching-institute-crm/">Coaching</a></li>
                    <li><a href="/industries/higher-education/">Higher Education</a></li>
                </ul>
            </div>
            <div class="ee-nav-col">
                <span class="ee-nav-title">Resources</span>
                <ul>
                    <li><a href="/blogs/">Blogs</a></li>
                    <li><a href="/ebooks/">Ebooks</a></li>
                    <li><a href="/webinars/">Webinars</a></li>
                    <li><a href="/case-studies/">Case Studies</a></li>
                </ul>
            </div>
        </nav>

        <div class="ee-ecosystem-bar ee-reveal">
            <div class="ee-social-cluster">
                <a href="https://www.facebook.com/extraaedge/" class="ee-social-icon" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/extraaedge/" class="ee-social-icon" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.youtube.com/user/theextraaedge" class="ee-social-icon" target="_blank" rel="noopener" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                <a href="https://x.com/extraaedge" class="ee-social-icon" target="_blank" rel="noopener" aria-label="Twitter X"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="https://www.linkedin.com/company/extraaedge/" class="ee-social-icon" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <div class="ee-store-cluster">
                <a href="https://play.google.com/store/apps/details?id=com.extraaedge.android&hl=en_in" target="_blank" rel="noopener"><img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Get it on Google Play" loading="lazy"></a>
                <a href="https://apps.apple.com/in/app/extraaedge-new/id6449466185" target="_blank" rel="noopener"><img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg" alt="Download on the App Store" loading="lazy"></a>
            </div>
        </div>
    </section>

    <!-- Legal Footer -->
    <section class="ee-container ee-section-block">
        <div class="ee-legal-footer">
            <span class="ee-copy-text">&copy; <?php echo date('Y'); ?>, ExtraaEdge Technology Solutions Pvt. Ltd</span>
            <div class="ee-legal-links">
                <a href="https://www.extraaedge.com/privacy-policy/">Privacy & Terms</a>
                <a href="https://www.extraaedge.com/gdpr/">GDPR</a>
                <a href="https://www.extraaedge.com/cookies-policy/">Cookies</a>
                <a href="https://www.truday.io/extraaedge" target="_blank" rel="noopener">Security & Compliance</a>
            </div>
        </div>
    </section>
</div>

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

<?php wp_footer(); ?>
</body>
</html>
