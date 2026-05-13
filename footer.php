<?php
/**
 * footer.php — ExtraaEdge crawlable footer
 * Handles: static crawlable nav matrix, social with rel="me", prefetch
 * next-likely pages, copyright, wp_footer() hook for deferred scripts.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
$site_url = 'https://www.extraaedge.com';
$year     = date( 'Y' );
?>
</main><!-- /#main-content -->

<footer id="extraaedge-footer-engine" class="site-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">

	<!-- ─────────── FOOTER CTA ─────────── -->
	<section class="footer-cta" aria-labelledby="footer-cta-heading">
		<div class="container">
			<h2 id="footer-cta-heading">Ready to Move to a Modern Education CRM?</h2>
			<p>Talk to our experts and see how ExtraaEdge can 2× your admissions in 90 days.</p>
			<a href="<?php echo esc_url( $site_url ); ?>/book-demo/" class="btn-primary">Book Free Demo</a>
		</div>
	</section>

	<!-- ─────────── NAV MATRIX (server-rendered, no JS) ─────────── -->
	<section class="footer-nav-matrix" aria-label="Footer navigation">
		<div class="container nav-grid">

			<nav class="footer-col" aria-labelledby="fcol-products">
				<h3 id="fcol-products" class="footer-col-title">Products</h3>
				<ul>
					<li><a href="<?php echo esc_url( $site_url ); ?>/products/education-crm/">Education CRM</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/products/whatsapp-api/">WhatsApp API &amp; Bot</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/products/mobile-crm/">Mobile CRM</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/products/chatbot-for-education/">Education Chatbot</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/products/ivr/">IVR Solutions</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/products/marketing-automation/">Marketing Automation</a></li>
				</ul>
			</nav>

			<nav class="footer-col" aria-labelledby="fcol-industries">
				<h3 id="fcol-industries" class="footer-col-title">Industries</h3>
				<ul>
					<li><a href="<?php echo esc_url( $site_url ); ?>/industries/higher-education/">Higher Education</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/industries/k12-schools/">K-12 Schools</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/industries/edtech/">EdTech Companies</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/industries/vocational/">Vocational</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/industries/overseas-education/">Overseas Education</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/industries/coaching/">Coaching Institutes</a></li>
				</ul>
			</nav>

			<nav class="footer-col" aria-labelledby="fcol-resources">
				<h3 id="fcol-resources" class="footer-col-title">Resources</h3>
				<ul>
					<li><a href="<?php echo esc_url( $site_url ); ?>/blog/">Blog</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/case-studies/">Case Studies</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/ebooks/">Free Ebooks</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/webinars/">Webinars</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/help/">Help Center</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/api-docs/">API Docs</a></li>
				</ul>
			</nav>

			<nav class="footer-col" aria-labelledby="fcol-company">
				<h3 id="fcol-company" class="footer-col-title">Company</h3>
				<ul>
					<li><a href="<?php echo esc_url( $site_url ); ?>/about/">About Us</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/careers/">Careers</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/customers/">Our Customers</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/partners/">Partners</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/contact/">Contact Sales</a></li>
					<li><a href="<?php echo esc_url( $site_url ); ?>/press/">Press &amp; Media</a></li>
				</ul>
			</nav>

			<address class="footer-col footer-contact" aria-labelledby="fcol-contact" itemscope itemtype="https://schema.org/Organization">
				<h3 id="fcol-contact" class="footer-col-title">Contact</h3>
				<p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
					<span itemprop="streetAddress">Pride Icon, Kharadi</span>,<br>
					<span itemprop="addressLocality">Pune</span>,
					<span itemprop="addressRegion">MH</span>
					<span itemprop="postalCode">411014</span>,<br>
					<span itemprop="addressCountry">India</span>
				</p>
				<p>📞 <a href="tel:+919168678888" itemprop="telephone">+91 91686 78888</a></p>
				<p>✉️ <a href="mailto:hello@extraaedge.com" itemprop="email">hello@extraaedge.com</a></p>
			</address>

		</div>
	</section>

	<!-- ─────────── COMPLIANCE + SOCIAL (rel="me" for entity verification) ─── -->
	<section class="footer-trust">
		<div class="container">
			<ul class="compliance-badges" aria-label="Compliance certifications">
				<li><img src="<?php echo esc_url( $site_url ); ?>/wp-content/uploads/2025/09/GDPR-NEW.png" alt="GDPR Compliant" width="40" height="40" loading="lazy"> GDPR</li>
				<li><img src="<?php echo esc_url( $site_url ); ?>/wp-content/uploads/2025/09/iso-0001.png" alt="ISO 27001 Certified" width="40" height="40" loading="lazy"> ISO 27001</li>
				<li><img src="<?php echo esc_url( $site_url ); ?>/wp-content/uploads/2025/09/soc2.png" alt="SOC 2 Type II Certified" width="40" height="40" loading="lazy"> SOC 2</li>
			</ul>

			<ul class="social-links" aria-label="Follow ExtraaEdge on social media">
				<li><a rel="me noopener" target="_blank" href="https://www.linkedin.com/company/extraaedge" aria-label="ExtraaEdge on LinkedIn">LinkedIn</a></li>
				<li><a rel="me noopener" target="_blank" href="https://twitter.com/ExtraaEdge"           aria-label="ExtraaEdge on Twitter / X">Twitter</a></li>
				<li><a rel="me noopener" target="_blank" href="https://www.facebook.com/ExtraaEdge"     aria-label="ExtraaEdge on Facebook">Facebook</a></li>
				<li><a rel="me noopener" target="_blank" href="https://www.youtube.com/@extraaedge"     aria-label="ExtraaEdge on YouTube">YouTube</a></li>
				<li><a rel="me noopener" target="_blank" href="https://www.instagram.com/extraaedge/"   aria-label="ExtraaEdge on Instagram">Instagram</a></li>
			</ul>
		</div>
	</section>

	<!-- ─────────── LEGAL ─────────── -->
	<section class="footer-legal">
		<div class="container legal-row">
			<p class="copyright">© <?php echo (int) $year; ?> ExtraaEdge Software Services Pvt. Ltd. All rights reserved.</p>
			<ul class="legal-links">
				<li><a href="<?php echo esc_url( $site_url ); ?>/privacy-policy/">Privacy Policy</a></li>
				<li><a href="<?php echo esc_url( $site_url ); ?>/terms/">Terms of Service</a></li>
				<li><a href="<?php echo esc_url( $site_url ); ?>/cookie-policy/">Cookie Policy</a></li>
				<li><a href="<?php echo esc_url( $site_url ); ?>/sitemap_index.xml">Sitemap</a></li>
			</ul>
		</div>
	</section>

</footer>

<!-- ─────────── PREFETCH LIKELY-NEXT PAGES (cheap idle hint) ─────────── -->
<link rel="prefetch" href="<?php echo esc_url( $site_url ); ?>/book-demo/">
<link rel="prefetch" href="<?php echo esc_url( $site_url ); ?>/pricing/">
<link rel="prefetch" href="<?php echo esc_url( $site_url ); ?>/case-studies/">

<?php wp_footer(); ?>
</body>
</html>
