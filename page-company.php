<?php
/**
 * Page Template — auto-loaded for any WordPress Page whose slug is "company"
 * URL: /company/
 *
 * Setup (non-coder):
 *   1. WP Admin → Pages → Add New
 *   2. Title: Company
 *   3. Make sure the URL slug under the title reads exactly: company
 *   4. Leave the editor body blank (this template renders the design)
 *   5. Publish
 *   6. Visit https://your-site.com/company/
 *
 * WordPress auto-picks page-{slug}.php for the matching Page. The sibling
 * category-company.php handles the same design if "company" ever exists
 * as a category slug instead.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

get_header();
?>

<style>
/* ── Reset & Namespace ───────────────────────────────────────── */
.ee-co-v1 *, .ee-co-v1 *::before, .ee-co-v1 *::after {
  box-sizing: border-box; margin: 0; padding: 0;
}

/* ── Design Tokens ───────────────────────────────────────────── */
.ee-co-v1 {
  --blue:        #19335D;
  --blue-mid:    #1e3f74;
  --orange:      #DE6E30;
  --orange-lt:   #FEF0E8;
  --text:        #1e293b;
  --muted:       #64748b;
  --border:      #e8edf5;
  --white:       #ffffff;
  --surface:     #f8fafc;
  --radius-card: 20px;
  --radius-icon: 14px;
  --shadow-sm:   0 2px 8px rgba(25,51,93,.06);
  --shadow-hover:0 20px 48px rgba(25,51,93,.14);
  --font: 'Inter', system-ui, sans-serif;
  --ease: cubic-bezier(.16,1,.3,1);

  font-family: var(--font);
  background: var(--surface);
  color: var(--text);
  -webkit-font-smoothing: antialiased;
  margin: 0 !important;
  padding: 0 !important;
  position: relative;
  overflow: hidden;
}

/* ── Ambient Background ──────────────────────────────────────── */
.ee-co-v1__bg {
  position: absolute; inset: 0; pointer-events: none; z-index: 0;
  background:
    radial-gradient(ellipse 55% 45% at 85% 15%, rgba(25,51,93,.05) 0%, transparent 70%),
    radial-gradient(ellipse 45% 40% at 5%  85%, rgba(222,110,48,.04) 0%, transparent 70%);
}
.ee-co-v1__bg::after {
  content: "";
  position: absolute; top: 0; right: 0;
  width: 280px; height: 280px;
  background-image: radial-gradient(circle, rgba(25,51,93,.07) 1px, transparent 1px);
  background-size: 22px 22px;
  mask-image: radial-gradient(ellipse 80% 80% at 100% 0%, black 30%, transparent 80%);
  -webkit-mask-image: radial-gradient(ellipse 80% 80% at 100% 0%, black 30%, transparent 80%);
}

.ee-co-v1__wrap {
  max-width: 1240px;
  margin: 0 auto;
  padding: 64px 24px 72px;
  position: relative; z-index: 2;
}

.ee-co-v1__label {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: rgba(25,51,93,.08);
  color: var(--blue);
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .12em;
  text-transform: uppercase;
  padding: 6px 14px;
  border-radius: 100px;
  margin-bottom: 18px;
}
.ee-co-v1__label span.dot {
  width: 6px; height: 6px;
  background: var(--blue);
  border-radius: 50%;
  animation: ee-co-pulse 2.5s infinite;
}
@keyframes ee-co-pulse {
  0%,100%{ transform:scale(1); opacity:.8; }
  50%{ transform:scale(1.5); opacity:.4; }
}

.ee-co-v1__header { margin-bottom: 48px; }
.ee-co-v1__title {
  font-size: clamp(28px, 4vw, 42px);
  font-weight: 800;
  color: var(--blue);
  letter-spacing: -.04em;
  line-height: 1.1;
  margin-bottom: 12px;
}
.ee-co-v1__title em { font-style: normal; color: var(--orange); }
.ee-co-v1__sub {
  font-size: 16px;
  color: var(--muted);
  max-width: 480px;
  line-height: 1.6;
}

.ee-co-v1__grid {
  display: grid;
  gap: 20px;
  grid-template-columns: repeat(1, 1fr);
}
@media (min-width: 600px) { .ee-co-v1__grid { grid-template-columns: repeat(2, 1fr); } }
@media (min-width: 960px) { .ee-co-v1__grid { grid-template-columns: repeat(3, 1fr); } }

.ee-co-v1__card {
  display: flex;
  flex-direction: column;
  background: var(--white);
  border: 1.5px solid var(--border);
  border-radius: var(--radius-card);
  padding: 32px 28px;
  text-decoration: none;
  color: inherit;
  position: relative;
  overflow: hidden;
  box-shadow: var(--shadow-sm);
  transition:
    transform .55s var(--ease),
    box-shadow .55s var(--ease),
    border-color .55s var(--ease),
    background .35s ease;
}
.ee-co-v1__card::before {
  content: "";
  position: absolute; top: 0; left: 15%; right: 15%;
  height: 0;
  background: linear-gradient(90deg, var(--blue), var(--orange));
  border-radius: 0 0 4px 4px;
  transition: height .5s var(--ease);
}
.ee-co-v1__card::after {
  content: "";
  position: absolute; bottom: -50px; right: -50px;
  width: 130px; height: 130px;
  background: radial-gradient(circle, rgba(25,51,93,.06) 0%, transparent 70%);
  border-radius: 50%;
  transition: transform .5s var(--ease), opacity .5s ease;
  transform: scale(0); opacity: 0;
}
.ee-co-v1__card:hover {
  transform: translateY(-8px);
  border-color: rgba(25,51,93,.18);
  box-shadow: var(--shadow-hover);
}
.ee-co-v1__card:hover::before { height: 4px; }
.ee-co-v1__card:hover::after  { transform: scale(1); opacity: 1; }
.ee-co-v1__card:focus-visible {
  outline: 3px solid var(--blue);
  outline-offset: 3px;
}

.ee-co-v1__icon {
  width: 52px; height: 52px;
  background: #eef2fa;
  border-radius: var(--radius-icon);
  display: flex; align-items: center; justify-content: center;
  margin-bottom: 22px;
  flex-shrink: 0;
  transition: background .45s var(--ease), transform .45s var(--ease);
}
.ee-co-v1__icon img {
  width: 26px; height: 26px;
  object-fit: contain;
  transition: filter .45s ease;
}
.ee-co-v1__card:hover .ee-co-v1__icon {
  background: var(--orange);
  transform: rotate(-6deg) scale(1.08);
}
.ee-co-v1__card:hover .ee-co-v1__icon img { filter: brightness(0) invert(1); }

.ee-co-v1__name {
  font-size: 19px;
  font-weight: 700;
  color: var(--blue);
  letter-spacing: -.025em;
  margin-bottom: 10px;
  transition: color .3s ease;
}
.ee-co-v1__card:hover .ee-co-v1__name { color: var(--blue-mid); }

.ee-co-v1__desc {
  font-size: 14px;
  color: var(--muted);
  line-height: 1.65;
  flex-grow: 1;
  margin-bottom: 22px;
}

.ee-co-v1__cta {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 12px;
  font-weight: 700;
  color: var(--blue);
  text-transform: uppercase;
  letter-spacing: .08em;
  transition: gap .3s ease, color .3s ease;
}
.ee-co-v1__cta svg {
  width: 15px; height: 15px;
  transition: transform .35s var(--ease);
}
.ee-co-v1__card:hover .ee-co-v1__cta { gap: 10px; color: var(--orange); }
.ee-co-v1__card:hover .ee-co-v1__cta svg { transform: translateX(4px); }

.ee-co-v1__reveal {
  opacity: 0;
  transform: translateY(28px);
  transition: opacity .7s var(--ease), transform .7s var(--ease);
}
.ee-co-v1__reveal.ee-co-visible {
  opacity: 1;
  transform: translateY(0);
}

@media (prefers-reduced-motion: reduce) {
  .ee-co-v1__reveal { opacity: 1 !important; transform: none !important; transition: none !important; }
  .ee-co-v1__card   { transition: none !important; }
  .ee-co-v1__label span.dot { animation: none; }
}

@media (max-width: 599px) {
  .ee-co-v1__wrap { padding: 48px 16px 56px; }
  .ee-co-v1__card { padding: 26px 22px; }
}
</style>

<section class="ee-co-v1" aria-label="Company" itemscope itemtype="https://schema.org/ItemList">
  <meta itemprop="name" content="ExtraaEdge Company" />
  <div class="ee-co-v1__bg" aria-hidden="true"></div>

  <div class="ee-co-v1__wrap">
    <header class="ee-co-v1__header ee-co-v1__reveal">
      <div class="ee-co-v1__label" aria-hidden="true">
        <span class="dot"></span> Company
      </div>
      <h1 class="ee-co-v1__title">
        The people &amp; mission <em>behind</em> the platform
      </h1>
      <p class="ee-co-v1__sub">
        Learn about our story, our team, and the network that drives ExtraaEdge forward.
      </p>
    </header>

    <ul class="ee-co-v1__grid" role="list" aria-label="Company pages" style="list-style:none;padding:0;margin:0;" itemprop="itemListElement">

      <li itemprop="item" itemscope itemtype="https://schema.org/WebPage" style="display:contents;">
        <meta itemprop="position" content="1" />
        <a class="ee-co-v1__card ee-co-v1__reveal" href="https://www.extraaedge.com/about-us/" aria-label="About – Our story and journey" itemprop="url" style="transition-delay:.05s">
          <div class="ee-co-v1__icon" aria-hidden="true">
            <img src="https://www.extraaedge.com/wp-content/uploads/2022/06/enterprise.png" alt="" width="26" height="26" loading="lazy" decoding="async">
          </div>
          <h2 class="ee-co-v1__name" itemprop="name">About</h2>
          <p class="ee-co-v1__desc">Get to know us better — our story and our journey so far</p>
          <span class="ee-co-v1__cta" aria-hidden="true">
            Explore
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
          </span>
        </a>
      </li>

      <li itemprop="item" itemscope itemtype="https://schema.org/WebPage" style="display:contents;">
        <meta itemprop="position" content="2" />
        <a class="ee-co-v1__card ee-co-v1__reveal" href="https://www.extraaedge.com/customers/" aria-label="Customers – Our happy customers" itemprop="url" style="transition-delay:.1s">
          <div class="ee-co-v1__icon" aria-hidden="true">
            <img src="https://www.extraaedge.com/wp-content/uploads/2022/06/value.png" alt="" width="26" height="26" loading="lazy" decoding="async">
          </div>
          <h2 class="ee-co-v1__name" itemprop="name">Customers</h2>
          <p class="ee-co-v1__desc">Learn more about our happy customers from your segment</p>
          <span class="ee-co-v1__cta" aria-hidden="true">
            Explore
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
          </span>
        </a>
      </li>

      <li itemprop="item" itemscope itemtype="https://schema.org/WebPage" style="display:contents;">
        <meta itemprop="position" content="3" />
        <a class="ee-co-v1__card ee-co-v1__reveal" href="https://www.extraaedge.com/careers/" aria-label="Careers – Open positions at ExtraaEdge" itemprop="url" style="transition-delay:.15s">
          <div class="ee-co-v1__icon" aria-hidden="true">
            <img src="https://www.extraaedge.com/wp-content/uploads/2022/06/search.png" alt="" width="26" height="26" loading="lazy" decoding="async">
          </div>
          <h2 class="ee-co-v1__name" itemprop="name">Careers</h2>
          <p class="ee-co-v1__desc">Interested in working with us? Check out our open positions</p>
          <span class="ee-co-v1__cta" aria-hidden="true">
            Explore
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
          </span>
        </a>
      </li>

      <li itemprop="item" itemscope itemtype="https://schema.org/WebPage" style="display:contents;">
        <meta itemprop="position" content="4" />
        <a class="ee-co-v1__card ee-co-v1__reveal" href="https://www.extraaedge.com/investors-and-advisors/" aria-label="Investor and Advisors – People aligned with our mission" itemprop="url" style="transition-delay:.2s">
          <div class="ee-co-v1__icon" aria-hidden="true">
            <img src="https://www.extraaedge.com/wp-content/uploads/2022/06/investor.png" alt="" width="26" height="26" loading="lazy" decoding="async">
          </div>
          <h2 class="ee-co-v1__name" itemprop="name">Investor &amp; Advisors</h2>
          <p class="ee-co-v1__desc">Learn more about people and organisations deeply aligned with our mission</p>
          <span class="ee-co-v1__cta" aria-hidden="true">
            Explore
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
          </span>
        </a>
      </li>

      <li itemprop="item" itemscope itemtype="https://schema.org/WebPage" style="display:contents;">
        <meta itemprop="position" content="5" />
        <a class="ee-co-v1__card ee-co-v1__reveal" href="https://www.extraaedge.com/team/" aria-label="Team – People helping your admissions teams win" itemprop="url" style="transition-delay:.25s">
          <div class="ee-co-v1__icon" aria-hidden="true">
            <img src="https://www.extraaedge.com/wp-content/uploads/2022/06/management.png" alt="" width="26" height="26" loading="lazy" decoding="async">
          </div>
          <h2 class="ee-co-v1__name" itemprop="name">Team</h2>
          <p class="ee-co-v1__desc">Find out more about the people helping your admissions teams win</p>
          <span class="ee-co-v1__cta" aria-hidden="true">
            Explore
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
          </span>
        </a>
      </li>

      <li itemprop="item" itemscope itemtype="https://schema.org/WebPage" style="display:contents;">
        <meta itemprop="position" content="6" />
        <a class="ee-co-v1__card ee-co-v1__reveal" href="https://partners.extraaedge.com/" aria-label="Become a partner – Partner with ExtraaEdge" itemprop="url" rel="noopener" target="_blank" style="transition-delay:.3s">
          <div class="ee-co-v1__icon" aria-hidden="true">
            <img src="https://www.extraaedge.com/wp-content/uploads/2024/03/partners-ee-1.png" alt="" width="26" height="26" loading="lazy" decoding="async">
          </div>
          <h2 class="ee-co-v1__name" itemprop="name">Become a partner</h2>
          <p class="ee-co-v1__desc">Interested in partnering with us? Fill your details and we will get back</p>
          <span class="ee-co-v1__cta" aria-hidden="true">
            Explore
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
          </span>
        </a>
      </li>
    </ul>
  </div>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "name": "ExtraaEdge Company",
  "description": "Learn about ExtraaEdge — our story, customers, careers, investors, team, and partner programme.",
  "url": "<?php echo esc_url(home_url('/company/')); ?>",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "About",                "url": "https://www.extraaedge.com/about-us/" },
    { "@type": "ListItem", "position": 2, "name": "Customers",            "url": "https://www.extraaedge.com/customers/" },
    { "@type": "ListItem", "position": 3, "name": "Careers",              "url": "https://www.extraaedge.com/careers/" },
    { "@type": "ListItem", "position": 4, "name": "Investor & Advisors",  "url": "https://www.extraaedge.com/investors-and-advisors/" },
    { "@type": "ListItem", "position": 5, "name": "Team",                 "url": "https://www.extraaedge.com/team/" },
    { "@type": "ListItem", "position": 6, "name": "Become a partner",     "url": "https://partners.extraaedge.com/" }
  ]
}
</script>

<script>
(function () {
  if (typeof IntersectionObserver === 'undefined') {
    document.querySelectorAll('.ee-co-v1__reveal').forEach(function(el){ el.classList.add('ee-co-visible'); });
    return;
  }
  var io = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('ee-co-visible');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
  document.querySelectorAll('.ee-co-v1__reveal').forEach(function(el){ io.observe(el); });
})();
</script>

<?php get_footer(); ?>
