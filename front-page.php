<?php
/**
 * Front Page - ExtraaEdge Orange Homepage Concept.
 *
 * Faithful WordPress port of the owner's approved orange prototype
 * ("ExtraaEdge Orange Homepage Concept"). The prototype's markup and copy are
 * reproduced verbatim; its stylesheet lived in the prototype's private asset
 * bundle, so the design is recreated here to match: orange-led editorial
 * look, cream paper background, dark CTA buttons, Geist type.
 *
 * Standalone template: the concept ships its OWN header and footer, so this
 * file does not call get_header()/get_footer(). wp_head()/wp_footer() keep
 * WordPress plumbing (SEO, cache, admin bar) intact.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Geist:wght@300..900&family=Geist+Mono:wght@400..700&display=swap" rel="stylesheet">
<?php wp_head(); ?>
<style id="ee-orange-concept">
/* ══════════════════════════════════════════════════════════════════════
   ExtraaEdge · Orange Homepage Concept
   paper #FAF6F0 · ink #191919 · orange #DE6E30 · deep #16213A
   ══════════════════════════════════════════════════════════════════════ */
:root{
  --paper:#FAF6F0; --paper-2:#F3ECE2; --ink:#191919; --ink-soft:#4c463d;
  --orange:#DE6E30; --orange-soft:#F6D9C6; --orange-deep:#B5551D;
  --deep:#16213A; --line:rgba(25,25,25,.12);
  --font:'Geist','Inter',system-ui,-apple-system,sans-serif;
  --mono:'Geist Mono',ui-monospace,monospace;
  --r-lg:26px; --r-md:16px;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{background:var(--paper);color:var(--ink);font-family:var(--font);font-size:16px;line-height:1.6;-webkit-font-smoothing:antialiased}
main{overflow-x:clip}
img{max-width:100%}
a{color:inherit;text-decoration:none}
.section{padding:clamp(72px,9vw,130px) clamp(20px,5vw,72px)}
h1,h2,h3{font-weight:650;letter-spacing:-.03em;line-height:1.04;text-wrap:balance}
h2{font-size:clamp(34px,4.6vw,60px)}
h1 em,h2 em{font-style:italic;color:var(--orange)}
.eyebrow{font-family:var(--mono);font-size:12px;font-weight:600;letter-spacing:.18em;text-transform:uppercase;color:var(--orange-deep);margin-bottom:18px}
.eyebrow.light{color:var(--orange-soft)}
.button{display:inline-flex;align-items:center;gap:10px;font-weight:600;font-size:15.5px;padding:16px 28px;border-radius:999px;transition:transform .25s cubic-bezier(.2,.7,.2,1),box-shadow .25s,background .2s}
.button-dark{background:var(--ink);color:var(--paper);box-shadow:0 16px 34px -14px rgba(25,25,25,.55)}
.button-dark:hover{transform:translateY(-2px);background:var(--deep)}
.button span{transition:transform .25s}
.button:hover span{transform:translate(2px,-2px)}
.text-link{display:inline-flex;align-items:center;gap:8px;font-weight:600;border-bottom:2px solid var(--orange);padding-bottom:2px}
.text-link:hover{color:var(--orange-deep)}
::selection{background:var(--orange);color:#fff}
a:focus-visible,button:focus-visible{outline:3px solid var(--orange);outline-offset:3px;border-radius:6px}

/* ── header ── */
.site-header{position:sticky;top:0;z-index:900;display:flex;align-items:center;gap:26px;padding:16px clamp(20px,5vw,72px);background:rgba(250,246,240,.88);backdrop-filter:blur(14px);border-bottom:1px solid var(--line)}
.brand{display:inline-flex;align-items:center;gap:10px;font-size:19px;letter-spacing:-.03em}
.brand strong{font-weight:750}
.brand-mark{display:inline-flex;align-items:flex-end;gap:2.5px;height:18px}
.brand-mark i{width:5px;border-radius:3px;background:var(--orange);display:block}
.brand-mark i:nth-child(1){height:9px}
.brand-mark i:nth-child(2){height:14px;background:var(--orange-deep)}
.brand-mark i:nth-child(3){height:18px;background:var(--deep)}
.site-header nav{display:flex;gap:26px;margin-left:auto;font-size:14.5px;font-weight:550;color:var(--ink-soft)}
.site-header nav a:hover{color:var(--orange-deep)}
.menu-button{display:none;margin-left:auto;font:600 14px var(--font);border:1.5px solid var(--line);background:transparent;border-radius:999px;padding:9px 18px;cursor:pointer}
.header-cta{display:inline-flex;align-items:center;gap:8px;font-weight:650;font-size:14.5px;background:var(--orange);color:#fff;padding:11px 22px;border-radius:999px;box-shadow:0 12px 26px -12px rgba(222,110,48,.7);transition:transform .2s,background .2s}
.header-cta:hover{transform:translateY(-2px);background:var(--orange-deep)}
@media(max-width:960px){
  .site-header nav{display:none;position:absolute;top:100%;left:0;right:0;flex-direction:column;gap:0;background:var(--paper);border-bottom:1px solid var(--line);padding:10px 24px 18px}
  .site-header nav.open{display:flex}
  .site-header nav a{padding:12px 0;border-bottom:1px solid var(--line)}
  .menu-button{display:inline-flex}
  .header-cta{margin-left:0}
}

/* ── hero ── */
.hero{display:grid;grid-template-columns:minmax(0,1.05fr) minmax(0,1fr);gap:clamp(30px,4vw,60px);align-items:center;padding:clamp(56px,7vw,110px) clamp(20px,5vw,72px) clamp(64px,8vw,120px);position:relative}
.kicker{display:inline-flex;align-items:center;gap:9px;font-family:var(--mono);font-size:12.5px;font-weight:600;letter-spacing:.14em;text-transform:uppercase;color:var(--orange-deep);border:1px solid rgba(222,110,48,.4);border-radius:999px;padding:8px 16px;background:rgba(222,110,48,.07)}
.kicker span{color:var(--orange)}
.hero h1{font-size:clamp(44px,6.2vw,84px);margin:26px 0 0}
.hero-sub{margin:22px 0 0;max-width:52ch;font-size:clamp(16.5px,1.5vw,19px);color:var(--ink-soft)}
.hero-actions{display:flex;align-items:center;gap:22px;margin-top:34px;flex-wrap:wrap}
.micro-proof{margin-top:30px;font-size:14px;color:var(--ink-soft)}
.micro-proof b{color:var(--ink);font-weight:750}
/* hero visual */
.hero-visual{position:relative;min-height:480px}
.orbit{position:absolute;border:1.5px dashed rgba(222,110,48,.4);border-radius:50%;pointer-events:none}
.orbit-one{width:430px;height:430px;top:6%;right:2%;animation:spin 40s linear infinite}
.orbit-two{width:590px;height:590px;top:-8%;right:-12%;border-color:rgba(22,33,58,.16);animation:spin 65s linear infinite reverse}
@keyframes spin{to{transform:rotate(360deg)}}
.signal-card{position:absolute;z-index:3;background:#fff;border:1px solid var(--line);border-radius:18px;padding:14px 18px;box-shadow:0 24px 50px -22px rgba(25,25,25,.35);animation:bob 6s ease-in-out infinite}
.signal-card span{display:block;font-family:var(--mono);font-size:10px;font-weight:600;letter-spacing:.14em;text-transform:uppercase;color:var(--ink-soft)}
.signal-card strong{display:block;font-size:22px;font-weight:750;letter-spacing:-.02em;margin-top:2px}
.signal-card small{font-size:12px;color:var(--ink-soft)}
.signal-one{top:2%;right:8%}
.signal-two{bottom:8%;left:-2%;animation-delay:1.6s}
.signal-two strong{color:var(--orange-deep)}
@keyframes bob{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
.hero-product{position:relative;z-index:2;max-width:430px;margin:56px auto 0;background:#fff;border:1px solid var(--line);border-radius:var(--r-lg);padding:20px;box-shadow:0 46px 90px -34px rgba(22,33,58,.4)}
.hero-product-head{display:flex;align-items:center;justify-content:space-between;gap:10px;padding-bottom:14px;border-bottom:1px dashed var(--line);font-weight:650;font-size:14px}
.hero-product-head>span{display:inline-flex;align-items:center;gap:8px}
.hero-product-head small{font-size:11px;color:#2f7d4f;font-weight:600}
.hero-product-line{display:flex;align-items:center;gap:12px;padding:15px 0;border-bottom:1px dashed var(--line)}
.hero-product-line b{flex:none;display:grid;place-items:center;width:40px;height:40px;border-radius:12px;background:var(--orange-soft);color:var(--orange-deep);font-weight:750;font-size:13px}
.hero-product-line p{flex:1;min-width:0}
.hero-product-line strong{display:block;font-size:14.5px;font-weight:650}
.hero-product-line small{font-size:12px;color:var(--ink-soft)}
.intent{flex:none;font-family:var(--mono);font-size:10px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:#fff;background:var(--orange);border-radius:999px;padding:5px 11px}
.hero-product-summary{display:flex;gap:11px;align-items:flex-start;padding:14px;margin-top:14px;background:rgba(222,110,48,.07);border:1px solid rgba(222,110,48,.25);border-radius:14px}
.hero-product-summary>span{color:var(--orange);font-size:15px}
.hero-product-summary small{display:block;font-family:var(--mono);font-size:10px;letter-spacing:.12em;text-transform:uppercase;color:var(--orange-deep)}
.hero-product-summary strong{font-size:13.5px;font-weight:600;line-height:1.45}
.hero-product-actions{display:flex;gap:8px;margin-top:14px}
.hero-product-actions button{font:600 13px var(--font);border:1.5px solid var(--line);background:#fff;border-radius:999px;padding:10px 16px;cursor:pointer;transition:border-color .2s,color .2s}
.hero-product-actions button:hover{border-color:var(--orange);color:var(--orange-deep)}
.hero-product-actions .primary-action{flex:1;display:inline-flex;align-items:center;justify-content:center;gap:7px;background:var(--ink);border-color:var(--ink);color:var(--paper)}
.hero-product-actions .primary-action:hover{background:var(--deep);color:#fff}
.scribble{position:absolute;bottom:-4%;right:4%;z-index:1;font-family:var(--mono);font-size:15px;font-weight:600;color:var(--orange-deep);transform:rotate(-8deg);text-align:center;line-height:1.2}
.scribble span{font-size:26px;font-style:italic;font-family:var(--font);color:var(--orange)}
@media(max-width:1024px){
  .hero{grid-template-columns:1fr}
  .hero-visual{min-height:0;margin-top:20px}
  .orbit-two{display:none}
  .orbit-one{width:320px;height:320px;top:0;right:-10%}
  .hero-product{margin-top:70px}
}
@media(max-width:560px){.signal-one{right:0}.signal-two{left:0;bottom:-4%}.scribble{display:none}}

/* ── ticker ── */
.ticker{overflow:hidden;border-block:1px solid var(--line);background:var(--paper-2);padding:16px 0}
.ticker>div{display:flex;gap:34px;align-items:center;width:max-content;white-space:nowrap;animation:tick 26s linear infinite;font-weight:650;letter-spacing:.06em;font-size:15px}
.ticker span{font-family:var(--mono);font-size:11px;letter-spacing:.2em;color:var(--orange-deep);border:1px solid rgba(222,110,48,.4);border-radius:999px;padding:6px 14px;background:#fff}
.ticker i{font-style:normal;color:var(--orange)}
@keyframes tick{to{transform:translateX(-50%)}}

/* ── journey ── */
.section-intro{max-width:760px;margin-bottom:clamp(38px,5vw,64px)}
.section-intro p:last-child{margin-top:18px;color:var(--ink-soft);font-size:17px;max-width:56ch}
.journey-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
.journey-grid article{position:relative;background:#fff;border:1px solid var(--line);border-radius:var(--r-lg);padding:28px 24px 24px;transition:transform .3s cubic-bezier(.2,.7,.2,1),box-shadow .3s,border-color .3s}
.journey-grid article:hover{transform:translateY(-6px);border-color:rgba(222,110,48,.5);box-shadow:0 30px 60px -30px rgba(22,33,58,.35)}
.journey-grid article>span{font-family:var(--mono);font-size:12px;color:var(--ink-soft)}
.journey-icon{display:grid;place-items:center;width:46px;height:46px;margin:18px 0 16px;border-radius:14px;background:var(--orange-soft);color:var(--orange-deep);font-size:20px}
.journey-grid h3{font-size:21px;margin-bottom:8px}
.journey-grid p{font-size:14px;color:var(--ink-soft);min-height:3.2em}
.journey-grid article a{display:inline-flex;align-items:center;gap:7px;margin-top:16px;font-weight:650;font-size:13.5px;color:var(--orange-deep)}
.journey-grid article a:hover{color:var(--orange)}
@media(max-width:1024px){.journey-grid{grid-template-columns:1fr 1fr}}
@media(max-width:560px){.journey-grid{grid-template-columns:1fr}}

/* ── roles + product shell ── */
.roles{background:var(--paper)}
.role-header{display:flex;align-items:flex-end;justify-content:space-between;gap:30px;flex-wrap:wrap;margin-bottom:34px}
.role-intro{margin-top:16px;max-width:52ch;color:var(--ink-soft)}
.role-tabs{display:inline-flex;gap:6px;background:#fff;border:1px solid var(--line);border-radius:999px;padding:6px}
.role-tabs button{font:600 14px var(--font);border:0;background:transparent;color:var(--ink-soft);border-radius:999px;padding:10px 22px;cursor:pointer;transition:background .2s,color .2s}
.role-tabs button.active{background:var(--ink);color:var(--paper)}
.product-shell{background:#fff;border:1px solid var(--line);border-radius:28px;overflow:hidden;box-shadow:0 50px 110px -44px rgba(22,33,58,.45)}
.product-topbar{display:flex;align-items:center;gap:18px;padding:14px 20px;border-bottom:1px solid var(--line);background:var(--paper)}
.mini-brand{display:inline-flex;align-items:center;gap:8px;font-weight:700;font-size:14px}
.product-search{flex:1;font-size:13px;color:var(--ink-soft);background:#fff;border:1px solid var(--line);border-radius:999px;padding:9px 18px}
.avatar{display:grid;place-items:center;width:34px;height:34px;border-radius:50%;background:var(--deep);color:#fff;font-size:11px;font-weight:700}
.product-body{display:grid;grid-template-columns:64px minmax(0,1fr)}
.product-nav{display:flex;flex-direction:column;align-items:center;gap:10px;padding:18px 0;border-right:1px solid var(--line);background:var(--paper)}
.product-nav button{display:grid;place-items:center;width:38px;height:38px;font-size:15px;border:1px solid transparent;background:transparent;border-radius:12px;cursor:pointer;color:var(--ink-soft);transition:.2s}
.product-nav button:hover{border-color:var(--line)}
.product-nav .nav-active{background:var(--orange-soft);color:var(--orange-deep);border-color:rgba(222,110,48,.4)}
.product-nav span{margin-top:auto;color:var(--ink-soft);font-size:14px}
.product-main{padding:clamp(18px,2.5vw,30px)}
.canvas-heading{display:flex;align-items:flex-end;justify-content:space-between;gap:18px;flex-wrap:wrap;margin-bottom:20px}
.canvas-heading small{font-family:var(--mono);font-size:11px;letter-spacing:.1em;text-transform:uppercase;color:var(--ink-soft)}
.canvas-heading h3{font-size:clamp(19px,2vw,25px);margin-top:6px}
.workspace-switcher{display:inline-flex;gap:4px;background:var(--paper);border:1px solid var(--line);border-radius:999px;padding:4px}
.workspace-switcher button{font:600 12.5px var(--font);border:0;background:transparent;color:var(--ink-soft);border-radius:999px;padding:8px 16px;cursor:pointer}
.workspace-switcher button.active{background:#fff;color:var(--ink);box-shadow:0 2px 8px rgba(25,25,25,.12)}
.canvas-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr)) minmax(0,1.4fr);gap:14px}
.metric-card{background:var(--paper);border:1px solid var(--line);border-radius:18px;padding:20px}
.metric-card span{font-family:var(--mono);font-size:10.5px;letter-spacing:.12em;text-transform:uppercase;color:var(--ink-soft)}
.metric-card strong{display:block;font-size:38px;font-weight:750;letter-spacing:-.03em;margin-top:6px}
.metric-card small{font-size:12px;color:var(--ink-soft)}
.orange-card{background:var(--orange);border-color:var(--orange)}
.orange-card span,.orange-card small{color:rgba(255,255,255,.85)}
.orange-card strong{color:#fff}
.mini-bars{display:flex;align-items:flex-end;gap:5px;height:34px;margin-top:14px}
.mini-bars i{flex:1;border-radius:4px 4px 0 0;background:rgba(255,255,255,.75)}
.mini-bars i:nth-child(1){height:35%}.mini-bars i:nth-child(2){height:55%}.mini-bars i:nth-child(3){height:45%}.mini-bars i:nth-child(4){height:70%}.mini-bars i:nth-child(5){height:60%}.mini-bars i:nth-child(6){height:85%}.mini-bars i:nth-child(7){height:100%}
.spark{display:flex;align-items:flex-end;gap:6px;height:30px;margin-top:16px}
.spark i{flex:1;border-radius:4px 4px 0 0;background:var(--orange-soft)}
.spark i:nth-child(1){height:30%}.spark i:nth-child(2){height:55%}.spark i:nth-child(3){height:42%}.spark i:nth-child(4){height:75%}.spark i:nth-child(5){height:100%;background:var(--orange)}
.priority-card{grid-row:span 2;background:#fff;border:1px solid var(--line);border-radius:18px;padding:18px}
.card-title{display:flex;align-items:center;justify-content:space-between;margin-bottom:6px}
.card-title strong{font-size:15px;font-weight:700}
.card-title span{font-family:var(--mono);font-size:10px;letter-spacing:.1em;text-transform:uppercase;color:var(--orange-deep);background:var(--orange-soft);border-radius:999px;padding:4px 10px}
.lead-row{display:flex;align-items:center;gap:12px;padding:13px 0;border-bottom:1px dashed var(--line)}
.lead-row:last-child{border-bottom:0}
.lead-row b{flex:none;display:grid;place-items:center;width:36px;height:36px;border-radius:11px;background:var(--paper-2);color:var(--deep);font-weight:750;font-size:12px}
.lead-row p{flex:1;min-width:0}
.lead-row strong{display:block;font-size:13.5px;font-weight:650}
.lead-row small{font-size:11.5px;color:var(--ink-soft)}
.lead-row button{font:600 12px var(--font);border:1.5px solid var(--line);background:#fff;border-radius:999px;padding:8px 14px;cursor:pointer;transition:.2s}
.lead-row button:hover{border-color:var(--orange);color:var(--orange-deep)}
.ai-card{grid-column:1/3;display:flex;align-items:center;gap:14px;background:var(--deep);border-radius:18px;padding:18px 20px;flex-wrap:wrap}
.ai-dot{display:grid;place-items:center;width:38px;height:38px;border-radius:50%;background:var(--orange);color:#fff;font-size:16px;flex:none}
.ai-card p{flex:1;min-width:220px}
.ai-card small{display:block;font-family:var(--mono);font-size:10px;letter-spacing:.14em;text-transform:uppercase;color:var(--orange-soft)}
.ai-card strong{color:#fff;font-size:14.5px;font-weight:600;line-height:1.45}
.ai-card button{display:inline-flex;align-items:center;gap:8px;font:650 13px var(--font);color:var(--deep);background:#fff;border:0;border-radius:999px;padding:11px 20px;cursor:pointer;transition:transform .2s}
.ai-card button:hover{transform:translateY(-2px)}
.canvas-note{margin-top:18px;text-align:center;font-family:var(--mono);font-size:11.5px;letter-spacing:.08em;color:var(--ink-soft)}
@media(max-width:900px){
  .canvas-grid{grid-template-columns:1fr 1fr}
  .priority-card{grid-row:auto;grid-column:1/3}
  .ai-card{grid-column:1/3}
  .product-body{grid-template-columns:52px minmax(0,1fr)}
}
@media(max-width:560px){.canvas-grid{grid-template-columns:1fr}.priority-card,.ai-card{grid-column:auto}}

/* ── product video ── */
.product-video{background:var(--paper)}
.video-heading{display:flex;align-items:flex-end;justify-content:space-between;gap:26px;flex-wrap:wrap;margin-bottom:36px}
.video-heading>p{max-width:44ch;color:var(--ink-soft)}
.video-frame{position:relative;border-radius:28px;overflow:hidden;border:1px solid var(--line);box-shadow:0 60px 120px -44px rgba(22,33,58,.55);background:var(--deep)}
.video-browser-bar{display:flex;align-items:center;gap:14px;padding:13px 20px;background:#101A30;color:rgba(255,255,255,.8);font-size:13px}
.video-browser-bar>span{display:inline-flex;gap:5px}
.video-browser-bar>span i{width:10px;height:10px;border-radius:50%;background:rgba(255,255,255,.25)}
.video-browser-bar>span i:first-child{background:var(--orange)}
.video-browser-bar strong{font-weight:600}
.video-browser-bar small{margin-left:auto;font-family:var(--mono);font-size:11px;color:rgba(255,255,255,.55)}
.video-screen{position:relative;min-height:clamp(380px,42vw,560px);display:grid;place-items:center;overflow:hidden;padding:clamp(24px,4vw,56px)}
.video-backdrop{position:relative;z-index:1;text-align:center;color:#fff}
.video-kicker{font-family:var(--mono);font-size:11px;letter-spacing:.24em;color:var(--orange-soft)}
.video-backdrop h3{font-size:clamp(28px,3.6vw,48px);margin:16px 0 12px;color:#fff}
.video-backdrop h3 em{color:var(--orange)}
.video-backdrop p{font-family:var(--mono);font-size:12.5px;letter-spacing:.1em;color:rgba(255,255,255,.65)}
.video-demo-ui{position:absolute;inset:auto 6% -4% 6%;z-index:0;display:grid;grid-template-columns:56px 1fr;gap:0;background:rgba(255,255,255,.045);border:1px solid rgba(255,255,255,.12);border-radius:20px 20px 0 0;padding:16px;opacity:.6}
.video-demo-ui aside{display:flex;flex-direction:column;align-items:center;gap:12px;color:rgba(255,255,255,.55);font-size:14px}
.video-demo-ui aside i{font-style:normal}
.video-demo-ui aside .brand-mark i{background:var(--orange)}
.video-ui-head{display:flex;align-items:center;justify-content:space-between;gap:14px;color:rgba(255,255,255,.75);font-size:12.5px;margin-bottom:12px}
.video-ui-head b{color:var(--orange-soft);font-weight:600}
.video-ui-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.video-ui-grid article{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:12px;padding:12px 14px;color:#fff}
.video-ui-grid small{display:block;font-size:10.5px;color:rgba(255,255,255,.55)}
.video-ui-grid strong{font-size:20px;font-weight:700}
.video-ui-grid article>i{display:block;height:4px;border-radius:99px;background:var(--orange);margin-top:10px;width:60%}
.video-ui-wide{grid-column:1/3}
.video-ui-wide div{display:flex;align-items:flex-end;gap:6px;height:52px;margin-top:8px}
.video-ui-wide div i{flex:1;border-radius:4px 4px 0 0;background:linear-gradient(to top,rgba(222,110,48,.4),var(--orange))}
.video-play{position:absolute;z-index:2;left:50%;bottom:clamp(56px,8vw,86px);transform:translateX(-50%);display:flex;align-items:center;gap:14px;border:0;cursor:pointer;background:#fff;color:var(--ink);border-radius:999px;padding:12px 26px 12px 14px;font-family:var(--font);box-shadow:0 24px 55px -18px rgba(0,0,0,.6);transition:transform .25s,opacity .4s}
.video-play:hover{transform:translateX(-50%) translateY(-3px)}
.video-play>span:first-child{display:grid;place-items:center;width:44px;height:44px;border-radius:50%;background:var(--orange);color:#fff;font-size:15px}
.video-play strong{display:block;font-size:14.5px;font-weight:700;text-align:left}
.video-play small{display:block;font-family:var(--mono);font-size:11px;color:var(--ink-soft);text-align:left}
.video-progress{position:absolute;z-index:2;left:clamp(20px,4vw,48px);right:clamp(20px,4vw,48px);bottom:clamp(18px,3vw,30px);display:flex;align-items:center;gap:14px;color:rgba(255,255,255,.7);font-family:var(--mono);font-size:11px}
.video-progress i{flex:1;height:4px;border-radius:99px;background:rgba(255,255,255,.2);position:relative;overflow:hidden}
.video-progress i::after{content:"";position:absolute;inset:0;right:100%;background:var(--orange);border-radius:inherit}
.video-frame.playing .video-progress i::after{right:0;transition:right 138s linear}
.video-frame.playing .video-play{opacity:0;pointer-events:none}
.video-note{margin-top:18px;text-align:center;font-family:var(--mono);font-size:11.5px;letter-spacing:.08em;color:var(--ink-soft)}

/* ── VidyaAI ── */
.ai-section{background:var(--deep);color:#fff;border-radius:clamp(24px,4vw,44px);margin-inline:clamp(10px,2vw,28px)}
.ai-heading{display:flex;align-items:flex-end;justify-content:space-between;gap:26px;flex-wrap:wrap;margin-bottom:clamp(36px,5vw,56px)}
.ai-heading h2{color:#fff}
.ai-heading>p{max-width:46ch;color:rgba(255,255,255,.7)}
.agent-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
.agent-grid article{position:relative;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.12);border-radius:22px;padding:26px 22px;transition:transform .3s,border-color .3s,background .3s}
.agent-grid article:hover{transform:translateY(-6px);border-color:rgba(222,110,48,.6);background:rgba(255,255,255,.08)}
.agent-grid .featured-agent{background:var(--orange);border-color:var(--orange)}
.agent-number{position:absolute;top:20px;right:22px;font-family:var(--mono);font-size:12px;color:rgba(255,255,255,.5)}
.agent-symbol{display:grid;place-items:center;width:42px;height:42px;border-radius:50%;background:rgba(255,255,255,.14);color:#fff;font-size:16px;margin-bottom:40px}
.featured-agent .agent-symbol{background:rgba(255,255,255,.25)}
.agent-grid small{font-family:var(--mono);font-size:10.5px;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.6)}
.featured-agent small{color:rgba(255,255,255,.8)}
.agent-grid h3{font-size:23px;margin:8px 0 8px;color:#fff}
.agent-grid p{font-size:13.5px;color:rgba(255,255,255,.7);min-height:3.4em}
.featured-agent p{color:rgba(255,255,255,.9)}
.agent-grid a{display:inline-flex;align-items:center;gap:7px;margin-top:18px;font-weight:650;font-size:13px;color:var(--orange-soft)}
.featured-agent a{color:#fff}
.agent-grid a:hover{color:#fff}
@media(max-width:1024px){.agent-grid{grid-template-columns:1fr 1fr}}
@media(max-width:560px){.agent-grid{grid-template-columns:1fr}}

/* ── difference ── */
.difference-title{max-width:720px;margin-bottom:clamp(36px,5vw,56px)}
.difference-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.difference-grid article{background:#fff;border:1px solid var(--line);border-radius:24px;padding:28px 26px;position:relative}
.difference-large{grid-column:span 3;display:grid;grid-template-columns:auto minmax(0,1fr);gap:clamp(20px,4vw,54px);align-items:start;background:var(--paper-2)!important}
.big-number{font-family:var(--mono);font-size:clamp(38px,5vw,66px);font-weight:700;color:var(--orange);line-height:1}
.difference-grid h3{font-size:clamp(20px,2vw,26px);margin-bottom:10px}
.difference-grid p{color:var(--ink-soft);font-size:14.5px;max-width:52ch}
.difference-large ul{list-style:none;display:flex;gap:10px;flex-wrap:wrap;margin-top:18px}
.difference-large li{font-size:13px;font-weight:600;border:1.5px solid rgba(222,110,48,.45);color:var(--orange-deep);border-radius:999px;padding:8px 16px;background:#fff}
.config-card .big-number,.support-card .big-number,.value-card .big-number{display:block;margin-bottom:26px}
.config-ui{margin-top:20px;border:1px dashed var(--line);border-radius:14px;padding:14px}
.config-ui span{display:block;font-family:var(--mono);font-size:10px;letter-spacing:.12em;text-transform:uppercase;color:var(--ink-soft);margin-bottom:10px}
.config-ui button{font:600 12px var(--font);border:1.5px solid var(--line);background:#fff;border-radius:999px;padding:8px 14px;margin:0 6px 6px 0;cursor:pointer}
.config-ui button.selected{background:var(--orange);border-color:var(--orange);color:#fff}
.support-people{display:flex;align-items:center;margin-top:20px}
.support-people i{display:grid;place-items:center;width:38px;height:38px;border-radius:50%;border:2px solid #fff;background:var(--orange-soft);color:var(--orange-deep);font-style:normal;font-weight:700;font-size:11.5px;margin-left:-8px}
.support-people i:first-child{margin-left:0}
.support-people span{margin-left:12px;font-size:12.5px;color:var(--ink-soft)}
.value-card{background:var(--deep)!important;border-color:var(--deep)!important}
.value-card h3{color:#fff}
.value-card p{color:rgba(255,255,255,.7)}
.value-card a{display:inline-flex;align-items:center;gap:8px;margin-top:20px;font-weight:650;font-size:14px;color:var(--orange-soft)}
.value-card a:hover{color:#fff}
@media(max-width:960px){.difference-grid{grid-template-columns:1fr}.difference-large{grid-column:auto;grid-template-columns:1fr}}

/* ── proof ── */
.proof{background:var(--paper-2);border-block:1px solid var(--line)}
.proof-stat{display:grid;grid-template-columns:auto minmax(0,1fr);gap:clamp(22px,4vw,54px);align-items:center;margin:26px 0 36px}
.proof-stat strong{font-size:clamp(72px,10vw,148px);font-weight:750;letter-spacing:-.05em;line-height:.9}
.proof-stat strong span{color:var(--orange)}
.proof-stat p{max-width:40ch;font-size:clamp(16px,1.6vw,19px);color:var(--ink-soft)}
.proof-cards{display:grid;grid-template-columns:1.4fr 1fr;gap:14px}
.proof-cards article{background:#fff;border:1px solid var(--line);border-radius:24px;padding:30px 28px}
.proof-cards span{font-family:var(--mono);font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:var(--ink-soft)}
.proof-cards h3{font-size:clamp(19px,2vw,25px);font-weight:600;line-height:1.35;margin:14px 0 12px}
.proof-cards small{font-size:12px;color:var(--ink-soft)}
.proof-orange{background:var(--orange)!important;border-color:var(--orange)!important}
.proof-orange span{color:rgba(255,255,255,.85)}
.proof-orange ul{list-style:none;margin-top:14px;display:grid;gap:11px}
.proof-orange li{color:#fff;font-weight:600;font-size:15.5px;padding-left:26px;position:relative}
.proof-orange li::before{content:"\2713";position:absolute;left:0;font-weight:800}
@media(max-width:820px){.proof-stat{grid-template-columns:1fr}.proof-cards{grid-template-columns:1fr}}

/* ── resources ── */
.resource-head{display:flex;align-items:flex-end;justify-content:space-between;gap:24px;flex-wrap:wrap;margin-bottom:clamp(30px,4vw,48px)}
.resource-head>a{display:inline-flex;align-items:center;gap:8px;font-weight:650;border-bottom:2px solid var(--orange);padding-bottom:3px}
.resource-head>a:hover{color:var(--orange-deep)}
.resource-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.resource-grid article{background:#fff;border:1px solid var(--line);border-radius:24px;overflow:hidden;transition:transform .3s,box-shadow .3s}
.resource-grid article:hover{transform:translateY(-6px);box-shadow:0 30px 60px -30px rgba(22,33,58,.35)}
.resource-art{position:relative;height:170px;display:grid;place-items:center}
.resource-art span{position:absolute;top:14px;left:18px;font-family:var(--mono);font-size:13px;font-weight:700;color:rgba(255,255,255,.9)}
.resource-art i{font-style:italic;font-size:26px;font-weight:650;letter-spacing:-.02em;color:#fff;text-align:center;line-height:1.15}
.art-one{background:linear-gradient(135deg,var(--deep),#2A4370)}
.art-two{background:linear-gradient(135deg,var(--orange),var(--orange-deep))}
.art-three{background:linear-gradient(135deg,#1F1C17,#4A4238)}
.resource-grid small{display:block;padding:18px 22px 0;font-family:var(--mono);font-size:10.5px;letter-spacing:.16em;color:var(--orange-deep)}
.resource-grid h3{font-size:19px;padding:8px 22px 0;line-height:1.3}
.resource-grid article a{display:inline-flex;align-items:center;gap:7px;margin:14px 22px 22px;font-weight:650;font-size:13.5px;color:var(--ink)}
.resource-grid article a:hover{color:var(--orange-deep)}
@media(max-width:900px){.resource-grid{grid-template-columns:1fr}}

/* ── final CTA ── */
.final-cta{position:relative;overflow:hidden;text-align:center;background:var(--orange);color:#fff;border-radius:clamp(24px,4vw,44px);margin:clamp(10px,2vw,28px);padding:clamp(80px,10vw,140px) 24px}
.final-cta .eyebrow{color:rgba(255,255,255,.85)}
.final-cta h2{color:#fff;font-size:clamp(38px,5.6vw,72px)}
.final-cta h2 em{color:var(--deep)}
.final-cta>p{margin:20px auto 0;max-width:46ch;color:rgba(255,255,255,.9);font-size:17px}
.final-cta .button{margin-top:34px;background:var(--deep);color:#fff}
.final-cta .button:hover{background:var(--ink)}
.cta-sun{position:absolute;top:-70px;right:-40px;font-size:230px;color:rgba(255,255,255,.14);pointer-events:none;line-height:1;animation:spin 30s linear infinite}

/* ── footer ── */
footer{padding:clamp(48px,7vw,84px) clamp(20px,5vw,72px) 30px}
.footer-top{display:flex;align-items:flex-start;justify-content:space-between;gap:26px;flex-wrap:wrap;padding-bottom:38px;border-bottom:1px solid var(--line)}
.footer-brand{font-size:22px}
.footer-top p{color:var(--ink-soft);font-size:14.5px;text-align:right}
.footer-links{display:grid;grid-template-columns:repeat(4,1fr);gap:26px;padding:38px 0}
.footer-links strong{display:block;font-family:var(--mono);font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:var(--ink-soft);margin-bottom:14px}
.footer-links a{display:block;font-size:14px;color:var(--ink-soft);padding:5px 0}
.footer-links a:hover{color:var(--orange-deep)}
.footer-bottom{display:flex;align-items:center;justify-content:space-between;gap:14px;flex-wrap:wrap;border-top:1px solid var(--line);padding-top:22px;font-size:12.5px;color:var(--ink-soft)}
@media(max-width:820px){.footer-links{grid-template-columns:1fr 1fr}.footer-top p{text-align:left}}

@media(prefers-reduced-motion:reduce){
  html{scroll-behavior:auto}
  .orbit,.signal-card,.ticker>div,.cta-sun{animation:none!important}
  *{transition-duration:.01ms!important}
}
</style>
</head>
<body <?php body_class(); ?>>
<main>

<header class="site-header"><a href="#top" class="brand" aria-label="ExtraaEdge home"><span class="brand-mark" aria-hidden="true"><i></i><i></i><i></i></span><strong>extraaedge</strong></a><button class="menu-button" type="button" aria-label="Toggle menu" aria-expanded="false">Menu</button><nav id="mainNav" aria-label="Main navigation"><a href="#platform">Platform</a><a href="#product-video">Product film</a><a href="#ai">VidyaAI</a><a href="#difference">Why ExtraaEdge</a><a href="#resources">Resources</a></nav><a class="header-cta" href="#demo">Book a demo <span aria-hidden="true">&#8599;</span></a></header>

<section class="hero" id="top">
  <div class="hero-copy">
    <p class="kicker"><span>&#10022;</span> The Admission Growth Platform</p>
    <h1>Turn every enquiry into <em>momentum.</em></h1>
    <p class="hero-sub">One simple, configurable platform to attract, engage and enrol more students&mdash;with AI working alongside your admission team.</p>
    <div class="hero-actions">
      <a class="button button-dark" href="#demo">See ExtraaEdge in action <span aria-hidden="true">&#8599;</span></a>
      <a class="text-link" href="#platform">Explore the platform <span>&#8595;</span></a>
    </div>
    <p class="micro-proof"><b>340+</b> education teams already grow with ExtraaEdge</p>
  </div>
  <div class="hero-visual">
    <div class="orbit orbit-one"></div>
    <div class="orbit orbit-two"></div>
    <div class="signal-card signal-one"><span>New enquiry</span><strong>+248</strong><small>this week</small></div>
    <div class="signal-card signal-two"><span>AI priority</span><strong>Hot lead</strong><small>Call within 8 min</small></div>
    <div class="hero-product">
      <div class="hero-product-head"><span><span class="brand-mark" aria-hidden="true"><i></i><i></i><i></i></span> Live admission desk</span><small>&#9679; All systems connected</small></div>
      <div class="hero-product-line"><b>AS</b><p><strong>Aditi Sharma</strong><small>MBA &middot; Website &middot; 2 min ago</small></p><span class="intent">High intent</span></div>
      <div class="hero-product-summary"><span>&#10022;</span><p><small>AI summary</small><strong>Asked about scholarship, eligibility and the September intake.</strong></p></div>
      <div class="hero-product-actions"><button type="button">Call</button><button type="button">WhatsApp</button><button type="button" class="primary-action">Next best action <span aria-hidden="true">&#8599;</span></button></div>
    </div>
    <div class="scribble">admit<br><span>more</span></div>
  </div>
</section>

<section class="ticker" aria-label="Platform outcomes"><div><span>ONE PLATFORM</span><b>CRM</b><i>&#10022;</i><b>APPLICATIONS</b><i>&#10022;</i><b>COMMUNICATION</b><i>&#10022;</i><b>AI AGENTS</b><i>&#10022;</i><b>ANALYTICS</b><span>ONE PLATFORM</span><b>CRM</b><i>&#10022;</i><b>APPLICATIONS</b><i>&#10022;</i><b>COMMUNICATION</b><i>&#10022;</i><b>AI AGENTS</b><i>&#10022;</i><b>ANALYTICS</b></div></section>

<section class="journey section" id="platform">
  <div class="section-intro">
    <p class="eyebrow">One connected admission journey</p>
    <h2>Less software to manage.<br><em>More students moving forward.</em></h2>
    <p>ExtraaEdge brings every signal, conversation and application into one operating system built specifically for education.</p>
  </div>
  <div class="journey-grid">
    <article><span>01</span><div class="journey-icon">&#8961;</div><h3>Attract</h3><p>Capture every enquiry with source and intent intact.</p><a href="#demo" aria-label="Explore Attract">Explore <span aria-hidden="true">&#8599;</span></a></article>
    <article><span>02</span><div class="journey-icon">&#9676;</div><h3>Engage</h3><p>Reach students across voice, WhatsApp, email and web.</p><a href="#demo" aria-label="Explore Engage">Explore <span aria-hidden="true">&#8599;</span></a></article>
    <article><span>03</span><div class="journey-icon">&#8599;</div><h3>Convert</h3><p>Guide counsellors with priorities, context and next-best actions.</p><a href="#demo" aria-label="Explore Convert">Explore <span aria-hidden="true">&#8599;</span></a></article>
    <article><span>04</span><div class="journey-icon">&#10003;</div><h3>Enrol</h3><p>Move applications, payments and documents to completion.</p><a href="#demo" aria-label="Explore Enrol">Explore <span aria-hidden="true">&#8599;</span></a></article>
  </div>
</section>

<section class="roles section">
  <div class="role-header">
    <div>
      <p class="eyebrow">Built around your team</p>
      <h2>Don&rsquo;t just read about it.<br><em>Explore the product.</em></h2>
      <p class="role-intro">Choose a team view, then move between live product mockups to see how each workspace supports their day.</p>
    </div>
    <div class="role-tabs" role="tablist" aria-label="Choose a team view">
      <button type="button" role="tab" aria-selected="true" class="active" data-for="For admission leaders">Leader</button>
      <button type="button" role="tab" aria-selected="false" data-for="For counsellors">Counsellor</button>
      <button type="button" role="tab" aria-selected="false" data-for="For marketing teams">Marketing</button>
    </div>
  </div>
  <div class="product-shell" aria-live="polite">
    <div class="product-topbar">
      <div class="mini-brand"><span class="brand-mark" aria-hidden="true"><i></i><i></i><i></i></span><strong>ExtraaEdge</strong></div>
      <div class="product-search">Search a lead, application or task&hellip;</div>
      <span class="avatar">SM</span>
    </div>
    <div class="product-body">
      <aside class="product-nav" aria-label="Product navigation example">
        <button type="button" aria-label="Open Today workspace" class="nav-active">&#8961;</button>
        <button type="button" aria-label="Open Leads workspace">&#9678;</button>
        <button type="button" aria-label="Open Applications workspace">&#9671;</button>
        <button type="button" aria-label="Open Insights workspace">&#9651;</button>
        <span>&#9881;</span>
      </aside>
      <section class="product-main">
        <div class="canvas-heading">
          <div>
            <small><span id="canvasRole">For admission leaders</span> &middot; <span id="canvasWs">Today</span></small>
            <h3>See where every enrolment stands.</h3>
          </div>
          <div class="workspace-switcher" role="tablist" aria-label="Explore product workspaces">
            <button type="button" role="tab" aria-selected="true" class="active">Today</button>
            <button type="button" role="tab" aria-selected="false">Leads</button>
            <button type="button" role="tab" aria-selected="false">Applications</button>
            <button type="button" role="tab" aria-selected="false">Insights</button>
          </div>
        </div>
        <div class="canvas-grid">
          <article class="metric-card orange-card"><span>Momentum</span><strong>82%</strong><small>on-track applications</small><div class="mini-bars"><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div></article>
          <article class="metric-card"><span>Admissions today</span><strong>18</strong><small>+12% from last week</small><div class="spark"><i></i><i></i><i></i><i></i><i></i></div></article>
          <article class="priority-card">
            <div class="card-title"><strong>Priority queue</strong><span>AI ranked</span></div>
            <div class="lead-row"><b>AS</b><p><strong>Aditi Sharma</strong><small>MBA &middot; Form 80% complete</small></p><button type="button">Call now</button></div>
            <div class="lead-row"><b>RK</b><p><strong>Rohan Kumar</strong><small>B.Tech &middot; Fee question</small></p><button type="button">Reply</button></div>
            <div class="lead-row"><b>NM</b><p><strong>Neha Mehta</strong><small>BBA &middot; Documents pending</small></p><button type="button">Nudge</button></div>
          </article>
          <article class="ai-card"><span class="ai-dot">&#10022;</span><p><small>VidyaPulse recommends</small><strong>Follow up with 7 high-intent applicants before 11:30 AM.</strong></p><button type="button">Build my action list <span aria-hidden="true">&#8599;</span></button></article>
        </div>
      </section>
    </div>
  </div>
  <p class="canvas-note">Interactive product concept &middot; choose a role and workspace to explore</p>
</section>

<section class="product-video section" id="product-video">
  <div class="video-heading">
    <div>
      <p class="eyebrow">See the complete product story</p>
      <h2>From first enquiry<br>to final <em>enrolment.</em></h2>
    </div>
    <p>Watch the platform work as one connected admission system&mdash;in a single, uninterrupted view.</p>
  </div>
  <div class="video-frame" id="videoFrame">
    <div class="video-browser-bar"><span><i></i><i></i><i></i></span><strong>ExtraaEdge product tour</strong><small>02:18</small></div>
    <div class="video-screen">
      <div class="video-backdrop">
        <span class="video-kicker">THE ADMISSION GROWTH PLATFORM</span>
        <h3>Every student signal.<br><em>One connected journey.</em></h3>
        <p>CRM &middot; Applications &middot; Communication &middot; VidyaAI &middot; Analytics</p>
      </div>
      <div class="video-demo-ui" aria-hidden="true">
        <aside><span class="brand-mark" aria-hidden="true"><i></i><i></i><i></i></span><i>&#8961;</i><i>&#9678;</i><i>&#9671;</i><i>&#9651;</i></aside>
        <div>
          <div class="video-ui-head"><span>Good morning, admission team</span><b>&#10022; 12 AI actions ready</b></div>
          <div class="video-ui-grid">
            <article><small>New enquiries</small><strong>248</strong><i></i></article>
            <article><small>Applications moving</small><strong>82%</strong><i></i></article>
            <article class="video-ui-wide"><small>Today&rsquo;s admission momentum</small><div><i style="height:40%"></i><i style="height:55%"></i><i style="height:48%"></i><i style="height:68%"></i><i style="height:62%"></i><i style="height:80%"></i><i style="height:76%"></i><i style="height:92%"></i></div></article>
          </div>
        </div>
      </div>
      <button class="video-play" type="button" aria-label="Play product tour concept"><span>&#9654;</span><span><strong>Play the product film</strong><small>2 min 18 sec</small></span></button>
      <div class="video-progress"><i></i><span id="vidT">00:00</span><span>02:18</span></div>
    </div>
  </div>
  <p class="video-note">Full-frame product-film placement &middot; replace concept animation with the approved product video</p>
</section>

<section class="ai-section section" id="ai">
  <div class="ai-heading">
    <div>
      <p class="eyebrow light">VidyaAI</p>
      <h2>AI that joins the<br><em>admission team.</em></h2>
    </div>
    <p>Not another chatbot. A coordinated set of education-trained agents that engage students, support counsellors and move work forward.</p>
  </div>
  <div class="agent-grid">
    <article class="featured-agent"><span class="agent-number">01</span><div class="agent-symbol">&#10022;</div><small>Voice agent</small><h3>VidyaCall</h3><p>Qualifies, answers and follows up in natural conversations.</p><a href="#demo">Meet the agent <span aria-hidden="true">&#8599;</span></a></article>
    <article><span class="agent-number">02</span><div class="agent-symbol">&#10022;</div><small>Web agent</small><h3>VidyaGPT</h3><p>Turns programme questions into confident next steps, 24&times;7.</p><a href="#demo">Meet the agent <span aria-hidden="true">&#8599;</span></a></article>
    <article><span class="agent-number">03</span><div class="agent-symbol">&#10022;</div><small>WhatsApp agent</small><h3>VidyaWA</h3><p>Keeps every applicant moving in the channel they already use.</p><a href="#demo">Meet the agent <span aria-hidden="true">&#8599;</span></a></article>
    <article><span class="agent-number">04</span><div class="agent-symbol">&#10022;</div><small>Counsellor copilot</small><h3>VidyaPulse</h3><p>Summarises context and recommends the next best action.</p><a href="#demo">Meet the agent <span aria-hidden="true">&#8599;</span></a></article>
  </div>
</section>

<section class="difference section" id="difference">
  <div class="difference-title">
    <p class="eyebrow">The ExtraaEdge difference</p>
    <h2>Enterprise capability.<br><em>Without enterprise complexity.</em></h2>
  </div>
  <div class="difference-grid">
    <article class="difference-large"><span class="big-number">01</span><div><h3>Simple enough to use every day.</h3><p>A focused experience for admission teams&mdash;not a generic CRM that needs a handbook beside it.</p><ul><li>Role-based workspaces</li><li>Fewer clicks to the next action</li><li>Fast counsellor adoption</li></ul></div></article>
    <article class="config-card"><span class="big-number">02</span><h3>Configure without code.</h3><p>Adapt stages, forms, rules and communication as your admission cycle evolves.</p><div class="config-ui"><span>Application stage</span><button type="button">Form submitted</button><button type="button" class="selected">Eligibility verified</button><button type="button">Offer sent</button></div></article>
    <article class="support-card"><span class="big-number">03</span><h3>Support that knows admissions.</h3><p>Work with people who understand your season, processes and pressure&mdash;not a ticket queue.</p><div class="support-people"><i>AS</i><i>RM</i><i>PK</i><span>Implementation + success team</span></div></article>
    <article class="value-card"><span class="big-number">04</span><h3>More value. Less overhead.</h3><p>Get the workflows, automation and intelligence your team needs&mdash;without paying for layers it does not.</p><a href="#demo">Build your plan <span aria-hidden="true">&#8599;</span></a></article>
  </div>
</section>

<section class="proof section">
  <p class="eyebrow">Designed for education, proven in admissions</p>
  <div class="proof-stat"><strong>340<span>+</span></strong><p>education teams have chosen ExtraaEdge to make admissions more connected, measurable and human.</p></div>
  <div class="proof-cards">
    <article><span>Customer outcome</span><h3>&ldquo;Add an approved customer story here&mdash;focused on adoption, conversion or faster operations.&rdquo;</h3><small>Replace with verified customer quote before launch</small></article>
    <article class="proof-orange"><span>What to prove</span><ul><li>Faster response time</li><li>Higher application completion</li><li>Quicker team adoption</li><li>Lower operating effort</li></ul></article>
  </div>
</section>

<section class="resources section" id="resources">
  <div class="resource-head">
    <div>
      <p class="eyebrow">Ideas for admission leaders</p>
      <h2>Practical thinking.<br><em>Ready for Monday.</em></h2>
    </div>
    <a href="#demo">Visit resources <span aria-hidden="true">&#8599;</span></a>
  </div>
  <div class="resource-grid">
    <article><div class="resource-art art-one"><span>2027</span><i>Admissions<br>benchmark</i></div><small>REPORT</small><h3>The modern admission team benchmark</h3><a href="#demo">Read report <span aria-hidden="true">&#8599;</span></a></article>
    <article><div class="resource-art art-two"><span>AI</span><i>Human<br>advantage</i></div><small>PLAYBOOK</small><h3>Where AI should&mdash;and should not&mdash;work in admissions</h3><a href="#demo">Get the playbook <span aria-hidden="true">&#8599;</span></a></article>
    <article><div class="resource-art art-three"><span>&#8599;</span><i>Growth<br>stories</i></div><small>CUSTOMER STORY</small><h3>How education teams turn process into momentum</h3><a href="#demo">Explore stories <span aria-hidden="true">&#8599;</span></a></article>
  </div>
</section>

<section class="final-cta" id="demo">
  <div class="cta-sun">&#10022;</div>
  <p class="eyebrow">Your next admission cycle can work better</p>
  <h2>Ready to turn<br>enquiries into <em>momentum?</em></h2>
  <p>See how ExtraaEdge can fit your process, your team and your growth goals.</p>
  <a class="button button-dark" href="mailto:hello@extraaedge.com">Book a personalised demo <span aria-hidden="true">&#8599;</span></a>
</section>

<footer>
  <div class="footer-top">
    <a href="#top" class="brand footer-brand"><span class="brand-mark" aria-hidden="true"><i></i><i></i><i></i></span><strong>extraaedge</strong></a>
    <p>The Admission Growth Platform<br>built for education.</p>
  </div>
  <div class="footer-links">
    <div><strong>Platform</strong><a href="#platform">Admission CRM</a><a href="#platform">Application platform</a><a href="#ai">VidyaAI</a><a href="#platform">Analytics</a></div>
    <div><strong>Solutions</strong><a href="#difference">Higher education</a><a href="#difference">Schools</a><a href="#difference">Online programmes</a><a href="#difference">Study abroad</a></div>
    <div><strong>Company</strong><a href="#resources">About</a><a href="#resources">Customers</a><a href="#resources">Resources</a><a href="#demo">Contact</a></div>
    <div><strong>Compare</strong><a href="#difference">ExtraaEdge vs Meritto</a><a href="#difference">ExtraaEdge vs LeadSquared</a><a href="#difference">Why switch</a></div>
  </div>
  <div class="footer-bottom"><span>&copy; 2026 ExtraaEdge. Homepage concept for design review.</span><span>Privacy &middot; Terms &middot; Security</span></div>
</footer>

</main>

<script>
(function(){
  /* mobile menu */
  var mb=document.querySelector('.menu-button'), nav=document.getElementById('mainNav');
  if(mb&&nav){
    mb.addEventListener('click',function(){
      var open=nav.classList.toggle('open');
      mb.setAttribute('aria-expanded',open?'true':'false');
    });
    nav.addEventListener('click',function(e){ if(e.target.closest('a')){ nav.classList.remove('open'); mb.setAttribute('aria-expanded','false'); } });
  }

  /* role tabs */
  var roleBtns=[].slice.call(document.querySelectorAll('.role-tabs button'));
  var canvasRole=document.getElementById('canvasRole');
  roleBtns.forEach(function(b){
    b.addEventListener('click',function(){
      roleBtns.forEach(function(x){ x.classList.toggle('active',x===b); x.setAttribute('aria-selected',x===b?'true':'false'); });
      if(canvasRole) canvasRole.textContent=b.getAttribute('data-for');
    });
  });

  /* workspace tabs */
  var wsBtns=[].slice.call(document.querySelectorAll('.workspace-switcher button'));
  var canvasWs=document.getElementById('canvasWs');
  wsBtns.forEach(function(b){
    b.addEventListener('click',function(){
      wsBtns.forEach(function(x){ x.classList.toggle('active',x===b); x.setAttribute('aria-selected',x===b?'true':'false'); });
      if(canvasWs) canvasWs.textContent=b.textContent;
    });
  });

  /* product-film placeholder: play button starts the concept progress */
  var frame=document.getElementById('videoFrame'), play=frame&&frame.querySelector('.video-play'), t=document.getElementById('vidT');
  if(play){
    play.addEventListener('click',function(){
      frame.classList.add('playing');
      var s=0, total=138;
      var iv=setInterval(function(){
        s++; if(s>total){ clearInterval(iv); frame.classList.remove('playing'); if(t) t.textContent='00:00'; return; }
        if(t) t.textContent='0'+Math.floor(s/60)+':'+String(s%60).padStart(2,'0');
      },1000);
    });
  }
})();
</script>
<?php wp_footer(); ?>
</body>
</html>
