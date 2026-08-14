<?php
/**
 * Front Page - ExtraaEdge Orange Homepage Concept (exact port).
 *
 * 1:1 port of https://extraaedge-orange-homepage.sushilm47608.chatgpt.site/ -
 * the prototype's own stylesheet (supplied by the owner) and its markup are
 * reproduced verbatim. One fix: the stylesheet carried a stale #afbed0 hero
 * background; the deployed site and the approved screenshots show the hero
 * on brand orange, so .hero uses var(--orange).
 *
 * Standalone template (the concept ships its own header/footer);
 * wp_head()/wp_footer() keep WordPress plumbing intact.
 *
 * @package ExtraaEdge
 */
if (!defined('ABSPATH')) exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
<style id="ee-orange-exact">
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
/* ── base reset (from the prototype's tailwind layer, essentials) ── */
*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}
html{-webkit-text-size-adjust:100%;tab-size:4;line-height:1.5;-webkit-tap-highlight-color:transparent}
h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}
b,strong{font-weight:bolder}
small{font-size:80%}
ol,ul,menu{list-style:none}
img,svg,video,canvas,audio,iframe,embed,object{vertical-align:middle;display:block}
img,video{max-width:100%;height:auto}
button,input,select,optgroup,textarea{font:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}
::placeholder{opacity:1}
[hidden]:where(:not([hidden=until-found])){display:none!important}
.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}

:root{--orange:#ff5a1f;--orange-soft:#ffe6d6;--cream:#f4efe6;--paper:#fbf8f3;--ink:#15130f;--navy:#101d33;--line:#15130f14;--line-2:#15130f22;--muted:#78716a}
*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{background:var(--paper);color:var(--ink);margin:0;font-family:'Inter',Arial,Helvetica,sans-serif;-webkit-font-smoothing:antialiased}
a{color:inherit;text-decoration:none}
button{font:inherit}
main{overflow:hidden}

/* ── header ── */
.site-header{border-bottom:1px solid var(--line);z-index:30;background:#fbf8f3cc;-webkit-backdrop-filter:blur(14px);backdrop-filter:blur(14px);align-items:center;gap:34px;height:84px;padding:0 4.6vw;display:flex;position:sticky;top:0}
.brand{letter-spacing:-.02em;align-items:center;gap:10px;font-size:20px;font-weight:700;display:flex}
.brand-mark{grid-template-columns:repeat(3,1fr);align-items:end;gap:2px;width:24px;height:24px;display:grid;opacity:.92}
.brand-mark i{background:var(--orange);border-radius:5px 5px 1px 1px;display:block}
.brand-mark i:first-child{height:10px}
.brand-mark i:nth-child(2){height:18px}
.brand-mark i:nth-child(3){height:25px}
.site-header nav{gap:36px;margin:auto;font-size:13.5px;font-weight:600;letter-spacing:.01em;display:flex}
.site-header nav a{position:relative;padding:4px 0;transition:color .25s ease}
.site-header nav a:after{content:"";position:absolute;left:0;right:100%;bottom:0;height:1px;background:var(--orange);transition:right .3s ease}
.site-header nav a:hover{color:var(--orange)}
.site-header nav a:hover:after{right:0}
.header-cta{color:var(--ink);border:1px solid var(--line-2);border-radius:99px;gap:12px;padding:11px 20px;font-size:13px;font-weight:700;display:flex;transition:border-color .25s ease,color .25s ease}
.header-cta:hover{color:var(--orange);border-color:var(--orange)}
.menu-button{display:none}

/* ── hero ── */
.hero{border-bottom:1px solid var(--line);background:var(--paper);isolation:isolate;grid-template-columns:minmax(430px,.9fr) minmax(500px,1.1fr);align-items:center;gap:clamp(24px,4vw,76px);min-height:calc(100svh - 84px);padding:0 4.6vw;display:grid;position:relative}
.hero:before{content:"";z-index:-1;border:1px solid var(--line-2);border-radius:50%;width:46vw;max-width:680px;height:46vw;max-height:680px;position:absolute;top:50%;right:-10vw;transform:translateY(-50%)}
.hero-copy{z-index:6;padding:60px 0;position:relative}
.kicker,.eyebrow{text-transform:uppercase;letter-spacing:.14em;color:var(--muted);align-items:center;gap:9px;font-size:11px;font-weight:700;display:flex}
.kicker span{color:var(--orange);font-size:16px}
.hero h1{letter-spacing:-.03em;max-width:760px;margin:26px 0 32px;font-size:clamp(52px,6.4vw,102px);font-weight:800;line-height:.98;color:var(--ink)}
h1 em,h2 em{color:var(--orange);font-family:Georgia,'Times New Roman',serif;font-weight:400;font-style:italic}
.hero h1 em{color:var(--orange)}
.hero-sub{color:var(--muted);max-width:540px;font-size:18px;line-height:1.65;font-weight:400}
.hero-actions{align-items:center;gap:30px;margin:38px 0;display:flex;flex-wrap:wrap}
.button{border-radius:99px;justify-content:center;align-items:center;gap:14px;min-width:0;padding:16px 26px;font-size:14px;font-weight:700;display:inline-flex;transition:transform .3s ease,box-shadow .3s ease}
.button-dark{background:var(--ink);color:#fff}
.button-dark:hover{background:var(--orange);transform:translateY(-1px)}
.text-link{border-bottom:1px solid var(--line-2);padding:8px 0;font-size:14px;font-weight:700;transition:border-color .25s ease,color .25s ease}
.text-link:hover{border-color:var(--orange);color:var(--orange)}
.text-link span{margin-left:10px}
.micro-proof{color:var(--muted);margin-top:40px;font-size:13px;letter-spacing:.01em}
.micro-proof b{color:var(--ink)}

.hero-visual{place-items:center;min-height:min(680px,100svh - 84px);display:grid;position:relative;overflow:visible}
.hero-visual:after{content:"";background-image:radial-gradient(var(--line-2) 1px,transparent 1px);background-size:34px 34px;position:absolute;inset:8% -4% 8% 0;-webkit-mask-image:radial-gradient(circle at 62% 50%,#000 0,#000 46%,transparent 72%);mask-image:radial-gradient(circle at 62% 50%,#000 0,#000 46%,transparent 72%)}
.orbit{z-index:1;border:1px solid var(--line-2);border-radius:50%;position:absolute}
.orbit-one{width:660px;height:660px}
.orbit-two{width:460px;height:460px}
.hero-product{background:#fff;border-radius:22px;z-index:3;width:min(86%,660px);position:relative;box-shadow:0 60px 100px -40px #15130f38,0 2px 0 #15130f0d}
.hero-product-head{background:var(--ink);color:#fff;justify-content:space-between;align-items:center;height:52px;padding:0 20px;border-radius:22px 22px 0 0;font-size:12px;display:flex}
.hero-product-head>span{align-items:center;gap:9px;font-weight:700;display:flex}
.hero-product-head .brand-mark{width:14px;height:14px}
.hero-product-head .brand-mark i:first-child{height:5px}
.hero-product-head .brand-mark i:nth-child(2){height:9px}
.hero-product-head .brand-mark i:nth-child(3){height:13px}
.hero-product-head small{color:#8fd98a;font-size:9px}
.hero-product-line{border-bottom:1px solid var(--line);align-items:center;gap:12px;padding:22px 20px;display:flex}
.hero-product-line>b{background:var(--orange-soft);color:var(--orange);font-weight:800;border-radius:50%;place-items:center;width:40px;height:40px;font-size:11px;display:grid}
.hero-product-line p{flex:1;margin:0}
.hero-product-line p strong,.hero-product-line p small{display:block}
.hero-product-line p small{color:var(--muted);margin-top:5px;font-size:11px}
.intent{text-transform:uppercase;letter-spacing:.04em;color:#2f7a2c;background:#e6f6e2;border-radius:99px;padding:6px 10px;font-size:9px;font-weight:800}
.hero-product-summary{border-left:2px solid var(--orange);background:var(--cream);gap:13px;margin:18px 20px;padding:16px;border-radius:0 12px 12px 0;display:flex}
.hero-product-summary>span{color:var(--orange);font-size:17px}
.hero-product-summary p{margin:0}
.hero-product-summary small,.hero-product-summary strong{display:block}
.hero-product-summary small{text-transform:uppercase;letter-spacing:.12em;color:var(--muted);margin-bottom:7px;font-size:9px;font-weight:700}
.hero-product-summary strong{font-size:13px;line-height:1.5;font-weight:600}
.hero-product-actions{gap:9px;padding:4px 20px 22px;display:flex}
.hero-product-actions button{border:1px solid var(--line-2);background:#fff;border-radius:99px;padding:10px 14px;font-size:11px;font-weight:700;transition:border-color .25s ease}
.hero-product-actions button:hover{border-color:var(--orange);color:var(--orange)}
.hero-product-actions .primary-action{background:var(--ink);color:#fff;border-color:var(--ink);margin-left:auto}
.hero-product-actions .primary-action:hover{background:var(--orange);border-color:var(--orange);color:#fff}
.signal-card{border-radius:16px;z-index:5;background:#fff;min-width:132px;padding:15px 17px;position:absolute;box-shadow:0 24px 48px -16px #15130f30}
.signal-card span,.signal-card strong,.signal-card small{display:block}
.signal-card span{text-transform:uppercase;letter-spacing:.1em;color:var(--muted);font-size:8px;font-weight:700}
.signal-card strong{margin:8px 0 2px;font-size:19px;font-weight:800}
.signal-card small{color:var(--muted);font-size:9px}
.signal-one{top:9%;left:-2%}
.signal-two{bottom:12%;right:-2%}
.scribble{z-index:4;color:var(--muted);font-family:Georgia,serif;font-size:18px;font-style:italic;line-height:1;position:absolute;top:6%;right:2%;opacity:.75}
.scribble span{font-size:32px;color:var(--orange)}
.scribble:after{content:"";border-bottom:2px solid var(--orange);border-radius:50%;width:74px;height:9px;display:block;opacity:.6;transform:rotate(-4deg)}

/* ── ticker ── */
.ticker{background:var(--ink);color:#fff;white-space:nowrap;padding:20px 0;overflow:hidden}
.ticker div{align-items:center;gap:36px;width:max-content;margin:auto;display:flex}
.ticker span{color:var(--orange);letter-spacing:.16em;font-size:11px;font-weight:600}
.ticker b{letter-spacing:.1em;font-weight:600;font-size:12px;color:#e8e5df}
.ticker i{color:var(--orange);font-style:normal;opacity:.7}

/* ── section shell / type ── */
.section{padding:clamp(90px,10vw,150px) 4.6vw}
.section-intro{grid-template-columns:1.25fr .75fr;align-items:end;column-gap:8vw;margin-bottom:60px;display:grid}
.section-intro .eyebrow{grid-column:1/-1;margin-bottom:26px}
.section-intro h2{margin:0}
.section-intro>p:last-child{color:var(--muted);margin-bottom:7px;font-size:17px;line-height:1.7;font-weight:400}
h2{letter-spacing:-.03em;margin:0;font-size:clamp(40px,5.2vw,76px);line-height:1.03;font-weight:700;color:var(--ink)}

/* ── journey (attract/engage/convert/enrol) ── */
.journey{background:var(--paper)}
.journey-grid{grid-template-columns:repeat(4,1fr);display:grid}
.journey-grid article{border-left:1px solid var(--line);flex-direction:column;min-height:300px;padding:0 30px;transition:opacity .3s ease;display:flex}
.journey-grid article:first-child{border-left:0}
.journey-grid article>span{color:var(--muted);font-size:11px;font-weight:700;letter-spacing:.04em}
.journey-icon{color:var(--orange);margin:38px 0 26px;font-size:32px}
.journey-grid h3{letter-spacing:-.02em;margin:0 0 14px;font-size:26px;font-weight:700}
.journey-grid p{color:var(--muted);font-size:14.5px;line-height:1.65}
.journey-grid a{border-top:1px solid var(--line);justify-content:space-between;margin-top:auto;padding-top:16px;font-size:12px;font-weight:700;color:var(--ink);transition:color .25s ease;display:flex}
.journey-grid article:hover a,.journey-grid article:hover .journey-icon{color:var(--orange)}
.journey-grid article:hover{opacity:.92}

/* ── roles / product tour ── */
.roles{background:var(--cream)}
.role-header{justify-content:space-between;align-items:end;gap:60px;margin-bottom:52px;display:flex}
.role-header>div:first-child{max-width:820px}
.role-header h2{margin-top:20px;font-size:clamp(38px,4.6vw,64px)}
.role-intro{max-width:660px;color:var(--muted);margin:22px 0 0;font-size:15px;line-height:1.7}
.role-tabs{background:#fff;border-radius:99px;padding:5px;display:flex;box-shadow:0 1px 0 var(--line-2) inset}
.role-tabs button{cursor:pointer;background:0 0;border:0;border-radius:99px;color:var(--muted);padding:11px 18px;font-size:12px;font-weight:700;transition:background .25s ease,color .25s ease}
.role-tabs button.active{background:var(--ink);color:#fff}
.product-shell{border-radius:24px;background:#fff;box-shadow:0 60px 120px -40px #15130f2e;min-height:600px;overflow:hidden}
.product-topbar{border-bottom:1px solid var(--line);background:#fff;align-items:center;gap:40px;height:62px;padding:0 26px;display:flex}
.mini-brand{align-items:center;gap:7px;font-size:12px;font-weight:600;display:flex}
.mini-brand .brand-mark{width:16px;height:16px}
.mini-brand .brand-mark i:first-child{height:7px}
.mini-brand .brand-mark i:nth-child(2){height:12px}
.mini-brand .brand-mark i:nth-child(3){height:16px}
.product-search{color:var(--muted);background:var(--cream);border-radius:99px;flex:1;max-width:420px;padding:11px 16px;font-size:11px}
.avatar{background:var(--navy);color:#fff;border-radius:50%;place-items:center;width:30px;height:30px;margin-left:auto;font-size:9px;font-weight:700;display:grid}
.product-body{grid-template-columns:64px 1fr;min-height:540px;display:grid}
.product-nav{background:var(--navy);color:#fff;flex-direction:column;align-items:center;gap:25px;padding-top:26px;display:flex}
.product-nav span{opacity:.5}
.product-nav button{color:#fff;opacity:.5;cursor:pointer;background:0 0;border:0;border-radius:10px;place-items:center;width:34px;height:34px;transition:opacity .25s ease,background .25s ease;display:grid}
.product-nav button:hover{opacity:1}
.product-nav button.nav-active{opacity:1;background:#ffffff1a}
.product-main{min-width:0;padding:36px}
.canvas-heading{justify-content:space-between;align-items:end;gap:28px;display:flex}
.canvas-heading small{letter-spacing:.1em;text-transform:uppercase;color:var(--orange);font-size:9px;font-weight:700}
.canvas-heading h3{letter-spacing:-.02em;max-width:560px;margin:9px 0 0;font-size:26px;font-weight:700}
.workspace-switcher{background:var(--cream);border-radius:99px;flex-shrink:0;padding:4px;display:flex}
.canvas-heading .workspace-switcher button{color:var(--muted);cursor:pointer;background:0 0;border:0;border-radius:99px;padding:10px 14px;font-size:9px;font-weight:700;transition:background .25s ease,color .25s ease}
.canvas-heading .workspace-switcher button.active{background:var(--ink);color:#fff}
.canvas-grid{grid-template-columns:.75fr .75fr 1.5fr;gap:1px;background:var(--line);margin-top:30px;display:grid}
.metric-card,.priority-card,.ai-card{background:#fff;padding:24px}
.metric-card{min-height:170px}
.metric-card>span,.metric-card>strong,.metric-card>small{display:block}
.metric-card>span{text-transform:uppercase;letter-spacing:.1em;color:var(--muted);font-size:9px;font-weight:700}
.metric-card>strong{letter-spacing:-.03em;margin:16px 0 2px;font-size:40px;font-weight:700}
.metric-card>small{color:var(--muted);font-size:9px}
.orange-card{background:#fff}
.orange-card>strong{color:var(--orange)}
.mini-bars,.spark{align-items:end;gap:5px;height:34px;margin-top:14px;display:flex}
.mini-bars i{background:var(--orange-soft);width:10%}
.mini-bars i:first-child{height:30%}
.mini-bars i:nth-child(2){height:52%}
.mini-bars i:nth-child(3){height:45%}
.mini-bars i:nth-child(4){height:72%}
.mini-bars i:nth-child(5){height:60%}
.mini-bars i:nth-child(6){height:84%}
.mini-bars i:nth-child(7){background:var(--orange);height:100%}
.spark i{background:var(--orange);transform-origin:0;width:22%;height:2px}
.spark i:first-child{transform:rotate(-8deg)}
.spark i:nth-child(2){transform:rotate(10deg)}
.spark i:nth-child(3){transform:rotate(-18deg)}
.spark i:nth-child(4){transform:rotate(6deg)}
.priority-card{grid-row:span 2}
.card-title{justify-content:space-between;align-items:center;margin-bottom:16px;display:flex}
.card-title span{color:var(--orange);text-transform:uppercase;letter-spacing:.05em;font-size:8px;font-weight:700}
.lead-row{border-top:1px solid var(--line);align-items:center;gap:12px;padding:16px 0;display:flex}
.lead-row:first-of-type{border-top:0}
.lead-row>b{background:var(--cream);color:var(--ink);border-radius:50%;place-items:center;width:30px;height:30px;font-size:8px;font-weight:700;display:grid}
.lead-row p{flex:1;margin:0}
.lead-row p strong,.lead-row p small{display:block}
.lead-row p strong{font-size:11px;font-weight:600}
.lead-row p small{color:var(--muted);margin-top:4px;font-size:9px}
.lead-row button{border:1px solid var(--line-2);background:0 0;border-radius:99px;padding:7px 10px;font-size:8px;font-weight:700;transition:border-color .25s ease}
.lead-row button:hover{border-color:var(--orange);color:var(--orange)}
.ai-card{background:var(--navy);color:#fff;grid-column:1/3;align-items:center;gap:16px;display:flex}
.ai-dot{background:var(--orange);border-radius:50%;place-items:center;width:34px;height:34px;flex:none;display:grid}
.ai-card p{flex:1;margin:0}
.ai-card p small,.ai-card p strong{display:block}
.ai-card p small{color:#98a6bd;text-transform:uppercase;letter-spacing:.06em;margin-bottom:5px;font-size:9px;font-weight:700}
.ai-card p strong{font-size:12px;font-weight:500}
.ai-card button{color:#fff;background:0 0;border:0;font-size:10px;font-weight:700;white-space:nowrap}
.canvas-note{text-align:right;text-transform:uppercase;letter-spacing:.1em;color:var(--muted);margin-top:22px;font-size:9px}
.explorer-panel{min-height:370px;margin-top:30px}
.explorer-toolbar{background:0 0;border-bottom:1px solid var(--line);align-items:center;gap:16px;height:56px;padding:0 4px;display:flex}
.explorer-toolbar strong{font-size:13px;font-weight:700}
.explorer-toolbar span{color:var(--muted);font-size:9px}
.explorer-toolbar button{background:var(--ink);color:#fff;border-radius:99px;border:0;margin-left:auto;padding:10px 15px;font-size:9px;font-weight:700}
.pipeline-row{grid-template-columns:repeat(4,1fr);gap:1px;background:var(--line);margin:1px 0 12px;display:grid}
.pipeline-row article{background:#fff;grid-template-columns:1fr auto;gap:8px;padding:18px 16px;display:grid}
.pipeline-row article.active{background:var(--cream)}
.pipeline-row article.active strong{color:var(--orange)}
.pipeline-row small{text-transform:uppercase;color:var(--muted);letter-spacing:.04em;font-size:8px;font-weight:700}
.pipeline-row strong{font-size:22px;font-weight:700}
.pipeline-row span{opacity:.6;grid-column:1/-1;font-size:8px}
.lead-table{background:#fff}
.table-head,.table-row{grid-template-columns:1.4fr .7fr .55fr 1fr;align-items:center;padding:0 4px;display:grid}
.table-head{text-transform:uppercase;height:34px;color:var(--muted);letter-spacing:.05em;font-size:8px;font-weight:700}
.table-row{border-top:1px solid var(--line);min-height:56px;font-size:9px}
.table-row>span:first-child{align-items:center;gap:9px;font-weight:700;display:flex}
.table-row>span>b{background:var(--cream);border-radius:50%;place-items:center;width:26px;height:26px;font-size:7px;font-weight:700;display:grid}
.table-row>span:nth-child(3){align-items:center;gap:6px;display:flex}
.table-row i{border-radius:50%;width:6px;height:6px}
.intent-high{background:#3fa23a}
.intent-warm{background:#e79a1f}
.table-row button{border:1px solid var(--line-2);background:0 0;border-radius:99px;justify-self:end;padding:7px 10px;font-size:8px;font-weight:700}
.application-summary{background:var(--navy);color:#fff;border-radius:18px;grid-template-columns:1fr auto;align-items:center;padding:26px 30px;display:grid}
.application-summary small,.application-summary strong{display:block}
.application-summary small{text-transform:uppercase;letter-spacing:.1em;color:#98a6bd;font-size:8px;font-weight:700}
.application-summary strong{letter-spacing:-.03em;color:var(--orange);margin:8px 0 0;font-size:42px;font-weight:700}
.application-summary p{margin:2px 0;color:#c9d2e0;font-size:9px}
.completion-ring{background:conic-gradient(var(--orange) 0 68%,#ffffff26 68%);border-radius:50%;place-items:center;width:74px;height:74px;display:grid;position:relative}
.completion-ring:after{content:"";background:var(--navy);border-radius:50%;position:absolute;inset:9px}
.completion-ring span{z-index:1;font-size:12px;font-weight:800}
.application-board{grid-template-columns:1.1fr .9fr;gap:1px;background:var(--line);margin-top:1px;display:grid}
.application-board>article{background:#fff;padding:22px}
.funnel-line{grid-template-columns:110px 1fr 28px;align-items:center;gap:10px;margin:17px 0;color:var(--muted);font-size:8px;display:grid}
.funnel-line>div{background:var(--cream);border-radius:99px;height:5px}
.funnel-line>div i{background:var(--orange);border-radius:99px;height:100%;display:block}
.application-board>article:last-child>button{border:0;border-top:1px solid var(--line);text-align:left;background:0 0;align-items:center;gap:12px;width:100%;padding:13px 0;display:flex}
.application-board>article:last-child>button:first-of-type{border-top:0}
.application-board>article:last-child>button>i{background:var(--cream);border-radius:50%;place-items:center;width:22px;height:22px;font-size:8px;font-style:normal;display:grid}
.application-board>article:last-child>button span{flex:1;font-size:8px;font-weight:700}
.application-board>article:last-child>button small{color:var(--muted);margin-top:3px;display:block}
.application-board>article:last-child>button b{color:var(--orange);font-size:8px}
.insight-cards{grid-template-columns:.7fr .8fr 1.5fr;gap:1px;background:var(--line);display:grid}
.insight-cards article{background:#fff;min-height:110px;padding:22px}
.insight-cards small,.insight-cards strong,.insight-cards span{display:block}
.insight-cards small{text-transform:uppercase;color:var(--muted);letter-spacing:.04em;font-size:8px;font-weight:700}
.insight-cards strong{letter-spacing:-.02em;margin:14px 0 7px;font-size:22px;font-weight:700}
.insight-cards span{color:#3d8a37;font-size:8px}
.insight-cards .dark-insight{background:var(--navy);color:#fff}
.insight-cards .dark-insight small{color:var(--orange)}
.insight-cards .dark-insight strong{font-size:14px;font-weight:500;line-height:1.45}
.chart-card{background:#fff;margin-top:1px;padding:22px}
.chart-area{border-left:1px solid var(--line);border-bottom:1px solid var(--line);flex-direction:column;justify-content:space-between;height:200px;padding:0 0 7px 7px;display:flex;position:relative}
.chart-area>span{color:var(--muted);font-size:7px}
.chart-bars{align-items:end;gap:3%;display:flex;position:absolute;inset:8px 14px 0 44px}
.chart-bars i{background:var(--orange);border-radius:3px 3px 0 0;flex:1;min-width:8px}
.chart-bars i:nth-child(2n){background:var(--orange-soft)}
.canvas-note{opacity:.8}

/* ── product film ── */
.product-video{background:var(--paper)}
.video-heading{grid-template-columns:1.2fr .8fr;align-items:end;gap:8vw;margin-bottom:52px;display:grid}
.video-heading h2{margin-top:20px;font-size:clamp(38px,4.6vw,68px)}
.video-heading>p{color:var(--muted);max-width:460px;font-size:17px;line-height:1.75}
.video-frame{border-radius:24px;width:100%;box-shadow:0 70px 130px -50px #15130f38;background:var(--ink);overflow:hidden}
.video-browser-bar{background:var(--ink);color:#fff;grid-template-columns:1fr auto 1fr;align-items:center;height:50px;padding:0 20px;display:grid}
.video-browser-bar>span{gap:6px;display:flex}
.video-browser-bar>span i{border:1px solid #ffffff40;border-radius:50%;width:8px;height:8px}
.video-browser-bar>span i:first-child{background:var(--orange);border-color:var(--orange)}
.video-browser-bar strong{font-size:10px;font-weight:600}
.video-browser-bar small{color:#9a958d;justify-self:end;font-size:9px}
.video-screen{aspect-ratio:16/8.45;background:var(--navy);place-items:center;min-height:460px;display:grid;position:relative;overflow:hidden}
.video-screen:before{content:"";background-image:radial-gradient(#ffffff14 1px,transparent 1px);background-size:44px 44px;position:absolute;inset:0}
.video-backdrop{text-align:center;z-index:2;transition:opacity .45s,transform .45s;position:relative}
.video-kicker{letter-spacing:.18em;color:var(--orange);font-size:10px;font-weight:700}
.video-backdrop h3{letter-spacing:-.03em;color:#fff;margin:22px 0;font-size:clamp(42px,6vw,88px);font-weight:700;line-height:.98}
.video-backdrop h3 em{color:var(--orange);font-family:Georgia,serif;font-weight:400;font-style:italic}
.video-backdrop p{letter-spacing:.06em;color:#c9d2e0;font-size:12px;font-weight:600}
.video-play{z-index:5;border-radius:99px;background:#fff;box-shadow:0 24px 48px -16px #00000060;text-align:left;cursor:pointer;grid-template-columns:auto auto;align-items:center;column-gap:12px;padding:10px 20px 10px 10px;display:grid;position:absolute;bottom:11%;left:50%;transform:translate(-50%)}
.video-play>span{background:var(--orange);color:#fff;border-radius:50%;grid-row:1/3;place-items:center;width:38px;height:38px;font-size:12px;display:grid}
.video-play strong{font-size:10px;font-weight:700}
.video-play small{color:var(--muted);font-size:8px}
.video-progress{z-index:5;color:#fff;grid-template-columns:1fr auto auto;align-items:center;gap:10px;font-size:8px;display:grid;position:absolute;bottom:20px;left:26px;right:26px}
.video-progress>i{background:#ffffff33;border-radius:99px;height:3px;position:relative}
.video-progress>i:after{content:"";background:var(--orange);border-radius:99px;width:0;height:100%;display:block}
.video-demo-ui{border-radius:18px;z-index:3;opacity:0;background:#fff;grid-template-columns:64px 1fr;transition:opacity .45s,transform .55s;display:grid;position:absolute;inset:9% 8% 12%;transform:translateY(20px);box-shadow:0 40px 90px -30px #00000050;overflow:hidden}
.video-demo-ui>aside{background:var(--navy);color:#fff;flex-direction:column;align-items:center;gap:28px;padding-top:22px;display:flex}
.video-demo-ui>aside .brand-mark{width:20px;height:20px}
.video-demo-ui>aside>i{opacity:.55;font-style:normal}
.video-demo-ui>div{padding:30px}
.video-ui-head{justify-content:space-between;align-items:center;font-size:16px;font-weight:700;display:flex}
.video-ui-head b{color:var(--orange);background:var(--orange-soft);border-radius:99px;padding:9px 12px;font-size:9px}
.video-ui-grid{grid-template-columns:1fr 1fr;gap:1px;background:var(--line);margin-top:25px;display:grid}
.video-ui-grid article{background:#fff;min-height:118px;padding:20px}
.video-ui-grid small,.video-ui-grid strong{display:block}
.video-ui-grid small{text-transform:uppercase;color:var(--muted);font-size:9px;font-weight:700}
.video-ui-grid strong{margin-top:16px;font-size:34px;font-weight:700}
.video-ui-grid article>i{background:var(--orange-soft);border-radius:99px;width:70%;height:4px;margin-top:12px;display:block}
.video-ui-grid .video-ui-wide{grid-column:1/-1}
.video-ui-wide>div{align-items:end;gap:3%;height:96px;margin-top:10px;display:flex}
.video-ui-wide>div i{background:var(--orange);border-radius:3px 3px 0 0;flex:1}
.video-frame.is-playing .video-backdrop{opacity:0;transform:scale(.96)}
.video-frame.is-playing .video-demo-ui{opacity:1;transform:translateY(0)}
.video-frame.is-playing .video-play{box-shadow:none;padding:8px;bottom:26px;left:auto;right:24px;transform:none}
.video-frame.is-playing .video-play>span{width:26px;height:26px}
.video-frame.is-playing .video-play strong,.video-frame.is-playing .video-play small{display:none}
.video-frame.is-playing .video-progress{right:88px}
.video-frame.is-playing .video-progress>i:after{width:28%;animation:12s linear infinite videoProgress}
.video-note{text-align:right;text-transform:uppercase;letter-spacing:.1em;color:var(--muted);margin:24px 0 0;font-size:9px}

/* ── AI section ── */
.ai-section{background:var(--ink);color:#fff}
.ai-heading{grid-template-columns:1.2fr .8fr;align-items:end;gap:8vw;display:grid}
.ai-heading h2{margin-top:22px;color:#fff}
.ai-heading h2 em{color:var(--orange)}
.ai-heading>p{color:#a9a49b;font-size:17px;line-height:1.75}
.eyebrow.light{color:var(--orange)}
.agent-grid{grid-template-columns:repeat(4,1fr);margin-top:64px;display:grid}
.agent-grid article{border-left:1px solid #ffffff1f;flex-direction:column;min-height:340px;padding:0 28px;display:flex}
.agent-grid article:first-child{border-left:0}
.agent-grid article.featured-agent .agent-symbol,.agent-grid article.featured-agent h3{color:var(--orange)}
.agent-number{color:#8b867e;font-size:9px;font-weight:700}
.featured-agent .agent-number{color:var(--orange)}
.agent-symbol{color:var(--orange);margin:40px 0;font-size:28px}
.agent-grid small{text-transform:uppercase;letter-spacing:.14em;color:#8b867e;font-size:8px;font-weight:700}
.featured-agent small{color:#c9c4bb}
.agent-grid h3{margin:9px 0 13px;font-size:26px;font-weight:700}
.agent-grid p{color:#b0aba2;font-size:13px;line-height:1.65}
.agent-grid a{border-top:1px solid #ffffff1f;justify-content:space-between;color:#fff;margin-top:auto;padding-top:16px;font-size:10px;font-weight:700;display:flex}

/* ── difference ── */
.difference{background:var(--cream)}
.difference-title{margin-bottom:60px}
.difference-title h2{margin-top:22px}
.difference-grid{grid-template-columns:1fr 1fr;gap:22px;display:grid}
.difference-grid article{border-radius:20px;min-height:340px;padding:40px 36px}
.big-number{color:var(--muted);font-size:10px;font-weight:700}
.difference-grid h3{letter-spacing:-.02em;margin:56px 0 16px;font-size:28px;font-weight:700;line-height:1.1}
.difference-grid p{color:var(--muted);max-width:520px;font-size:14.5px;line-height:1.7}
.difference-large{background:var(--navy);color:#fff;grid-column:1/-1;grid-template-columns:.35fr 1.65fr;padding:48px 40px;display:grid}
.difference-large .big-number{color:#98a6bd}
.difference-large h3{color:#fff;margin:44px 0 16px;font-size:44px}
.difference-large p{color:#c9d2e0;font-size:17px}
.difference-large ul{border-top:1px solid #ffffff26;gap:40px;margin-top:30px;padding:26px 0 0;font-size:12px;font-weight:700;color:#fff;list-style:none;display:flex}
.difference-large li:before{content:"\2713";color:var(--orange);margin-right:8px}
.config-card{background:var(--cream)}
.config-ui{background:#fff;border-radius:14px;flex-wrap:wrap;gap:7px;margin-top:30px;padding:16px;display:flex}
.config-ui span{text-transform:uppercase;color:var(--muted);width:100%;font-size:9px;font-weight:700}
.config-ui button{border:1px solid var(--line-2);background:0 0;border-radius:99px;padding:9px 12px;font-size:8px;font-weight:700}
.config-ui button.selected{background:var(--ink);color:#fff;border-color:var(--ink)}
.support-card{background:var(--navy);color:#fff}
.support-card p{color:#c3cfdf}
.support-people{align-items:center;margin-top:42px;display:flex}
.support-people i{background:var(--orange);border:2px solid var(--navy);color:#fff;border-radius:50%;place-items:center;width:34px;height:34px;margin-right:-8px;font-size:9px;font-style:normal;font-weight:700;display:grid}
.support-people span{color:#c3cfdf;margin-left:18px;font-size:9px}
.value-card{background:var(--cream)}
.value-card h3{color:var(--ink)}
.value-card a{border-top:1px solid var(--line-2);justify-content:space-between;margin-top:35px;padding-top:15px;font-size:11px;font-weight:700;display:flex}

/* ── proof ── */
.proof{background:var(--paper)}
.proof-stat{border-bottom:1px solid var(--line);grid-template-columns:1fr 1fr;align-items:center;padding:34px 0 64px;display:grid}
.proof-stat strong{letter-spacing:-.04em;font-weight:700;font-size:clamp(90px,15vw,220px);line-height:.85;color:var(--ink)}
.proof-stat strong span{color:var(--orange)}
.proof-stat p{max-width:520px;color:var(--muted);font-family:Georgia,serif;font-style:italic;font-size:25px;line-height:1.4}
.proof-cards{grid-template-columns:1.3fr .7fr;gap:1px;background:var(--line);margin-top:44px;display:grid}
.proof-cards article{background:var(--paper);min-height:260px;padding:36px 4px}
.proof-cards article>span{text-transform:uppercase;letter-spacing:.12em;color:var(--muted);font-size:9px;font-weight:700}
.proof-cards h3{color:var(--ink);font-family:Georgia,serif;font-size:26px;font-weight:400;font-style:italic;line-height:1.35}
.proof-cards small{color:var(--muted)}
.proof-cards article.proof-orange{background:var(--navy);color:#fff}
.proof-orange ul{margin:44px 0 0;padding:0;list-style:none}
.proof-orange li{border-bottom:1px solid #ffffff26;padding:12px 0;color:#e8ecf3;font-size:18px}

/* ── resources ── */
.resources{background:var(--paper)}
.resource-head{justify-content:space-between;align-items:end;display:flex}
.resource-head h2{margin-top:20px;font-size:clamp(38px,4.6vw,64px)}
.resource-head>a{color:var(--ink);border-bottom:1px solid var(--line-2);gap:12px;padding:10px 0;font-size:12px;font-weight:700;display:flex;transition:border-color .25s ease,color .25s ease}
.resource-head>a:hover{color:var(--orange);border-color:var(--orange)}
.resource-grid{grid-template-columns:repeat(3,1fr);gap:44px;margin-top:52px;display:grid}
.resource-grid article>small{letter-spacing:.12em;color:var(--orange);margin:22px 0 10px;font-size:9px;font-weight:700;display:block}
.resource-grid h3{letter-spacing:-.02em;min-height:78px;font-size:21px;font-weight:700;line-height:1.3;color:var(--ink)}
.resource-grid article>a{border-top:1px solid var(--line);color:var(--ink);justify-content:space-between;padding-top:16px;font-size:10px;font-weight:700;display:flex}
.resource-art{aspect-ratio:1.55;border-radius:18px;padding:24px;position:relative;overflow:hidden}
.resource-art span{letter-spacing:-.04em;font-weight:800;font-size:60px}
.resource-art i{font-family:Georgia,serif;font-style:italic;font-size:20px;line-height:1;position:absolute;bottom:22px;right:22px}
.art-one{background:var(--navy);color:#fff}
.art-one span{color:var(--orange)}
.art-two{background:var(--cream);color:var(--ink)}
.art-two span{color:var(--orange)}
.art-three{background:var(--ink);color:#fff}
.art-three span{color:var(--orange);font-size:96px;line-height:1}

/* ── final cta ── */
.final-cta{text-align:center;background:var(--ink);color:#fff;padding:clamp(90px,12vw,150px) 20px;position:relative;overflow:hidden}
.final-cta .eyebrow{justify-content:center;color:#a9a49b}
.final-cta h2{margin:26px auto 30px;color:#fff;font-size:clamp(52px,7.2vw,102px);line-height:.92}
.final-cta h2 em{color:var(--orange)}
.final-cta>p:not(.eyebrow){max-width:540px;color:#c9c4bb;margin:0 auto 38px;font-size:18px}
.final-cta .button-dark{background:var(--orange);margin:auto}
.final-cta .button-dark:hover{background:#fff;color:var(--ink)}
.cta-sun{color:#ffffff08;font-size:420px;line-height:1;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)}

/* ── footer ── */
footer{background:var(--ink);color:#fff;padding:74px 4.6vw 30px}
.footer-top{border-bottom:1px solid #ffffff1f;justify-content:space-between;padding-bottom:46px;display:flex}
.footer-brand{font-size:26px;font-weight:700}
.footer-top p{text-align:right;color:#a9a49b;margin:0;line-height:1.6}
.footer-links{grid-template-columns:repeat(4,1fr);gap:35px;padding:52px 0;display:grid}
.footer-links div{flex-direction:column;gap:14px;display:flex}
.footer-links strong{color:var(--orange);text-transform:uppercase;letter-spacing:.14em;margin-bottom:6px;font-size:9px;font-weight:700}
.footer-links a{color:#a9a49b;font-size:12.5px;transition:color .25s ease}
.footer-links a:hover{color:#fff}
.footer-bottom{color:#736e66;border-top:1px solid #ffffff1f;justify-content:space-between;padding-top:26px;font-size:9px;display:flex}

/* ── subtle scroll-reveal (classes added at runtime, markup untouched) ── */
.ee-reveal{opacity:0;transform:translateY(26px);transition:opacity .9s cubic-bezier(.16,1,.3,1),transform .9s cubic-bezier(.16,1,.3,1)}
.ee-reveal.ee-in{opacity:1;transform:translateY(0)}

@media (width<=900px){
.site-header{padding:0 20px}
.site-header nav{background:var(--paper);border-bottom:1px solid var(--line);flex-direction:column;padding:24px;display:none;position:absolute;top:84px;left:0;right:0}
.site-header nav.open{display:flex}
.menu-button{background:0 0;border:0;margin-left:auto;font-weight:700;display:block}
.header-cta{display:none}
.hero{grid-template-columns:1fr;gap:0;padding:0 24px}
.hero-copy{padding:56px 0 20px}
.hero h1{max-width:800px;font-size:70px}
.hero-visual{min-height:580px}
.hero-product{width:78%}
.hero:before{width:90vw;height:90vw;top:68%;right:-34vw}
.section{padding:70px 24px}
.section-intro,.ai-heading{grid-template-columns:1fr;gap:25px}
.journey-grid,.agent-grid{grid-template-columns:repeat(2,1fr)}
.journey-grid article:nth-child(2n),.agent-grid article:nth-child(2n){border-left:0}
.role-header{flex-direction:column;align-items:start;gap:30px}
.roles{overflow:hidden}
.product-shell{min-width:0}
.product-body{grid-template-columns:1fr}
.product-nav{flex-direction:row;justify-content:center;gap:22px;height:54px;padding:0}
.product-nav span{display:none}
.product-main{padding:24px}
.canvas-heading{flex-direction:column;align-items:flex-start}
.workspace-switcher{width:100%;overflow:auto}
.workspace-switcher button{white-space:nowrap;flex:1}
.canvas-grid{grid-template-columns:1fr 1fr}
.priority-card{grid-area:auto/1/auto/-1}
.ai-card{grid-column:1/-1}
.explorer-panel{min-height:auto}
.application-board{grid-template-columns:1fr}
.insight-cards{grid-template-columns:1fr 1fr}
.insight-cards .dark-insight{grid-column:1/-1}
.canvas-note{text-align:left}
.video-heading{grid-template-columns:1fr;gap:25px}
.video-screen{min-height:400px}
.video-demo-ui{inset:7% 5% 14%}
.difference-grid{grid-template-columns:1fr}
.difference-large{grid-column:auto;grid-template-columns:1fr}
.difference-large ul{flex-direction:column;gap:13px}
.proof-stat,.proof-cards{grid-template-columns:1fr}
.proof-stat{gap:45px}
.resource-grid{grid-template-columns:1fr}
.resource-grid h3{min-height:0}
.resource-art{aspect-ratio:2.2}
.footer-links{grid-template-columns:repeat(2,1fr)}
}
@media (width<=560px){
.hero h1{font-size:52px}
.hero-sub{font-size:16px}
.hero-actions{flex-direction:column;align-items:flex-start}
.hero-visual{min-height:480px}
.hero-product{width:88%}
.signal-card{transform:scale(.82)}
.signal-one{left:-5%}
.signal-two{bottom:8%;right:-8%}
.scribble,.hero-product-head small,.hero-product-actions button:not(.primary-action){display:none}
h2{font-size:38px}
.journey-grid,.agent-grid{grid-template-columns:1fr}
.journey-grid article,.agent-grid article{border-left:0;border-top:1px solid var(--line);padding:30px 0;min-height:0}
.agent-grid article{border-top:1px solid #ffffff1f}
.journey-grid article:first-child,.agent-grid article:first-child{border-top:0}
.journey-icon{margin:0 0 20px}
.role-tabs{width:100%;overflow:auto}
.role-tabs button{white-space:nowrap;flex:1}
.product-topbar{gap:12px;padding:0 14px}
.product-search{display:none}
.product-main{padding:18px 14px}
.canvas-heading h3{font-size:21px}
.canvas-heading .workspace-switcher button{padding:9px}
.canvas-grid{grid-template-columns:1fr}
.priority-card,.ai-card{grid-column:auto}
.ai-card{flex-wrap:wrap;align-items:flex-start}
.ai-card button{margin-left:50px}
.pipeline-row{grid-template-columns:1fr 1fr}
.table-head{display:none}
.table-row{grid-template-columns:1fr auto;gap:8px;padding:10px 4px}
.table-row>span:nth-child(2),.table-row>span:nth-child(3){display:none}
.application-summary{padding:20px}
.application-summary strong{font-size:36px}
.completion-ring{width:60px;height:60px}
.application-board{grid-template-columns:1fr}
.funnel-line{grid-template-columns:92px 1fr 25px}
.insight-cards{grid-template-columns:1fr}
.insight-cards .dark-insight{grid-column:auto}
.chart-area{height:165px}
.product-video{padding-left:16px;padding-right:16px}
.video-browser-bar{height:42px}
.video-browser-bar strong{font-size:8px}
.video-screen{aspect-ratio:4/5;min-height:500px}
.video-backdrop{padding:20px}
.video-backdrop h3{font-size:44px}
.video-backdrop p{font-size:9px;line-height:1.7}
.video-play{white-space:nowrap;bottom:13%}
.video-demo-ui{grid-template-columns:42px 1fr;inset:6% 4% 13%}
.video-demo-ui>aside{gap:23px}
.video-demo-ui>div{padding:16px}
.video-ui-head{font-size:12px}
.video-ui-head b{display:none}
.video-ui-grid{grid-template-columns:1fr;gap:1px;margin-top:14px}
.video-ui-grid article{min-height:80px;padding:14px}
.video-ui-grid strong{margin-top:9px;font-size:24px}
.video-ui-grid .video-ui-wide{grid-column:auto}
.video-ui-wide>div{height:64px}
.video-note{text-align:left;line-height:1.5}
.difference-grid article{padding:28px 24px}
.difference-large h3{font-size:34px}
.proof-stat strong{font-size:100px}
.proof-stat p{font-size:21px}
.proof-cards h3{font-size:22px}
.resource-art{aspect-ratio:1.5}
.final-cta{padding:80px 20px}
.final-cta h2{font-size:52px}
.footer-top{flex-direction:column;gap:25px}
.footer-top p{text-align:left}
.footer-links{grid-template-columns:1fr 1fr}
.footer-bottom{flex-direction:column;gap:10px}
}
@media (prefers-reduced-motion:no-preference){
.signal-one{animation:6s ease-in-out infinite float}
.signal-two{animation:7s ease-in-out infinite reverse float}
@keyframes float{0%,to{translate:0}50%{translate:0 -12px}}
@keyframes videoProgress{0%{width:0}to{width:100%}}
}
@media (prefers-reduced-motion:reduce){
.ee-reveal{opacity:1;transform:none;transition:none}
}
</style>
</head>
<body <?php body_class('antialiased'); ?>>
<main>
<header class="site-header"><a href="#top" class="brand" aria-label="ExtraaEdge home"><span class="brand-mark" aria-hidden="true"><i></i><i></i><i></i></span><strong>extraaedge</strong></a><button class="menu-button" type="button" aria-label="Toggle menu" aria-expanded="false">Menu</button><nav id="mainNav" class="" aria-label="Main navigation"><a href="#platform">Platform</a><a href="#product-video">Product film</a><a href="#ai">VidyaAI</a><a href="#difference">Why ExtraaEdge</a><a href="#resources">Resources</a></nav><a class="header-cta" href="#demo">Book a demo <span aria-hidden="true">&#8599;</span></a></header>

<section class="hero" id="top">
  <div class="hero-copy">
    <p class="kicker"><span>&#10022;</span> The Admission Growth Platform</p>
    <h1>Turn every enquiry into <em>momentum.</em></h1>
    <p class="hero-sub">One simple, configurable platform to attract, engage and enrol more students&mdash;with AI working alongside your admission team.</p>
    <div class="hero-actions"><a class="button button-dark" href="#demo">See ExtraaEdge in action <span aria-hidden="true">&#8599;</span></a><a class="text-link" href="#platform">Explore the platform <span>&#8595;</span></a></div>
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

<section class="ticker" aria-label="Platform outcomes"><div><span>ONE PLATFORM</span><b>CRM</b><i>&#10022;</i><b>APPLICATIONS</b><i>&#10022;</i><b>COMMUNICATION</b><i>&#10022;</i><b>AI AGENTS</b><i>&#10022;</i><b>ANALYTICS</b></div></section>

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
      <button type="button" role="tab" aria-selected="false" class="" data-for="For counsellors">Counsellor</button>
      <button type="button" role="tab" aria-selected="false" class="" data-for="For marketing teams">Marketing</button>
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
        <button type="button" aria-label="Open Today workspace" class="nav-active" data-ws="Today">&#8961;</button>
        <button type="button" aria-label="Open Leads workspace" class="" data-ws="Leads">&#9678;</button>
        <button type="button" aria-label="Open Applications workspace" class="" data-ws="Applications">&#9671;</button>
        <button type="button" aria-label="Open Insights workspace" class="" data-ws="Insights">&#9651;</button>
        <span>&#9881;</span>
      </aside>
      <section class="product-main">
        <div class="canvas-heading">
          <div>
            <small><span id="canvasRole">For admission leaders</span> &middot; <span id="canvasWs">Today</span></small>
            <h3 id="canvasH3">See where every enrolment stands.</h3>
          </div>
          <div class="workspace-switcher" role="tablist" aria-label="Explore product workspaces">
            <button type="button" role="tab" aria-selected="true" class="active">Today</button>
            <button type="button" role="tab" aria-selected="false" class="">Leads</button>
            <button type="button" role="tab" aria-selected="false" class="">Applications</button>
            <button type="button" role="tab" aria-selected="false" class="">Insights</button>
          </div>
        </div>

        <div class="canvas-grid" id="ws-Today">
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

        <div class="explorer-panel" id="ws-Leads" hidden>
          <div class="explorer-toolbar"><strong>Lead pipeline</strong><span>Live &middot; AI ranked by intent</span><button type="button">+ Add lead</button></div>
          <div class="pipeline-row">
            <article><small>New</small><strong>248</strong><span>this week</span></article>
            <article class="active"><small>Contacted</small><strong>164</strong><span>within 8 minutes</span></article>
            <article><small>Qualified</small><strong>96</strong><span>AI scored</span></article>
            <article><small>Converting</small><strong>41</strong><span>counsellor assigned</span></article>
          </div>
          <div class="lead-table">
            <div class="table-head"><span>Student</span><span>Programme</span><span>Intent</span><span></span></div>
            <div class="table-row"><span><b>AS</b>Aditi Sharma</span><span>MBA</span><span><i class="intent-high"></i>High</span><button type="button">Call now</button></div>
            <div class="table-row"><span><b>RK</b>Rohan Kumar</span><span>B.Tech</span><span><i class="intent-warm"></i>Warm</span><button type="button">Reply</button></div>
            <div class="table-row"><span><b>NM</b>Neha Mehta</span><span>BBA</span><span><i class="intent-warm"></i>Warm</span><button type="button">Nudge</button></div>
            <div class="table-row"><span><b>VJ</b>Vikram Joshi</span><span>MBA</span><span><i class="intent-high"></i>High</span><button type="button">Call now</button></div>
          </div>
        </div>

        <div class="explorer-panel" id="ws-Applications" hidden>
          <div class="application-summary">
            <div><small>Applications in progress</small><strong>1,284</strong><p>68% completion across programmes</p></div>
            <div class="completion-ring"><span>68%</span></div>
          </div>
          <div class="application-board">
            <article>
              <strong>Programme funnel</strong>
              <div class="funnel-line"><span>Form submitted</span><div><i style="width:84%"></i></div><span>84%</span></div>
              <div class="funnel-line"><span>Documents</span><div><i style="width:61%"></i></div><span>61%</span></div>
              <div class="funnel-line"><span>Fee paid</span><div><i style="width:38%"></i></div><span>38%</span></div>
              <div class="funnel-line"><span>Enrolled</span><div><i style="width:27%"></i></div><span>27%</span></div>
            </article>
            <article>
              <strong>Today&rsquo;s queue</strong>
              <button type="button"><i>&#9998;</i><span>Verify documents<small>12 pending today</small></span><b>Open &#8599;</b></button>
              <button type="button"><i>&#8377;</i><span>Fee follow-ups<small>7 payment links sent</small></span><b>Open &#8599;</b></button>
              <button type="button"><i>&#10003;</i><span>Offers to release<small>4 approved this morning</small></span><b>Open &#8599;</b></button>
            </article>
          </div>
        </div>

        <div class="explorer-panel" id="ws-Insights" hidden>
          <div class="insight-cards">
            <article><small>Conversion</small><strong>+38%</strong><span>&#9650; vs last cycle</span></article>
            <article><small>First response</small><strong>2m 40s</strong><span>&#9650; 90% faster</span></article>
            <article class="dark-insight"><small>VidyaPulse insight</small><strong>Weekend enquiries convert 2.1&times; better when they are called before Monday noon.</strong></article>
          </div>
          <div class="chart-card">
            <div class="chart-area">
              <span>240</span><span>120</span><span>0</span>
              <div class="chart-bars"><i style="height:34%"></i><i style="height:48%"></i><i style="height:42%"></i><i style="height:61%"></i><i style="height:55%"></i><i style="height:72%"></i><i style="height:66%"></i><i style="height:84%"></i><i style="height:78%"></i><i style="height:95%"></i></div>
            </div>
          </div>
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
      <button class="video-play" type="button" aria-label="Play product tour concept"><span>&#9654;</span><strong>Play the product film</strong><small>2 min 18 sec</small></button>
      <div class="video-progress"><i></i><span>00:00</span><span>02:18</span></div>
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
    <article class=""><span class="agent-number">02</span><div class="agent-symbol">&#10022;</div><small>Web agent</small><h3>VidyaGPT</h3><p>Turns programme questions into confident next steps, 24&times;7.</p><a href="#demo">Meet the agent <span aria-hidden="true">&#8599;</span></a></article>
    <article class=""><span class="agent-number">03</span><div class="agent-symbol">&#10022;</div><small>WhatsApp agent</small><h3>VidyaWA</h3><p>Keeps every applicant moving in the channel they already use.</p><a href="#demo">Meet the agent <span aria-hidden="true">&#8599;</span></a></article>
    <article class=""><span class="agent-number">04</span><div class="agent-symbol">&#10022;</div><small>Counsellor copilot</small><h3>VidyaPulse</h3><p>Summarises context and recommends the next best action.</p><a href="#demo">Meet the agent <span aria-hidden="true">&#8599;</span></a></article>
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

  /* role tabs: swap the workspace label line */
  var roleBtns=[].slice.call(document.querySelectorAll('.role-tabs button'));
  var canvasRole=document.getElementById('canvasRole');
  roleBtns.forEach(function(b){
    b.addEventListener('click',function(){
      roleBtns.forEach(function(x){ x.classList.toggle('active',x===b); x.setAttribute('aria-selected',x===b?'true':'false'); });
      if(canvasRole) canvasRole.textContent=b.getAttribute('data-for');
    });
  });

  /* workspace switcher + left product nav both drive the same canvases */
  var H3={ Today:'See where every enrolment stands.',
           Leads:'Every lead, ranked by real intent.',
           Applications:'Applications moving to completion.',
           Insights:'Know what is working, live.' };
  var wsBtns=[].slice.call(document.querySelectorAll('.workspace-switcher button'));
  var navBtns=[].slice.call(document.querySelectorAll('.product-nav button'));
  var canvasWs=document.getElementById('canvasWs'), canvasH3=document.getElementById('canvasH3');
  function showWs(name){
    ['Today','Leads','Applications','Insights'].forEach(function(w){
      var el=document.getElementById('ws-'+w);
      if(el) el.hidden = (w!==name);
    });
    wsBtns.forEach(function(x){ var on=x.textContent.trim()===name; x.classList.toggle('active',on); x.setAttribute('aria-selected',on?'true':'false'); });
    navBtns.forEach(function(x){ x.classList.toggle('nav-active', x.getAttribute('data-ws')===name); });
    if(canvasWs) canvasWs.textContent=name;
    if(canvasH3) canvasH3.textContent=H3[name]||H3.Today;
  }
  wsBtns.forEach(function(b){ b.addEventListener('click',function(){ showWs(b.textContent.trim()); }); });
  navBtns.forEach(function(b){ b.addEventListener('click',function(){ showWs(b.getAttribute('data-ws')); }); });

  /* product film: toggle the concept playing state */
  var frame=document.getElementById('videoFrame');
  var play=frame&&frame.querySelector('.video-play');
  if(play){ play.addEventListener('click',function(){ frame.classList.toggle('is-playing'); }); }

  /* subtle scroll-reveal: classes only, no markup/text changes */
  var revealTargets=[].slice.call(document.querySelectorAll(
    '.section-intro, .role-header, .video-heading, .ai-heading, .difference-title, .resource-head, ' +
    '.journey-grid > article, .agent-grid > article, .difference-grid > article, .resource-grid > article, ' +
    '.proof-stat, .proof-cards > article, .hero-product, .product-shell, .video-frame'
  ));
  if('IntersectionObserver' in window && revealTargets.length){
    revealTargets.forEach(function(el){ el.classList.add('ee-reveal'); });
    var io=new IntersectionObserver(function(entries){
      entries.forEach(function(entry){
        if(entry.isIntersecting){ entry.target.classList.add('ee-in'); io.unobserve(entry.target); }
      });
    }, { threshold: 0.14, rootMargin: '0px 0px -8% 0px' });
    revealTargets.forEach(function(el){ io.observe(el); });
  }
})();
</script>
<?php wp_footer(); ?>
</body>
</html>
