<?php
/**
 * Page Template — auto-loaded for any WordPress Page whose slug is "industries"
 * URL: /industries/
 *
 * Setup (non-coder):
 *   1. WP Admin → Pages → Add New
 *   2. Title: Industries
 *   3. Make sure the URL slug under the title reads exactly: industries
 *   4. Leave the editor body blank (this template renders the design)
 *   5. Publish
 *   6. Visit https://your-site.com/industries/
 *
 * WordPress auto-picks page-{slug}.php for the matching Page.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;

get_header();
?>

<style>
/* ============================================================
   NAMESPACE: .ee-crm-module
   Zero-conflict with Elementor, Gutenberg, custom WP themes.
   All selectors scoped. CSS custom props scoped to module.
   ============================================================ */

.ee-crm-module,
.ee-crm-module *,
.ee-crm-module *::before,
.ee-crm-module *::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

.ee-crm-module {
    --c-orange:        #DE6E30;
    --c-orange-light:  #F5845A;
    --c-orange-soft:   rgba(222,110,48,.08);
    --c-orange-mid:    rgba(222,110,48,.15);
    --c-blue:          #19335D;
    --c-blue-dark:     #0f2040;
    --c-blue-soft:     rgba(25,51,93,.06);
    --c-muted:         #5a6a80;
    --c-border:        rgba(25,51,93,.09);
    --c-white:         #ffffff;
    --c-bg:            #f9fafc;
    --font-body:       'Inter', system-ui, -apple-system, sans-serif;
    --space-xs:   8px;
    --space-sm:   16px;
    --space-md:   24px;
    --space-lg:   40px;
    --space-xl:   64px;
    --space-2xl:  96px;
    --radius-sm:  10px;
    --radius-md:  18px;
    --radius-lg:  28px;
    --ease-out-expo: cubic-bezier(0.16, 1, 0.3, 1);
    --t-fast:  0.2s var(--ease-out-expo);
    --t-med:   0.4s var(--ease-out-expo);
    --t-slow:  0.6s var(--ease-out-expo);
    --shadow-card: 0 2px 16px rgba(25,51,93,.05), 0 1px 4px rgba(25,51,93,.04);
    --shadow-hover: 0 20px 48px rgba(25,51,93,.12), 0 4px 12px rgba(25,51,93,.07);
    --shadow-badge: 0 4px 14px rgba(222,110,48,.25);

    font-family: var(--font-body);
    background-color: var(--c-white);
    color: var(--c-blue);
    padding: 10px 0;
    margin: 10px 0;
    width: 100%;
    display: block;
    position: relative;
    overflow: hidden;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.ee-crm-module .ee-bg-canvas {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 0;
    overflow: hidden;
}

.ee-crm-module .ee-bg-mesh {
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 70% 60% at 8% 20%, rgba(222,110,48,.05) 0%, transparent 60%),
        radial-gradient(ellipse 50% 50% at 92% 80%, rgba(25,51,93,.04) 0%, transparent 60%),
        radial-gradient(ellipse 40% 40% at 50% 110%, rgba(222,110,48,.04) 0%, transparent 60%);
}

.ee-crm-module .ee-bg-grid {
    position: absolute;
    inset: 0;
    background-image:
        linear-gradient(rgba(25,51,93,.025) 1px, transparent 1px),
        linear-gradient(90deg, rgba(25,51,93,.025) 1px, transparent 1px);
    background-size: 48px 48px;
    mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 40%, transparent 100%);
    -webkit-mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 40%, transparent 100%);
}

.ee-crm-module .ee-line-accent {
    position: absolute;
    width: 1px;
    background: linear-gradient(to bottom, transparent 0%, var(--c-orange) 50%, transparent 100%);
    opacity: 0;
    animation: ee-line-rise 6s ease-in-out infinite;
}
.ee-crm-module .ee-line-accent:nth-child(1) { left: 12%; height: 120px; animation-delay: 0s;   animation-duration: 7s; }
.ee-crm-module .ee-line-accent:nth-child(2) { left: 38%; height: 80px;  animation-delay: 2.5s; animation-duration: 5s; }
.ee-crm-module .ee-line-accent:nth-child(3) { left: 62%; height: 100px; animation-delay: 1s;   animation-duration: 6.5s; }
.ee-crm-module .ee-line-accent:nth-child(4) { left: 88%; height: 90px;  animation-delay: 3.5s; animation-duration: 5.5s; }

@keyframes ee-line-rise {
    0%   { transform: translateY(100vh); opacity: 0; }
    20%  { opacity: .18; }
    80%  { opacity: .18; }
    100% { transform: translateY(-160px); opacity: 0; }
}

.ee-crm-module .ee-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(60px);
    animation: ee-orb-drift 18s ease-in-out infinite alternate;
}
.ee-crm-module .ee-orb-1 {
    width: 560px; height: 560px;
    top: -15%; left: -8%;
    background: radial-gradient(circle, rgba(222,110,48,.06) 0%, transparent 70%);
    animation-delay: 0s;
}
.ee-crm-module .ee-orb-2 {
    width: 440px; height: 440px;
    bottom: -10%; right: -6%;
    background: radial-gradient(circle, rgba(25,51,93,.05) 0%, transparent 70%);
    animation-delay: -8s;
}
@keyframes ee-orb-drift {
    0%   { transform: translate(0, 0) scale(1); }
    100% { transform: translate(25px, -20px) scale(1.1); }
}

.ee-crm-module .ee-container {
    max-width: 1260px;
    margin: 0 auto;
    padding: 0 24px;
    position: relative;
    z-index: 2;
}

.ee-crm-module .ee-section {
    padding: var(--space-sm) 0 var(--space-2xl);
}

.ee-crm-module .ee-header {
    text-align: center;
    margin-bottom: var(--space-xl);
}

.ee-crm-module .ee-eyebrow-wrap {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--c-orange-soft);
    border: 1px solid var(--c-orange-mid);
    border-radius: 100px;
    padding: 6px 18px 6px 8px;
    margin-bottom: 22px;
}

.ee-crm-module .ee-eyebrow-dot {
    width: 22px;
    height: 22px;
    background: var(--c-orange);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.ee-crm-module .ee-eyebrow-dot svg {
    width: 12px;
    height: 12px;
    fill: white;
}

.ee-crm-module .ee-eyebrow-text {
    font-size: 12px;
    font-weight: 700;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: var(--c-orange);
}

.ee-crm-module .ee-headline {
    font-size: clamp(2rem, 4.5vw, 3.2rem);
    font-weight: 900;
    line-height: 1.08;
    letter-spacing: -.03em;
    color: var(--c-blue-dark);
    margin: 0 0 18px;
}

.ee-crm-module .ee-headline-accent {
    position: relative;
    display: inline-block;
    color: var(--c-orange);
}

.ee-crm-module .ee-headline-accent::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, var(--c-orange), var(--c-orange-light));
    border-radius: 2px;
    transform: scaleX(0);
    transform-origin: left;
    animation: ee-underline-in 0.8s var(--ease-out-expo) 0.5s forwards;
}

@keyframes ee-underline-in {
    to { transform: scaleX(1); }
}

.ee-crm-module .ee-subheadline {
    font-size: clamp(.95rem, 1.8vw, 1.1rem);
    font-weight: 400;
    color: var(--c-muted);
    line-height: 1.5;
    max-width: 560px;
    margin: 0 auto;
}

.ee-crm-module .ee-stats-strip {
    display: flex;
    justify-content: center;
    gap: 0;
    margin-bottom: var(--space-xl);
    background: var(--c-blue);
    border-radius: var(--radius-lg);
    overflow: hidden;
    position: relative;
}

.ee-crm-module .ee-stats-strip::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(222,110,48,.12) 0%, transparent 60%);
}

.ee-crm-module .ee-stat {
    flex: 1;
    padding: 28px 20px;
    text-align: center;
    position: relative;
}

.ee-crm-module .ee-stat:not(:last-child)::after {
    content: '';
    position: absolute;
    right: 0;
    top: 25%;
    height: 50%;
    width: 1px;
    background: rgba(255,255,255,.1);
}

.ee-crm-module .ee-stat-value {
    font-size: clamp(1.5rem, 3vw, 2.2rem);
    font-weight: 900;
    letter-spacing: -.04em;
    color: var(--c-white);
    line-height: 1;
    margin-bottom: 6px;
}

.ee-crm-module .ee-stat-value span {
    color: var(--c-orange);
}

.ee-crm-module .ee-stat-label {
    font-size: .78rem;
    font-weight: 500;
    color: rgba(255,255,255,.55);
    letter-spacing: .04em;
    text-transform: uppercase;
}

.ee-crm-module .ee-grid {
    display: grid;
    gap: 20px;
    grid-template-columns: 1fr;
}

@media (min-width: 640px) {
    .ee-crm-module .ee-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (min-width: 1024px) {
    .ee-crm-module .ee-grid { grid-template-columns: repeat(3, 1fr); }
}

.ee-crm-module .ee-card {
    background: var(--c-white);
    border: 1.5px solid var(--c-border);
    border-radius: var(--radius-lg);
    padding: 36px 30px 30px;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    gap: 0;
    position: relative;
    overflow: hidden;
    box-shadow: var(--shadow-card);
    transition:
        transform var(--t-med),
        border-color var(--t-med),
        box-shadow var(--t-med),
        background var(--t-med);
    opacity: 0;
    transform: translateY(28px);
}

.ee-crm-module .ee-card.ee-revealed {
    opacity: 1;
    transform: translateY(0);
    transition:
        opacity var(--t-slow),
        transform var(--t-slow),
        border-color var(--t-med),
        box-shadow var(--t-med),
        background var(--t-med);
}

.ee-crm-module .ee-card:hover {
    transform: translateY(-6px);
    border-color: var(--c-orange);
    box-shadow: var(--shadow-hover);
}

.ee-crm-module .ee-card:focus-visible {
    outline: 3px solid var(--c-orange);
    outline-offset: 4px;
    border-color: var(--c-orange);
}

.ee-crm-module .ee-card:active {
    transform: translateY(-3px) scale(.99);
}

.ee-crm-module .ee-card-bar {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--c-orange), var(--c-orange-light));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform var(--t-med);
    border-radius: 0 0 3px 3px;
}

.ee-crm-module .ee-card:hover .ee-card-bar {
    transform: scaleX(1);
}

.ee-crm-module .ee-card-corner {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 80px;
    height: 80px;
    background: radial-gradient(circle at 100% 100%, var(--c-orange-soft) 0%, transparent 70%);
    border-radius: var(--radius-lg) 0 var(--radius-lg) 0;
    transition: opacity var(--t-med);
    opacity: 0;
}

.ee-crm-module .ee-card:hover .ee-card-corner {
    opacity: 1;
}

/* Icons sit directly on the card — no floating tile (no box, border,
   shadow or hover lift around the image). */
.ee-crm-module .ee-icon-wrap {
    width: 72px;
    height: 72px;
    background: transparent;
    border: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 22px;
    position: relative;
    z-index: 2;
    flex-shrink: 0;
}

.ee-crm-module .ee-icon-wrap img {
    width: 95%;
    height: 95%;
    max-width: 95%;
    max-height: 95%;
    object-fit: contain;
    display: block;
}

.ee-crm-module .ee-card-number {
    position: absolute;
    top: -8px;
    right: -8px;
    width: 22px;
    height: 22px;
    background: var(--c-orange);
    color: white;
    font-size: 10px;
    font-weight: 800;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--shadow-badge);
    letter-spacing: 0;
}

.ee-crm-module .ee-card-title {
    font-size: 1.2rem;
    font-weight: 800;
    color: var(--c-blue-dark);
    margin: 0 0 10px;
    letter-spacing: -.02em;
    line-height: 1.25;
}

.ee-crm-module .ee-card-desc {
    font-size: .9rem;
    line-height: 1.45;
    color: var(--c-muted);
    margin: 0 0 24px;
    flex-grow: 1;
}

.ee-crm-module .ee-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 22px;
}

.ee-crm-module .ee-tag {
    font-size: .72rem;
    font-weight: 600;
    color: var(--c-blue);
    background: var(--c-blue-soft);
    border-radius: 100px;
    padding: 4px 10px;
    letter-spacing: .02em;
    transition: background var(--t-fast), color var(--t-fast);
}

.ee-crm-module .ee-card:hover .ee-tag {
    background: var(--c-orange-soft);
    color: var(--c-orange);
}

.ee-crm-module .ee-cta-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 18px;
    border-top: 1px solid var(--c-border);
    transition: border-color var(--t-med);
}

.ee-crm-module .ee-card:hover .ee-cta-row {
    border-color: var(--c-orange-mid);
}

.ee-crm-module .ee-cta-label {
    font-size: .85rem;
    font-weight: 700;
    color: var(--c-orange);
    letter-spacing: .01em;
}

.ee-crm-module .ee-cta-arrow {
    width: 36px;
    height: 36px;
    background: var(--c-orange-soft);
    border: 1.5px solid var(--c-orange-mid);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition:
        background var(--t-med),
        transform var(--t-med);
    flex-shrink: 0;
}

.ee-crm-module .ee-cta-arrow svg {
    width: 15px;
    height: 15px;
    stroke: var(--c-orange);
    fill: none;
    transition: transform var(--t-med);
}

.ee-crm-module .ee-card:hover .ee-cta-arrow {
    background: var(--c-orange);
    transform: scale(1.1);
}

.ee-crm-module .ee-card:hover .ee-cta-arrow svg {
    stroke: white;
    transform: translateX(2px);
}

.ee-crm-module .ee-bottom-cta {
    margin-top: var(--space-xl);
    background: var(--c-blue);
    border-radius: var(--radius-lg);
    padding: 48px 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 32px;
    position: relative;
    overflow: hidden;
}

.ee-crm-module .ee-bottom-cta::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 60% 80% at 0% 50%, rgba(222,110,48,.12) 0%, transparent 60%),
        radial-gradient(ellipse 40% 60% at 100% 50%, rgba(222,110,48,.06) 0%, transparent 60%);
}

.ee-crm-module .ee-bottom-cta-text {
    position: relative;
    z-index: 1;
}

.ee-crm-module .ee-bottom-cta h3 {
    font-size: clamp(1.3rem, 3vw, 1.9rem);
    font-weight: 900;
    color: var(--c-white);
    letter-spacing: -.03em;
    line-height: 1.15;
    margin-bottom: 10px;
}

.ee-crm-module .ee-bottom-cta p {
    font-size: .95rem;
    color: rgba(255,255,255,.6);
    line-height: 1.45;
}

.ee-crm-module .ee-bottom-cta-actions {
    display: flex;
    gap: 12px;
    position: relative;
    z-index: 1;
    flex-shrink: 0;
}

.ee-crm-module .ee-btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--c-orange);
    color: white;
    font-family: var(--font-body);
    font-size: .9rem;
    font-weight: 700;
    text-decoration: none;
    padding: 14px 24px;
    border-radius: var(--radius-sm);
    transition:
        background var(--t-fast),
        transform var(--t-fast),
        box-shadow var(--t-fast);
    box-shadow: 0 4px 16px rgba(222,110,48,.35);
    white-space: nowrap;
}

.ee-crm-module .ee-btn-primary:hover {
    background: var(--c-orange-light);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(222,110,48,.45);
}

.ee-crm-module .ee-btn-primary svg {
    width: 16px;
    height: 16px;
    fill: none;
    stroke: white;
    stroke-width: 2.5;
    transition: transform var(--t-fast);
}

.ee-crm-module .ee-btn-primary:hover svg {
    transform: translateX(3px);
}

.ee-crm-module .ee-btn-secondary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,.08);
    border: 1.5px solid rgba(255,255,255,.18);
    color: white;
    font-family: var(--font-body);
    font-size: .9rem;
    font-weight: 600;
    text-decoration: none;
    padding: 14px 24px;
    border-radius: var(--radius-sm);
    transition:
        background var(--t-fast),
        border-color var(--t-fast),
        transform var(--t-fast);
    white-space: nowrap;
}

.ee-crm-module .ee-btn-secondary:hover {
    background: rgba(255,255,255,.14);
    border-color: rgba(255,255,255,.3);
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .ee-crm-module .ee-section { padding: var(--space-lg) 0 var(--space-xl); }
    .ee-crm-module .ee-container { padding: 0 16px; }
    .ee-crm-module .ee-header { margin-bottom: var(--space-lg); }

    .ee-crm-module .ee-stats-strip {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        border-radius: var(--radius-md);
    }

    .ee-crm-module .ee-stat:nth-child(2)::after { display: none; }
    .ee-crm-module .ee-stat:nth-child(4)::after { display: none; }

    .ee-crm-module .ee-bottom-cta {
        flex-direction: column;
        text-align: center;
        padding: 36px 24px;
    }

    .ee-crm-module .ee-bottom-cta-actions {
        flex-direction: column;
        width: 100%;
    }

    .ee-crm-module .ee-btn-primary,
    .ee-crm-module .ee-btn-secondary {
        justify-content: center;
        width: 100%;
    }

    .ee-crm-module .ee-card {
        padding: 28px 22px 24px;
    }
}

@media (max-width: 480px) {
    .ee-crm-module .ee-stats-strip {
        grid-template-columns: 1fr 1fr;
    }

    .ee-crm-module .ee-headline {
        font-size: 1.8rem;
    }
}

@media (prefers-reduced-motion: reduce) {
    .ee-crm-module .ee-line-accent,
    .ee-crm-module .ee-orb,
    .ee-crm-module .ee-headline-accent::after {
        animation: none;
    }

    .ee-crm-module .ee-headline-accent::after {
        transform: scaleX(1);
    }

    .ee-crm-module .ee-card,
    .ee-crm-module .ee-card.ee-revealed {
        opacity: 1;
        transform: none;
        transition: border-color .2s, box-shadow .2s;
    }

    .ee-crm-module .ee-card:hover {
        transform: none;
    }
}
</style>

<section class="ee-crm-module" aria-labelledby="ee-section-title" itemscope itemtype="https://schema.org/ItemList">

    <div class="ee-bg-canvas" aria-hidden="true">
        <div class="ee-bg-mesh"></div>
        <div class="ee-bg-grid"></div>
        <div class="ee-orb ee-orb-1"></div>
        <div class="ee-orb ee-orb-2"></div>
        <div class="ee-line-accent"></div>
        <div class="ee-line-accent"></div>
        <div class="ee-line-accent"></div>
        <div class="ee-line-accent"></div>
    </div>

    <div class="ee-container">
        <div class="ee-section">

            <header class="ee-header">
                <div class="ee-eyebrow-wrap" aria-label="Convert more students automatically">
                    <span class="ee-eyebrow-dot" aria-hidden="true">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                        </svg>
                    </span>
                    <span class="ee-eyebrow-text">Convert More Students — Automatically</span>
                </div>

                <h1 class="ee-headline" id="ee-section-title">
                    Built for <span class="ee-headline-accent">Every</span><br>
                    Education Segment
                </h1>

                <p class="ee-subheadline">
                    Purpose-built CRM solutions tailored to your institution type — so your admissions team spends less time on tasks and more time on students.
                </p>
            </header>

            <div class="ee-stats-strip" role="region" aria-label="Key statistics">
                <div class="ee-stat">
                    <div class="ee-stat-value">500<span>+</span></div>
                    <div class="ee-stat-label">Institutions Trust Us</div>
                </div>
                <div class="ee-stat">
                    <div class="ee-stat-value">3<span>x</span></div>
                    <div class="ee-stat-label">Avg. Conversion Lift</div>
                </div>
                <div class="ee-stat">
                    <div class="ee-stat-value">40<span>%</span></div>
                    <div class="ee-stat-label">Faster Admissions Cycle</div>
                </div>
                <div class="ee-stat">
                    <div class="ee-stat-value">6</div>
                    <div class="ee-stat-label">Industry Verticals</div>
                </div>
            </div>

            <?php
            /* Single source of truth — same helper that drives the header desktop + mobile menus */
            $ee_industry_cards = function_exists('ee_get_industry_menu_items') ? ee_get_industry_menu_items() : array();
            ?>
            <div class="ee-grid" id="ee-solution-grid" role="list" aria-label="Education CRM solutions">
                <?php $ee_card_pos = 0; foreach ($ee_industry_cards as $card) : $ee_card_pos++; ?>
                <a href="<?php echo esc_url($card['url']); ?>" class="ee-card" target="_blank" rel="noopener noreferrer" role="listitem" aria-label="<?php echo esc_attr($card['title'] . ' solution — explore'); ?>" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <meta itemprop="position" content="<?php echo (int) $ee_card_pos; ?>">
                    <meta itemprop="url" content="<?php echo esc_url($card['url']); ?>">
                    <div class="ee-card-bar" aria-hidden="true"></div>
                    <div class="ee-card-corner" aria-hidden="true"></div>
                    <div class="ee-icon-wrap">
                        <img src="<?php echo esc_url($card['icon'] ?: 'https://www.extraaedge.com/wp-content/uploads/2022/06/enterprise.png'); ?>" alt="" loading="lazy" width="30" height="30">
                        <span class="ee-card-number" aria-hidden="true"><?php echo esc_html(str_pad($ee_card_pos, 2, '0', STR_PAD_LEFT)); ?></span>
                    </div>
                    <h2 class="ee-card-title" itemprop="name"><?php echo esc_html($card['title']); ?></h2>
                    <p class="ee-card-desc"><?php echo esc_html($card['desc']); ?></p>
                    <?php if (!empty($card['tags'])) : ?>
                    <div class="ee-tags" aria-label="Key features">
                        <?php foreach ($card['tags'] as $tag) : ?>
                        <span class="ee-tag"><?php echo esc_html($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <div class="ee-cta-row">
                        <span class="ee-cta-label">Explore Solution</span>
                        <span class="ee-cta-arrow" aria-hidden="true">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>

            <div class="ee-bottom-cta" role="complementary" aria-label="Get started with ExtraaEdge">
                <div class="ee-bottom-cta-text">
                    <h3>Not sure which solution fits?</h3>
                    <p>Our education CRM experts will map the right solution to your institution's exact needs — free of charge.</p>
                </div>
                <div class="ee-bottom-cta-actions">
                    <a href="https://www.extraaedge.com/request-demo/" target="_blank" rel="noopener noreferrer" class="ee-btn-primary">
                        Request a Free Demo
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="https://www.extraaedge.com/contact/" target="_blank" rel="noopener noreferrer" class="ee-btn-secondary">
                        Talk to an Expert
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "name": "Education Industry CRM Solutions by ExtraaEdge",
  "description": "Industry-specific CRM platforms for Higher Education, Schools, Edtech, Vocational institutes, Coaching Centers, and Overseas admissions.",
  "url": "<?php echo esc_url(home_url('/industries/')); ?>",
  "numberOfItems": 6,
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Higher Education CRM",   "url": "https://www.extraaedge.com/industries/higher-education-crm/",   "description": "End-to-end admissions solution for universities and colleges" },
    { "@type": "ListItem", "position": 2, "name": "School CRM",             "url": "https://www.extraaedge.com/industries/school-crm/",             "description": "Digitize your entire student admissions process for schools" },
    { "@type": "ListItem", "position": 3, "name": "Edtech CRM",             "url": "https://www.extraaedge.com/industries/edtech-crm/",             "description": "Holistic admissions solution for tech-first learning businesses" },
    { "@type": "ListItem", "position": 4, "name": "Vocational CRM",         "url": "https://www.extraaedge.com/industries/vocational-crm/",         "description": "Powerful CRM for vocational training institutes" },
    { "@type": "ListItem", "position": 5, "name": "Coaching Institute CRM", "url": "https://www.extraaedge.com/industries/coaching-institute-crm/", "description": "All-in-one CRM for test prep and coaching institutes" },
    { "@type": "ListItem", "position": 6, "name": "Overseas CRM",           "url": "https://www.extraaedge.com/industries/overseas-crm/",           "description": "Complete applications platform for study abroad and overseas admissions" }
  ]
}
</script>

<script>
(function () {
    'use strict';

    function initReveal() {
        var cards = document.querySelectorAll('.ee-crm-module .ee-card');
        if (!cards.length) return;

        var prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (!('IntersectionObserver' in window) || prefersReduced) {
            cards.forEach(function (card) { card.classList.add('ee-revealed'); });
            return;
        }

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var card = entry.target;
                    var idx = parseInt(card.getAttribute('data-ee-idx') || '0', 10);
                    setTimeout(function () {
                        card.classList.add('ee-revealed');
                    }, idx * 90);
                    observer.unobserve(card);
                }
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

        cards.forEach(function (card, i) {
            card.setAttribute('data-ee-idx', i);
            observer.observe(card);
        });
    }

    function initCountUp() {
        var statValues = document.querySelectorAll('.ee-crm-module .ee-stat-value');
        if (!statValues.length || !('IntersectionObserver' in window)) return;

        var statsObserver = new IntersectionObserver(function (entries) {
            if (entries[0].isIntersecting) {
                statsObserver.disconnect();
                statValues.forEach(function (el) {
                    var raw = el.textContent;
                    var match = raw.match(/^(\d+)/);
                    if (!match) return;

                    var target = parseInt(match[1], 10);
                    var suffix = raw.replace(match[0], '').trim();
                    var startTime = null;
                    var duration = 1200;

                    function step(ts) {
                        if (!startTime) startTime = ts;
                        var progress = Math.min((ts - startTime) / duration, 1);
                        var eased = 1 - Math.pow(1 - progress, 4);
                        var current = Math.round(eased * target);
                        el.textContent = current + suffix;
                        if (progress < 1) requestAnimationFrame(step);
                        else el.innerHTML = target + (suffix ? '<span>' + suffix + '</span>' : '');
                    }

                    requestAnimationFrame(step);
                });
            }
        }, { threshold: 0.5 });

        var strip = document.querySelector('.ee-crm-module .ee-stats-strip');
        if (strip) statsObserver.observe(strip);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            initReveal();
            initCountUp();
        });
    } else {
        initReveal();
        initCountUp();
    }
}());
</script>

<?php get_footer(); ?>
