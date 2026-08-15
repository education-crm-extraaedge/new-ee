<?php
/**
 * Front Page - premium 2026 AI SaaS redesign, sarvam.ai-inspired, built
 * from the full content of the "final" storytelling homepage (commit
 * cc8ff0a) - every section, product, solution, FAQ, resource, story and
 * industry from that page is reproduced verbatim, laid out in the same
 * design language as the orange homepage concept (fluid type, soft
 * panels, hairline dividers, no boxed/bordered grids).
 *
 * Two pieces stay dynamic/shared exactly as before, since they are used
 * elsewhere on the site: ee_platform_section() (the live product demo,
 * also on /product-tour/ and the [ee_platform] shortcode) and the
 * institute-logo marquee (ee_institute_logos_for()).
 *
 * Standalone template (own header/footer); wp_head()/wp_footer() keep
 * WordPress plumbing intact.
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
<style id="ee-premium">

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Instrument+Serif:ital@0;1&display=swap');
*,:after,:before{box-sizing:border-box;border:0 solid;margin:0;padding:0}
html{-webkit-text-size-adjust:100%;line-height:1.5;scroll-behavior:smooth}
h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}
b,strong{font-weight:bolder}
small{font-size:80%}
ol,ul,menu{list-style:none}
img,svg{vertical-align:middle;display:block;max-width:100%}
button,input{font:inherit;color:inherit;background-color:#0000;border-radius:0}
[hidden]{display:none!important}

:root{--orange:#ff5a1f;--orange-soft:#ffe6d6;--orange-glow:#ff5a1f26;--cream:#f4efe6;--paper:#fbf8f3;--ink:#15130f;--navy:#101d33;--line:#15130f14;--line-2:#15130f22;--muted:#78716a}
body{background:var(--paper);color:var(--ink);margin:0;font-family:'Inter',Arial,Helvetica,sans-serif;-webkit-font-smoothing:antialiased;font-feature-settings:'ss01' 1}
a{color:inherit;text-decoration:none}
main{overflow:hidden}
em{font-family:'Instrument Serif',Georgia,serif;font-weight:400;font-style:italic;color:var(--orange)}
.glow{pointer-events:none;position:absolute;border-radius:50%;filter:blur(80px);z-index:0}

/* header */
.site-header{border-bottom:1px solid var(--line);z-index:60;background:#fbf8f3cc;-webkit-backdrop-filter:blur(14px);backdrop-filter:blur(14px);align-items:center;gap:34px;height:84px;padding:0 4.6vw;display:flex;position:sticky;top:0}
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

/* hero */
.hero{border-bottom:1px solid var(--line);background:var(--paper);isolation:isolate;grid-template-columns:minmax(430px,1fr) minmax(280px,.62fr);align-items:center;gap:clamp(24px,4vw,76px);min-height:calc(100svh - 84px);padding:56px 4.6vw;display:grid;position:relative;overflow:hidden}
.hero:before{content:"";z-index:-1;border:1px solid var(--line-2);border-radius:50%;width:46vw;max-width:680px;height:46vw;max-height:680px;position:absolute;top:50%;right:-14vw;transform:translateY(-50%)}
.hero:after{content:"";z-index:-1;background:radial-gradient(closest-side,var(--orange-glow),transparent 70%);width:60vw;height:60vw;max-width:900px;max-height:900px;position:absolute;top:-18%;right:-16vw;filter:blur(10px)}
.hero-copy{z-index:6;position:relative}
.kicker,.eyebrow{text-transform:uppercase;letter-spacing:.16em;color:var(--muted);align-items:center;gap:9px;font-size:11px;font-weight:700;display:flex}
.kicker span{color:var(--orange);font-size:16px}
.hero h1{letter-spacing:-.035em;max-width:900px;margin:26px 0 30px;font-size:clamp(40px,4.9vw,72px);font-weight:800;line-height:1.06;color:var(--ink);min-height:0}
.hero-sub{color:var(--muted);max-width:640px;font-size:17.5px;line-height:1.68;font-weight:400}
.chips{gap:12px;margin-top:26px;display:flex;flex-wrap:wrap}
.chip{background:#fff;border:1px solid var(--line-2);border-radius:99px;align-items:center;gap:8px;padding:9px 15px;font-size:12px;font-weight:600;color:var(--ink);display:inline-flex;box-shadow:0 8px 20px -14px #15130f4d;transition:border-color .25s ease,box-shadow .25s ease,transform .25s ease}
.chip:hover{border-color:var(--line-2);box-shadow:0 14px 28px -16px #15130f52;transform:translateY(-1px)}
.chip i{font-style:normal;font-size:13px}
.hero-actions{align-items:center;gap:28px;margin:32px 0 30px;display:flex;flex-wrap:wrap}
.button{border-radius:99px;justify-content:center;align-items:center;gap:12px;padding:17px 28px;font-size:14px;font-weight:700;display:inline-flex;transition:transform .35s cubic-bezier(.2,.8,.2,1),background .35s ease,box-shadow .35s ease}
.button-dark{background:var(--ink);color:#fff;box-shadow:0 16px 32px -16px #15130f66}
.button-dark:hover{background:var(--orange);transform:translateY(-2px);box-shadow:0 20px 40px -14px #ff5a1f66}
.text-link{border-bottom:1px solid var(--line-2);padding:8px 0;font-size:14px;font-weight:700;display:inline-flex;align-items:center;gap:8px;transition:border-color .25s ease,color .25s ease}
.text-link:hover{border-color:var(--orange);color:var(--orange)}
.rate{align-items:center;gap:10px;margin-top:6px;display:flex;flex-wrap:wrap}
.rate svg{width:15px;height:15px;fill:var(--orange)}
.rate b{font-size:13px}
.rate span{color:var(--muted);font-size:13px}
.stats{grid-template-columns:repeat(4,auto);gap:clamp(24px,4vw,56px);margin-top:38px;display:grid}
.stat b{letter-spacing:-.03em;font-size:clamp(26px,2.6vw,38px);font-weight:800;display:block}
.stat b em{color:var(--orange);font-family:inherit;font-style:normal;font-size:.55em;font-weight:700;margin-left:1px}
.stat span{color:var(--muted);font-size:11.5px;display:block;margin-top:4px}

.hero-visual{place-items:center;min-height:420px;display:grid;position:relative}
.orbit{z-index:1;border:1px solid var(--line-2);border-radius:50%;position:absolute}
.orbit-one{width:380px;height:380px}
.orbit-two{width:260px;height:260px}
.hero-glyph{color:var(--orange);font-family:'Instrument Serif',Georgia,serif;font-style:italic;font-size:clamp(60px,7.5vw,108px);line-height:1;text-align:center;position:relative;z-index:2;filter:drop-shadow(0 30px 50px #ff5a1f30)}
@media (prefers-reduced-motion:no-preference){
.orbit-one{animation:spin 60s linear infinite}
.orbit-two{animation:spin 44s linear infinite reverse}
@keyframes spin{to{transform:rotate(360deg)}}
}

/* section shell / type */
.section{padding:clamp(80px,9vw,140px) 4.6vw}
.section-intro{grid-template-columns:1.25fr .75fr;align-items:end;column-gap:8vw;margin-bottom:52px;display:grid}
.section-intro .eyebrow{grid-column:1/-1;margin-bottom:22px}
.section-intro h2{margin:0}
.section-intro>p:last-child{color:var(--muted);margin-bottom:7px;font-size:16px;line-height:1.7;font-weight:400}
h2{letter-spacing:-.035em;margin:0;font-size:clamp(34px,4.6vw,64px);line-height:1.04;font-weight:700;color:var(--ink)}
.center-head{text-align:center;max-width:760px;margin:0 auto 50px}
.center-head h2{margin-top:14px}

/* trust / logos */
.trust{background:var(--cream);text-align:center;padding:clamp(60px,8vw,100px) 4.6vw}
.trust .eyebrow{justify-content:center}
.trust h2{margin:16px auto 12px;max-width:820px}
.trust>p{color:var(--muted);max-width:680px;margin:0 auto 22px;font-size:15.5px;line-height:1.65}
.rate{justify-content:center}
.marquee-wrap{margin-top:48px;overflow:hidden;-webkit-mask-image:linear-gradient(90deg,transparent,#000 8%,#000 92%,transparent);mask-image:linear-gradient(90deg,transparent,#000 8%,#000 92%,transparent)}
.marquee-track{align-items:center;gap:64px;width:max-content;display:flex;animation:marquee 42s linear infinite}
.marquee-track.right{animation-direction:reverse;margin-top:34px}
.marquee-track img,.marquee-track b{height:34px;opacity:.5;filter:grayscale(1);transition:opacity .3s ease,filter .3s ease,transform .3s ease}
.marquee-track b{font-size:15px;font-weight:700;font-style:normal;color:var(--muted);opacity:1;filter:none;white-space:nowrap}
.marquee-track img:hover{opacity:1;filter:none;transform:scale(1.06)}
@keyframes marquee{to{transform:translateX(-50%)}}
@media (prefers-reduced-motion:reduce){.marquee-track{animation:none}}
.trust-more{margin-top:34px}
.trust-more a{color:var(--ink);border:1px solid var(--line-2);border-radius:99px;padding:11px 22px;font-size:13px;font-weight:700;display:inline-flex;align-items:center;gap:8px;transition:border-color .25s ease,color .25s ease}
.trust-more a:hover{color:var(--orange);border-color:var(--orange)}

/* kicker rail between story chapters */
.story-kick{border-top:1px solid var(--line);border-bottom:1px solid var(--line);background:var(--cream);align-items:center;gap:18px;padding:18px 4.6vw;font-size:12px;letter-spacing:.01em;display:flex;flex-wrap:wrap}
.story-kick .k-no{color:var(--orange);font-weight:800;font-family:'Instrument Serif',Georgia,serif;font-style:italic;font-size:16px}
.story-kick .k-lb{font-weight:700;text-transform:uppercase;letter-spacing:.08em;font-size:11px}
.story-kick .k-sub{color:var(--muted)}

/* platform demo wrapper */
.platform-wrap{background:var(--cream)}
.platform-wrap .section-intro{margin-bottom:38px}
.platform-shell{border-radius:24px;overflow:hidden;box-shadow:0 70px 140px -50px #15130f40,0 1px 0 #ffffffb0 inset}

/* seven-product story (flowing list, no boxes) */
.s7-wrap{background:var(--paper)}
.s7-list{margin-top:10px}
.s7-row{border-top:1px solid var(--line);grid-template-columns:80px 1fr;gap:28px;padding:48px 0;display:grid;transition:background .3s ease}
.s7-row:first-child{border-top:0}
.s7-n{color:var(--line-2);font-size:34px;font-weight:700;font-family:'Instrument Serif',Georgia,serif;font-style:italic;padding-top:2px;transition:color .3s ease}
.s7-row:hover .s7-n{color:var(--orange-soft)}
.s7-tag{text-transform:uppercase;letter-spacing:.14em;color:var(--orange);font-size:10px;font-weight:800}
.s7-body h3{margin:12px 0 14px;font-size:clamp(22px,2.4vw,32px);font-weight:700;letter-spacing:-.02em}
.s7-body>p{color:var(--muted);max-width:760px;font-size:15.5px;line-height:1.75}
.s7-pills{grid-template-columns:repeat(3,1fr);gap:24px;margin-top:28px;display:grid}
.s7-pill{border-left:2px solid var(--orange-soft);padding-left:16px;transition:border-color .3s ease}
.s7-pill:hover{border-color:var(--orange)}
.s7-pill b{font-size:12.5px;font-weight:700;display:block}
.s7-pill span{color:var(--muted);font-size:12.5px;line-height:1.55;display:block;margin-top:4px}

/* Vidya AI suite (dark, agent-style) */
.vidya-section{background:var(--ink);color:#fff;position:relative;overflow:hidden}
.vidya-section:before{content:"";position:absolute;top:-30%;left:-10%;width:56vw;height:56vw;max-width:820px;max-height:820px;background:radial-gradient(closest-side,var(--orange-glow),transparent 70%);pointer-events:none}
.vidya-section>*{position:relative}
.vidya-section .eyebrow{color:var(--orange)}
.vidya-section h2{color:#fff}
.vidya-section .section-intro>p:last-child{color:#a9a49b}
.vidya-grid{grid-template-columns:repeat(4,1fr);margin-top:56px;display:grid}
.vidya-grid article{border-left:1px solid #ffffff1f;flex-direction:column;min-height:300px;padding:0 26px;transition:transform .35s cubic-bezier(.2,.8,.2,1);display:flex}
.vidya-grid article:hover{transform:translateY(-4px)}
.vidya-grid article:first-child{border-left:0}
.vidya-grid .v-n{color:#8b867e;font-size:9px;font-weight:700}
.vidya-grid .v-sym{color:var(--orange);margin:34px 0;font-size:26px;filter:drop-shadow(0 6px 14px #ff5a1f4d)}
.vidya-grid small{text-transform:uppercase;letter-spacing:.12em;color:#8b867e;font-size:8px;font-weight:700}
.vidya-grid h3{margin:9px 0 12px;font-size:22px;font-weight:700}
.vidya-grid dl{gap:4px 16px;grid-template-columns:auto auto auto;margin-bottom:14px;display:grid;font-size:10px}
.vidya-grid dl dt{color:#8b867e;grid-row:1}
.vidya-grid dl dd{color:#d8d3ca;grid-row:2;font-weight:600}
.vidya-grid p{color:#b0aba2;font-size:13px;line-height:1.6;flex:1}
.vidya-grid a{border-top:1px solid #ffffff1f;justify-content:space-between;color:#fff;margin-top:20px;padding-top:15px;font-size:10px;font-weight:700;display:flex}
.vidya-grid .featured{background:linear-gradient(180deg,#1c1712,var(--ink))}

/* customer stories */
.stories-sec{background:var(--cream)}
.stories-rail{gap:14px;margin-top:44px;padding-bottom:6px;overflow-x:auto;display:flex}
.story-thumb{border:0;border-radius:16px;cursor:pointer;background-size:cover;background-position:center;flex:none;width:190px;height:120px;place-items:center;display:grid;position:relative;opacity:.55;transition:opacity .25s ease,transform .25s ease}
.story-thumb:hover,.story-thumb.is-active{opacity:1;transform:translateY(-3px)}
.story-thumb:after{content:"";position:absolute;inset:0;border-radius:16px;background:linear-gradient(180deg,#00000000,#00000066)}
.story-play{z-index:1;background:#fffffff0;border-radius:50%;width:34px;height:34px;place-items:center;display:grid}
.story-play svg{width:13px;height:13px;fill:var(--ink)}
.story-cap{border-radius:20px;background:#fff;margin-top:30px;padding:40px 44px;box-shadow:0 40px 80px -40px #15130f33,0 1px 0 #ffffffb0 inset}
.story-cap p.q{font-family:'Instrument Serif',Georgia,serif;font-style:italic;font-size:clamp(21px,2.2vw,28px);line-height:1.48;max-width:820px}
.story-cap .who{color:var(--muted);margin-top:16px;font-size:13.5px;font-weight:600}
.story-cap .who b{color:var(--ink)}
.stories-more{margin-top:30px}
.stories-more a{color:var(--ink);border-bottom:1px solid var(--line-2);padding:8px 0;font-size:13px;font-weight:700}

/* mid cta */
.mid-cta{text-align:center;background:var(--ink);color:#fff;padding:clamp(80px,10vw,130px) 20px;position:relative;overflow:hidden}
.mid-cta:before{content:"";position:absolute;top:-40%;left:50%;transform:translateX(-50%);width:70vw;height:70vw;max-width:1000px;max-height:1000px;background:radial-gradient(closest-side,var(--orange-glow),transparent 70%);pointer-events:none}
.mid-cta>*{position:relative}
.mid-cta h2{color:#fff;margin:0 auto 20px;max-width:760px}
.mid-cta p{color:#c9c4bb;max-width:600px;margin:0 auto 34px;font-size:16px;line-height:1.6}
.mid-cta .row{justify-content:center;align-items:center;gap:26px;display:flex;flex-wrap:wrap}
.mid-cta .go{background:var(--orange);color:#fff;border-radius:99px;padding:16px 28px;font-size:14px;font-weight:700;box-shadow:0 20px 40px -16px #ff5a1f66;transition:transform .3s cubic-bezier(.2,.8,.2,1),box-shadow .3s ease}
.mid-cta .go:hover{transform:translateY(-2px);box-shadow:0 24px 48px -14px #ff5a1f80}
.mid-cta .alt{color:#c9c4bb;border-bottom:1px solid #ffffff33;padding:8px 0;font-size:14px;font-weight:600}
.mid-cta .fine{color:#807a70;margin-top:26px;font-size:12px}

/* industries (flowing rows) */
.ind-sec{background:var(--paper)}
.ind-list{margin-top:10px}
.ind-row{border-top:1px solid var(--line);align-items:baseline;gap:24px;padding:30px 18px;margin:0 -18px;border-radius:14px;display:grid;grid-template-columns:52px 1fr 1fr 24px;transition:background .3s ease,box-shadow .3s ease}
.ind-row:first-child{border-top:1px solid var(--line)}
.ind-row:hover{background:#fff;box-shadow:0 20px 40px -28px #15130f4d}
.ind-row:hover .ind-go{transform:translateX(4px)}
.ind-row:hover .ind-t{color:var(--orange)}
.ind-n{color:var(--line-2);font-size:24px;font-weight:700;font-family:'Instrument Serif',Georgia,serif;font-style:italic}
.ind-t{font-size:19px;font-weight:700;letter-spacing:-.01em;transition:color .25s ease}
.ind-d{color:var(--muted);font-size:14px}
.ind-go{color:var(--orange);width:18px;height:18px;transition:transform .3s cubic-bezier(.2,.8,.2,1)}
.ind-go svg{width:100%;height:100%}
@media (width<=760px){.ind-row{grid-template-columns:32px 1fr 20px}.ind-d{grid-column:2/3;margin-top:4px}}

/* integrations wall */
.integrations-sec{background:var(--cream)}
.integrations-sec .center-head{margin-bottom:44px}
.ilogo-wall{grid-template-columns:repeat(6,1fr);gap:1px;background:var(--line);margin-top:10px;display:grid}
.ilogo-cell{background:var(--cream);place-items:center;height:96px;padding:20px;display:grid}
.ilogo-cell img{max-height:32px;max-width:100%;opacity:.7;filter:grayscale(1);transition:opacity .25s ease,filter .25s ease}
.ilogo-cell:hover img{opacity:1;filter:none}
.integ-cta{text-align:center;margin-top:40px}
.integ-cta a{color:var(--ink);border:1px solid var(--line-2);border-radius:99px;padding:12px 24px;font-size:13px;font-weight:700;display:inline-flex;align-items:center;gap:8px;transition:border-color .25s ease,color .25s ease}
.integ-cta a:hover{color:var(--orange);border-color:var(--orange)}
@media (width<=760px){.ilogo-wall{grid-template-columns:repeat(3,1fr)}}

/* security */
.security-sec{background:var(--navy);color:#fff;position:relative;overflow:hidden}
.security-sec:before{content:"";position:absolute;bottom:-40%;right:-10%;width:50vw;height:50vw;max-width:700px;max-height:700px;background:radial-gradient(closest-side,#ff5a1f1a,transparent 70%);pointer-events:none}
.security-sec>*{position:relative}
.security-sec .center-head h2{color:#fff}
.sec-grid{grid-template-columns:repeat(4,1fr);gap:1px;background:#ffffff1a;margin-top:10px;display:grid}
.sec-item{background:var(--navy);text-align:center;padding:38px 22px;transition:background .3s ease;display:flex;flex-direction:column;align-items:center}
.sec-item:hover{background:#152744}
.sec-item img{height:38px;margin-bottom:18px;filter:brightness(0) invert(1);opacity:.85}
.sec-item b{font-size:14.5px;font-weight:700;margin-bottom:8px}
.sec-item span{color:#a9b4c6;font-size:12.5px;line-height:1.5}
@media (width<=760px){.sec-grid{grid-template-columns:1fr 1fr}}

/* FAQ accordion */
.faq-sec{background:var(--paper)}
.faq-list{margin-top:10px}
.faq-row{border-top:1px solid var(--line)}
.faq-row:first-child{border-top:0}
.faq-q{width:100%;background:0 0;border:0;cursor:pointer;text-align:left;justify-content:space-between;align-items:center;gap:20px;padding:26px 4px;font-size:16.5px;font-weight:600;transition:color .25s ease;display:flex}
.faq-q:hover{color:var(--orange)}
.faq-ic{color:var(--orange);flex:none;font-size:22px;font-weight:400;transition:transform .35s cubic-bezier(.2,.8,.2,1)}
.faq-row[data-open="1"] .faq-ic{transform:rotate(45deg)}
.faq-a{max-height:0;overflow:hidden;transition:max-height .35s ease}
.faq-a p{color:var(--muted);max-width:760px;padding-bottom:24px;font-size:14.5px;line-height:1.7}

/* tabbed list (products + solutions share this) */
.tab-bar{gap:10px;margin-top:6px;flex-wrap:wrap;display:flex}
.tab-btn{cursor:pointer;background:#fff;border:1px solid var(--line-2);border-radius:99px;color:var(--muted);padding:11px 18px;font-size:12.5px;font-weight:700;transition:background .3s ease,color .3s ease,border-color .3s ease,box-shadow .3s ease,transform .3s ease;display:inline-flex;align-items:center;gap:6px}
.tab-btn:hover{border-color:var(--orange);color:var(--ink)}
.tab-btn i{font-style:normal;opacity:.6;font-size:11px}
.tab-btn.on{background:var(--ink);color:#fff;border-color:var(--ink);box-shadow:0 14px 26px -16px #15130f66;transform:translateY(-1px)}
.tab-btn.on:hover{color:#fff}
.tab-btn.on i{opacity:1}
.tl-list{margin-top:12px}
.tl-row{border-top:1px solid var(--line);align-items:center;gap:20px;padding:22px 18px;margin:0 -18px;border-radius:14px;display:flex;transition:background .3s ease,box-shadow .3s ease}
.tl-row:hover{background:#fff;box-shadow:0 20px 40px -28px #15130f4d}
.tl-row:hover .tl-t b{color:var(--orange)}
.tl-row:hover .tl-go{transform:translateX(4px)}
.tl-chk{color:var(--orange);flex:none;width:18px;height:18px}
.tl-chk svg{width:100%;height:100%}
.tl-t{flex:0 0 300px}
.tl-t b{font-size:15px;font-weight:700;display:block;transition:color .25s ease}
.tl-t small{color:var(--muted);font-size:12px}
.tl-d{color:var(--muted);flex:1;font-size:13.5px}
.tl-go{color:var(--orange);flex:none;width:16px;height:16px;margin-left:auto;transition:transform .3s cubic-bezier(.2,.8,.2,1)}
.tl-go svg{width:100%;height:100%}
.tab-foot{color:var(--muted);border-top:1px solid var(--line);margin-top:8px;padding-top:26px;font-size:14px}
.tab-foot a{color:var(--ink);border-bottom:1px solid var(--line-2);font-weight:700}
@media (width<=760px){.tl-row{flex-wrap:wrap}.tl-t{flex-basis:100%}}

/* resources / blog (shared card look) */
.res-sec{background:var(--cream)}
.blog-sec{background:var(--paper)}
.res-grid,.blog-grid{grid-template-columns:repeat(3,1fr);gap:40px;margin-top:44px;display:grid}
.res-card,.blog-card{display:flex;flex-direction:column}
.res-card small{letter-spacing:.12em;color:var(--orange);font-size:9px;font-weight:800}
.res-card h3{margin:12px 0 8px;font-size:19px;font-weight:700;letter-spacing:-.01em}
.res-card p{color:var(--muted);font-size:13.5px;line-height:1.6;flex:1}
.res-link,.res-card .res-link{border-top:1px solid var(--line);color:var(--ink);justify-content:space-between;margin-top:18px;padding-top:14px;font-size:11px;font-weight:700;display:flex;align-items:center}
.res-link svg{width:14px;height:14px}
.blog-card{border-radius:18px;background:#fff;overflow:hidden;box-shadow:0 30px 70px -36px #15130f30;transition:transform .35s cubic-bezier(.2,.8,.2,1),box-shadow .35s ease}
.blog-card:hover{transform:translateY(-5px);box-shadow:0 40px 90px -34px #15130f40}
.blog-img{aspect-ratio:16/10;background:var(--cream);overflow:hidden}
.blog-img img{width:100%;height:100%;object-fit:cover}
.blog-ph{width:100%;height:100%;background:var(--navy);color:var(--orange);place-items:center;font-size:44px;font-weight:800;display:grid}
.blog-body{padding:22px}
.blog-meta{color:var(--muted);gap:10px;margin-bottom:10px;font-size:11px;display:flex}
.blog-meta .cat{color:var(--orange);font-weight:700}
.blog-body h3{font-size:18px;font-weight:700;line-height:1.3;margin-bottom:8px}
.blog-body p{color:var(--muted);font-size:13px;line-height:1.6}
.blog-body .rd{color:var(--ink);border-top:1px solid var(--line);margin-top:16px;padding-top:14px;font-size:11px;font-weight:700;display:flex;justify-content:space-between}
@media (width<=900px){.res-grid,.blog-grid{grid-template-columns:1fr 1fr}}
@media (width<=600px){.res-grid,.blog-grid{grid-template-columns:1fr}}

/* final cta */
.final-cta{text-align:center;background:var(--orange);color:#fff;padding:clamp(80px,10vw,130px) 20px;position:relative;overflow:hidden}
.final-cta .eyebrow{justify-content:center;color:#ffffffb0}
.final-cta h2{margin:22px auto 24px;color:#fff;max-width:760px}
.final-cta p{max-width:560px;margin:0 auto 32px;font-size:16px}
.final-cta .button-dark{background:var(--ink)}
.final-cta .button-dark:hover{background:#000}

/* footer */
footer{background:var(--ink);color:#fff;padding:70px 4.6vw 28px;position:relative;overflow:hidden}
footer:before{content:"";position:absolute;top:-50%;left:-10%;width:44vw;height:44vw;max-width:600px;max-height:600px;background:radial-gradient(closest-side,#ff5a1f14,transparent 70%);pointer-events:none}
footer>*{position:relative}
.footer-top{border-bottom:1px solid #ffffff2e;justify-content:space-between;padding-bottom:42px;display:flex}
.footer-brand{font-size:26px;font-weight:700}
.footer-top p{text-align:right;color:#a9a49b;margin:0;line-height:1.5;font-size:13.5px}
.footer-links{grid-template-columns:repeat(4,1fr);gap:35px;padding:48px 0;display:grid}
.footer-links div{flex-direction:column;gap:13px;display:flex}
.footer-links strong{color:var(--orange);text-transform:uppercase;letter-spacing:.14em;margin-bottom:6px;font-size:9px;font-weight:700}
.footer-links a{color:#a9a49b;font-size:12.5px;transition:color .25s ease}
.footer-links a:hover{color:#fff}
.footer-bottom{color:#736e66;border-top:1px solid #ffffff2e;justify-content:space-between;padding-top:24px;font-size:9px;display:flex;flex-wrap:wrap;gap:10px}
@media (width<=760px){.footer-links{grid-template-columns:1fr 1fr}.footer-top{flex-direction:column;gap:22px}.footer-top p{text-align:left}}

/* demo drawer */
.eedd-backdrop{position:fixed;inset:0;background:#0a1428a3;opacity:0;visibility:hidden;transition:opacity .28s ease,visibility .28s ease;z-index:99996}
.eedd-backdrop.open{opacity:1;visibility:visible}
.ee-demo-drawer{position:fixed;top:0;right:0;bottom:0;width:min(440px,100vw);background:var(--paper);z-index:99997;transform:translateX(105%);transition:transform .38s cubic-bezier(.3,.8,.3,1);display:flex;flex-direction:column;box-shadow:-28px 0 70px #0f204030}
.ee-demo-drawer.open{transform:none}
.eedd-head{align-items:center;justify-content:space-between;gap:12px;padding:20px 22px;background:var(--ink);color:#fff;display:flex}
.eedd-head b{font-size:16px;font-weight:800;display:block}
.eedd-head small{color:#a9a49b;font-size:11px;font-weight:600;display:block;margin-top:3px}
.eedd-x{flex:none;width:34px;height:34px;border-radius:50%;border:0;background:#ffffff24;color:#fff;font-size:16px;cursor:pointer}
.eedd-x:hover{background:#ffffff40}
.eedd-body{flex:1;overflow-y:auto;padding:22px}
.secure-label{text-align:center;color:var(--muted);margin-top:16px;font-size:10px;font-weight:600;letter-spacing:.06em;text-transform:uppercase}

/* sticky mobile pill */
#ee-stickcta{display:none}
@media (width<=760px){
#ee-stickcta{position:fixed;left:16px;right:16px;bottom:16px;z-index:9990;background:var(--ink);border-radius:99px;align-items:center;justify-content:space-between;padding:6px 8px 6px 20px;box-shadow:0 20px 50px -18px #00000060;display:flex}
#ee-stickcta .go{color:#fff;background:var(--orange);border-radius:99px;padding:12px 18px;font-size:13px;font-weight:700;align-items:center;gap:8px;display:flex}
#ee-stickcta .off{color:#a9a49b;background:0 0;border:0;width:30px;height:30px;font-size:14px}
}

/* mobile nav / hero responsive */
@media (width<=900px){
.site-header{padding:0 20px}
.site-header nav{background:var(--paper);border-bottom:1px solid var(--line);flex-direction:column;align-items:flex-start;gap:18px;padding:24px;display:none;position:absolute;top:84px;left:0;right:0}
.site-header nav.open{display:flex}
.menu-button{background:0 0;border:0;margin-left:auto;font-weight:700;display:block}
.header-cta{display:none}
.hero{grid-template-columns:1fr;padding:40px 24px}
.hero-visual{display:none}
.section{padding:64px 24px}
.section-intro{grid-template-columns:1fr;gap:20px}
.stats{grid-template-columns:1fr 1fr}
.vidya-grid{grid-template-columns:1fr 1fr}
.vidya-grid article:nth-child(2n){border-left:0}
.vidya-grid article:nth-child(-n+2){border-bottom:1px solid #ffffff1f}
.s7-pills{grid-template-columns:1fr}
.s7-row{grid-template-columns:40px 1fr;gap:16px}
.sec-grid{grid-template-columns:1fr 1fr}
}
@media (width<=560px){
h2{font-size:32px}
.vidya-grid{grid-template-columns:1fr}
.vidya-grid article{border-left:0!important;border-top:1px solid #ffffff1f;padding:26px 0}
.vidya-grid article:first-child{border-top:0}
.chips{gap:8px}
.stats{grid-template-columns:1fr 1fr;gap:22px}
}

/* reveal-on-scroll (classes only, via JS) */
.rv{opacity:0;transform:translateY(24px);transition:opacity .8s cubic-bezier(.16,1,.3,1),transform .8s cubic-bezier(.16,1,.3,1)}
.rv.in{opacity:1;transform:none}
@media (prefers-reduced-motion:reduce){.rv{opacity:1;transform:none;transition:none}}

</style>
</head>
<body <?php body_class('antialiased'); ?>>
<main>
<header class="site-header"><a href="#top" class="brand" aria-label="ExtraaEdge home"><span class="brand-mark" aria-hidden="true"><i></i><i></i><i></i></span><strong>extraaedge</strong></a><button class="menu-button" type="button" aria-label="Toggle menu" aria-expanded="false">Menu</button><nav id="mainNav" class="" aria-label="Main navigation"><a href="#ee-platform">Platform</a><a href="#story7">Product film</a><a href="#ee-vidya-suite">VidyaAI</a><a href="#ee-ind">Why ExtraaEdge</a><a href="#ee-resources">Resources</a></nav><a class="header-cta" href="#admission-form">Book a demo <span aria-hidden="true">&#8599;</span></a></header>

<section class="hero" id="top">
  <div class="hero-copy">
    <p class="kicker"><span>&#10022;</span> The Admission Growth Platform</p>
    <h1 id="heroRot" aria-live="polite">Convert More Enquiries Into Admissions With <em>India&rsquo;s Intelligent Admissions Growth Platform</em></h1>
    <p class="hero-sub" id="heroSub">Built for education, driven by AI simplicity: <b>VidyaGPT, VidyaPulse and VidyaAgents call, qualify and follow up with every enquiry in 60 seconds</b>, so your counsellors only talk to students who are ready to enrol.</p>
    <div class="chips">
      <span class="chip"><i>&#9889;</i> Go live in 7 days</span>
      <span class="chip"><i>&#128279;</i> Works with your existing forms &amp; portals</span>
      <span class="chip"><i>&#128737;</i> ISO 27001 &middot; GDPR-ready</span>
    </div>
    <div class="hero-actions">
      <a class="button button-dark" href="#admission-form">Book a Free Demo <span aria-hidden="true">&#8599;</span></a>
      <a class="text-link" href="#ee-platform"><svg viewBox="0 0 24 24" fill="currentColor" width="14" height="14" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg> Explore the Platform Yourself</a>
    </div>
    <div class="stats">
      <div class="stat"><b><span data-count="500">0</span><em>+</em></b><span>Institutions onboard</span></div>
      <div class="stat"><b><span data-count="10">0</span><em>M+</em></b><span>Enquiries managed</span></div>
      <div class="stat"><b><span data-count="40">0</span><em>%</em></b><span>Conversion lift (up to)</span></div>
      <div class="stat"><b><span data-count="60">0</span><em>s</em></b><span>Avg. first response</span></div>
    </div>
  </div>
  <div class="hero-visual" aria-hidden="true">
    <div class="orbit orbit-one"></div>
    <div class="orbit orbit-two"></div>
    <div class="hero-glyph">momentum</div>
  </div>
</section>


<section class="trust" id="trusted-institutions" aria-label="Trusted Institutions">
  <div class="rv">
    <h2>Trusted by 500+ educational institutions across India</h2>
    <p>ExtraaEdge manages <strong>10M+ student enquiries</strong>, enabling universities, colleges and EdTech organizations to accelerate admissions with the Vidya AI suite and intelligent automation.</p>
    <div class="rate" role="img" aria-label="Rated 4.7 out of 5 by over 320 admission teams">
      <span aria-hidden="true" style="display:flex;gap:2px">
        <svg viewBox="0 0 24 24"><path d="M12 2l2.6 6.3 6.8.5-5.2 4.4 1.6 6.6L12 16.2l-5.8 3.6 1.6-6.6L2.6 8.8l6.8-.5L12 2z"/></svg>
        <svg viewBox="0 0 24 24"><path d="M12 2l2.6 6.3 6.8.5-5.2 4.4 1.6 6.6L12 16.2l-5.8 3.6 1.6-6.6L2.6 8.8l6.8-.5L12 2z"/></svg>
        <svg viewBox="0 0 24 24"><path d="M12 2l2.6 6.3 6.8.5-5.2 4.4 1.6 6.6L12 16.2l-5.8 3.6 1.6-6.6L2.6 8.8l6.8-.5L12 2z"/></svg>
        <svg viewBox="0 0 24 24"><path d="M12 2l2.6 6.3 6.8.5-5.2 4.4 1.6 6.6L12 16.2l-5.8 3.6 1.6-6.6L2.6 8.8l6.8-.5L12 2z"/></svg>
        <svg viewBox="0 0 24 24" style="opacity:.35"><path d="M12 2l2.6 6.3 6.8.5-5.2 4.4 1.6 6.6L12 16.2l-5.8 3.6 1.6-6.6L2.6 8.8l6.8-.5L12 2z"/></svg>
      </span>
      <b>4.7 / 5</b><span>Rated by 320+ admission teams</span>
    </div>
  </div>
  <?php
  $ee_home_logos = function_exists('ee_institute_logos_for') ? ee_institute_logos_for('home') : array();
  $ee_row_a = array(); $ee_row_b = array();
  foreach ($ee_home_logos as $ee_i => $ee_l) { if ($ee_i % 2 === 0) $ee_row_a[] = $ee_l; else $ee_row_b[] = $ee_l; }
  ?>
  <div class="marquee-wrap rv">
    <?php if ($ee_row_a) : ?>
    <div class="marquee-track">
      <?php for ($p=0;$p<2;$p++): foreach ($ee_row_a as $l): ?>
      <img src="<?php echo esc_url($l['u']); ?>" alt="<?php echo $p?'':esc_attr($l['a']); ?>" loading="lazy" decoding="async" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt}))">
      <?php endforeach; endfor; ?>
    </div>
    <?php endif; ?>
    <?php if ($ee_row_b) : ?>
    <div class="marquee-track right">
      <?php for ($p=0;$p<2;$p++): foreach ($ee_row_b as $l): ?>
      <img src="<?php echo esc_url($l['u']); ?>" alt="<?php echo $p?'':esc_attr($l['a']); ?>" loading="lazy" decoding="async" onerror="this.replaceWith(Object.assign(document.createElement('b'),{textContent:this.alt}))">
      <?php endforeach; endfor; ?>
    </div>
    <?php endif; ?>
  </div>
  <div class="trust-more rv"><a href="/videos/customer-stories/">See Their Success Stories <span aria-hidden="true">&rarr;</span></a></div>
</section>


<div class="story-kick"><span class="k-no">01</span><span class="k-lb">The platform, live</span><span class="k-sub">Explore the admission CRM software yourself, on sample data</span></div>
<section class="section platform-wrap" id="ee-platform">
  <div class="platform-shell rv">
    <?php ee_platform_section(); ?>
  </div>
</section>


<div class="story-kick"><span class="k-no">02</span><span class="k-lb">The AI advantage</span><span class="k-sub">Admission chatbot, WhatsApp automation, AI calling and lead scoring, one layer</span></div>
<section class="section s7-wrap" id="story7">
  <div class="section-intro rv">
    <h2>Seven Products. <em>One Admissions Growth Platform.</em></h2>
  </div>
  <div class="s7-list rv">
    <article class="s7-row" id="vidyaai"><span class="s7-n">01</span><div class="s7-body"><span class="s7-tag">AI Engine</span><h3>Vidya AI: VidyaGPT, VidyaPulse &amp; VidyaAgents</h3><p>AI built for one job: more admissions with less manual work. VidyaGPT engages every enquiry, VidyaPulse scores intent, VidyaAgents call and follow up.</p></div></article><article class="s7-row" id="admission-crm"><span class="s7-n">02</span><div class="s7-body"><span class="s7-tag">Core System</span><h3>Admissions Core</h3><p>Admission CRM software centralizes your entire admissions process, giving you real-time visibility into every prospect's journey from enquiry to enrolment. Track inquiries, manage applications, and automate follow-ups seamlessly, all from one platform. With intelligent lead prioritization, your team focuses on high-potential candidates while data-driven insights guide every decision.</p><div class="s7-pills"><div class="s7-pill"><b>Funnel Management</b><span>See every prospect's stage from enquiry to enrolment and spot drop-offs instantly.</span></div><div class="s7-pill"><b>Follow-Up Manager</b><span>Auto-schedules reminders so no prospect ever slips through the cracks.</span></div><div class="s7-pill"><b>Reporting Dashboard</b><span>Live conversion and counselor-performance reports, updated in real time.</span></div></div></div></article><article class="s7-row" id="marketing-automation"><span class="s7-n">03</span><div class="s7-body"><span class="s7-tag">Engagement Engine</span><h3>Marketing Automation</h3><p>Marketing automation delivers personalized emails and targeted campaigns to the right prospects at the perfect time. Integrated with your Admission CRM, it streamlines lead nurturing across multiple channels while you focus on strategy. Intelligent audience segmentation ensures every message resonates, improving engagement and conversion rates.</p><div class="s7-pills"><div class="s7-pill"><b>Email Marketing</b><span>Personalized drip campaigns triggered automatically by prospect behavior.</span></div><div class="s7-pill"><b>Integrated Communication Channels</b><span>Email, SMS, and WhatsApp orchestrated from a single workflow.</span></div><div class="s7-pill"><b>Campaign Analytics</b><span>Track opens, clicks, and conversions for every campaign you run.</span></div></div></div></article><article class="s7-row" id="chatbot"><span class="s7-n">04</span><div class="s7-body"><span class="s7-tag">24/7 Connectivity</span><h3>Chatbot &amp; Live Chat</h3><p>Integrated with your Admission CRM, the chatbot ensures you never miss an inquiry with 24/7 instant responses. Handle routine queries automatically while counsellors focus on meaningful conversations. Smart routing directs prospects to the right team members based on their interests and application stage.</p><div class="s7-pills"><div class="s7-pill"><b>Automated Chat Workflow</b><span>Pre-built conversation flows that qualify and route enquiries on their own.</span></div><div class="s7-pill"><b>Live Chat Enablement</b><span>Seamless handoff from bot to human counselor whenever it's needed.</span></div><div class="s7-pill"><b>Meeting Scheduler</b><span>Prospects book a counselor slot directly from the chat window.</span></div></div></div></article><article class="s7-row" id="application-mgmt"><span class="s7-n">05</span><div class="s7-body"><span class="s7-tag">Enrolment Portal</span><h3>Application Management System</h3><p>Application management system streamlines the entire application process for you and your prospective students. Integrated with your Admission CRM and optimized for mobile, it handles form submissions, document verification, and payments effortlessly. Intelligent status tracking keeps applicants informed while giving you actionable insights at every stage.</p><div class="s7-pills"><div class="s7-pill"><b>Application Form Builder &amp; Widgets</b><span>Drag-and-drop forms you can embed anywhere on your site.</span></div><div class="s7-pill"><b>Video GD-PI &amp; Counseling</b><span>Run group discussions and interviews virtually, with recordings saved to the CRM.</span></div><div class="s7-pill"><b>Payment Integration</b><span>Secure fee collection built right into the application flow.</span></div></div></div></article><article class="s7-row" id="whatsapp-api"><span class="s7-n">06</span><div class="s7-body"><span class="s7-tag">Direct Channel</span><h3>WhatsApp Business API</h3><p>WhatsApp Business API connects you with prospects on their preferred platform. Send bulk messages, engage in personalized conversations, and drive conversions, all through your Admission CRM. Data-driven campaign optimization ensures higher open rates and faster response times for improved enrolment outcomes.</p><div class="s7-pills"><div class="s7-pill"><b>Two-way WhatsApp and live chat</b><span>Reply to prospects directly inside WhatsApp threads, synced with the CRM.</span></div><div class="s7-pill"><b>Bulk WhatsApp &amp; automated campaigns</b><span>Send templated updates to thousands of prospects instantly.</span></div><div class="s7-pill"><b>Verified business account</b><span>Green-tick verified number builds instant trust with prospects.</span></div></div></div></article><article class="s7-row" id="mobile-crm"><span class="s7-n">07</span><div class="s7-body"><span class="s7-tag">On-the-go Productivity</span><h3>Mobile CRM</h3><p>Our Mobile CRM empowers work-from-home and field counselors to stay productive on the go. With built-in field tracking, monitor visits, log activities, and complete follow-ups efficiently from anywhere. Real-time sync with your Admission CRM ensures every interaction is captured for intelligent reporting.</p><div class="s7-pills"><div class="s7-pill"><b>Click-To-Call</b><span>Dial prospects straight from the mobile app; every call logs automatically.</span></div><div class="s7-pill"><b>Field Tracker</b><span>GPS check-in and check-out for on-ground counselor visits.</span></div><div class="s7-pill"><b>Missed Call Lead Capture</b><span>Every missed call auto-creates a fresh lead in the CRM.</span></div></div></div></article>
  </div>
</section>


<section class="section vidya-section" id="ee-vidya-suite" aria-label="Meet Vidya AI">
  <div class="section-intro rv">
    <h2>Meet Vidya AI, the Agentic AI Suite <em>built for smarter admissions.</em></h2>
  </div>
  <div class="vidya-grid rv">
    <article class="featured">
      <span class="v-n">01</span><div class="v-sym">&#10022;</div>
      <small>Chat &amp; WhatsApp agent</small><h3>VidyaGPT</h3>
      <dl><div><dt>Channels</dt><dd>Web &amp; WhatsApp</dd></div><div><dt>Languages</dt><dd>95+</dd></div><div><dt>Available</dt><dd>24&times;7</dd></div></dl>
      <p>Your 24&times;7 AI chat counsellor answers fees, courses, scholarships and deadline queries across your website and WhatsApp, replies instantly in 95+ languages, and hands hot leads straight to your counsellors.</p>
      <a href="#admission-form">See VidyaGPT in your demo <span aria-hidden="true">&#8599;</span></a>
    </article>
    <article>
      <span class="v-n">02</span><div class="v-sym">&#10022;</div>
      <small>Lead scoring agent</small><h3>VidyaPulse</h3>
      <dl><div><dt>Score</dt><dd>0&ndash;100</dd></div><div><dt>Updates</dt><dd>Real time</dd></div><div><dt>Signal</dt><dd>Buying intent</dd></div></dl>
      <p>Scores every lead 0&ndash;100 on real buying intent and re-scores in real time as they engage, so the hottest prospects surface first and counsellors know exactly who to call now.</p>
      <a href="#admission-form">See VidyaPulse in your demo <span aria-hidden="true">&#8599;</span></a>
    </article>
    <article>
      <span class="v-n">03</span><div class="v-sym">&#10022;</div>
      <small>Voice calling agent</small><h3>VidyaAgents</h3>
      <dl><div><dt>Channel</dt><dd>Outbound</dd></div><div><dt>Languages</dt><dd>10+ Indian</dd></div><div><dt>Available</dt><dd>24&times;7</dd></div></dl>
      <p>Calls every new lead within seconds and holds natural, human-like conversations that qualify interest and book counselling slots in 10+ Indian languages, around the clock.</p>
      <a href="#admission-form">See VidyaAgents in your demo <span aria-hidden="true">&#8599;</span></a>
    </article>
    <article>
      <span class="v-n">04</span><div class="v-sym">&#10022;</div>
      <small>Live demo</small><h3>Try It Live</h3>
      <dl><div><dt>Access</dt><dd>Instant</dd></div><div><dt>Signup</dt><dd>Not needed</dd></div><div><dt>Agents</dt><dd>All five</dd></div></dl>
      <p>Explore the live AI inside the product demo and watch every agent work a real admission funnel. No sales call, no signup.</p>
      <a href="#ee-platform">See the Vidya AI Suite live <span aria-hidden="true">&#8599;</span></a>
    </article>
  </div>
</section>


<div class="story-kick"><span class="k-no">03</span><span class="k-lb">The proof</span><span class="k-sub">Customer stories and results from 500+ educational institutions</span></div>
<section class="section stories-sec" id="stories" aria-labelledby="stories-title">
  <div class="section-intro rv">
    <h2 id="stories-title">What Our Clients <em>Are Saying.</em></h2>
  </div>
  <div class="stories-rail rv" id="storiesRail">
    <button type="button" class="story-thumb is-active" data-q="“Tula's Institute streamlined its admissions process, strengthened student engagement, and empowered its team with a more organised admissions workflow.”" data-n="Silky Jain Marwah" data-r="Executive Director at Tula's Institute, Dehradun" style="background-image:url('https://img.youtube.com/vi/3SHgLf1GFgk/hqdefault.jpg')" aria-label="Customer story: Silky Jain Marwah"><span class="story-play" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span></button><button type="button" class="story-thumb" data-q="“A unified admissions platform helped the team manage enquiries, improve follow-ups, and build a more efficient applicant journey.”" data-n="Pranay Rupani" data-r="Head of Admissions &amp; Marketing at Annapurna College of Film &amp; Media" style="background-image:url('https://img.youtube.com/vi/dWLdQ8E3FOU/hqdefault.jpg')" aria-label="Customer story: Pranay Rupani"><span class="story-play" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span></button><button type="button" class="story-thumb" data-q="“Simplified lead management and communication, with better counsellor visibility across the student admissions journey.”" data-n="K. Nirmala Devi" data-r="Assistant Manager at Indian Academy Group, Bengaluru" style="background-image:url('https://img.youtube.com/vi/yfK83D2SKps/hqdefault.jpg')" aria-label="Customer story: K. Nirmala Devi"><span class="story-play" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span></button><button type="button" class="story-thumb" data-q="“Streamlined enquiry handling, faster follow-ups and clearer visibility across the entire admission funnel.”" data-n="Uttaranchal University" data-r="University &amp;middot; Dehradun" style="background-image:url('https://img.youtube.com/vi/tLExH5jpQbw/hqdefault.jpg')" aria-label="Customer story: Uttaranchal University"><span class="story-play" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span></button><button type="button" class="story-thumb" data-q="“One platform for leads, counsellors and communication across the group’s campuses.”" data-n="Amrapali Group of Institutes" data-r="Group of Institutes &amp;middot; Haldwani" style="background-image:url('https://img.youtube.com/vi/9l99MjTfEbw/hqdefault.jpg')" aria-label="Customer story: Amrapali Group of Institutes"><span class="story-play" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span></button><button type="button" class="story-thumb" data-q="“ExtraaEdge CRM helped the team hit its admissions target for the cycle.”" data-n="DPU Global Business School" data-r="B-School &amp;middot; Pune" style="background-image:url('https://img.youtube.com/vi/7sPbL3uvha0/hqdefault.jpg')" aria-label="Customer story: DPU Global Business School"><span class="story-play" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span></button><button type="button" class="story-thumb" data-q="“The team adopted ExtraaEdge CRM in just 10 days and brought its counselling pipeline into one organised view.”" data-n="Admit Abroad" data-r="Study Abroad Consultants" style="background-image:url('https://img.youtube.com/vi/KisEkYkGYs8/hqdefault.jpg')" aria-label="Customer story: Admit Abroad"><span class="story-play" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span></button><button type="button" class="story-thumb" data-q="“From first enquiry to final PGDM enrolment - the full admission journey on one platform.”" data-n="FOSTIIMA Business School" data-r="B-School &amp;middot; New Delhi" style="background-image:url('https://img.youtube.com/vi/q53VDQFTq04/hqdefault.jpg')" aria-label="Customer story: FOSTIIMA Business School"><span class="story-play" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span></button><button type="button" class="story-thumb" data-q="“Structure and speed for the admission journey, with organised leads and timely follow-ups.”" data-n="IBSC" data-r="Institute of Management" style="background-image:url('https://img.youtube.com/vi/ApP0hhJ45NQ/hqdefault.jpg')" aria-label="Customer story: IBSC"><span class="story-play" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span></button><button type="button" class="story-thumb" data-q="“One place to manage enquiries, follow-ups and admissions for the whole team.”" data-n="IIFT" data-r="Institute of Management" style="background-image:url('https://img.youtube.com/vi/K3kqAHKJAgo/hqdefault.jpg')" aria-label="Customer story: IIFT"><span class="story-play" aria-hidden="true"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span></button>
  </div>
  <div class="story-cap rv" id="storyCap">
    <p class="q" id="storyQ">&ldquo;Tula&rsquo;s Institute streamlined its admissions process, strengthened student engagement, and empowered its team with a more organised admissions workflow.&rdquo;</p>
    <p class="who" id="storyWho"><b>Silky Jain Marwah</b> &middot; Executive Director at Tula&rsquo;s Institute, Dehradun</p>
  </div>
  <div class="stories-more rv"><a href="/videos/customer-stories/">View All Customer Stories &rarr;</a></div>
</section>


<section class="mid-cta" id="ee-midcta" aria-label="Book a demo">
  <div class="rv">
    <h2>The story so far, on <em>your data.</em></h2>
    <p>A 30-minute demo of the admission CRM on your courses and sources. Bring one real enquiry; watch Vidya AI answer it in 60 seconds.</p>
    <div class="row">
      <a class="go" href="#admission-form">Book a Demo</a>
      <a class="alt" href="#ee-platform">Keep exploring the platform</a>
    </div>
    <p class="fine">Go-live in 7 days &middot; rated 4.7/5 by 320+ admission teams</p>
  </div>
</section>


<div class="story-kick"><span class="k-no">04</span><span class="k-lb">Built for your institution</span><span class="k-sub">Higher education, K-12 schools, coaching, study abroad, EdTech</span></div>
<section class="section ind-sec" id="ee-ind" aria-label="Industries we serve">
  <div class="section-intro rv">
    <h2>Built for every kind <em>of institution.</em></h2>
    <p>One AI-powered admissions platform, tuned to the way your category recruits, nurtures and enrols students.</p>
  </div>
  <div class="ind-list rv">
    <a class="ind-row" href="/industries/edtech-crm/"><span class="ind-n">01</span><span class="ind-t">EdTech</span><span class="ind-d">You buy leads by the thousand - every enquiry has to convert.</span><span class="ind-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="ind-row" href="/industries/coaching-institute-crm/"><span class="ind-n">02</span><span class="ind-t">Coaching &amp; Training</span><span class="ind-d">Batches fill on deadlines - every enquiry counts.</span><span class="ind-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="ind-row" href="/industries/school-crm/"><span class="ind-n">03</span><span class="ind-t">K-12 Schools</span><span class="ind-d">Parents take months to choose - trust wins the seat.</span><span class="ind-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="ind-row" href="/industries/school-crm/"><span class="ind-n">04</span><span class="ind-t">Preschools &amp; Playschools</span><span class="ind-d">It’s their first school - reassurance closes the admission.</span><span class="ind-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="ind-row" href="/industries/higher-education-crm/"><span class="ind-n">05</span><span class="ind-t">Online Degree Programmes</span><span class="ind-d">You compete nationally for every learner.</span><span class="ind-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="ind-row" href="/industries/higher-education-crm/"><span class="ind-n">06</span><span class="ind-t">Higher Education</span><span class="ind-d">Many programmes, many counsellors - one admissions engine.</span><span class="ind-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="ind-row" href="/industries/overseas-crm/"><span class="ind-n">07</span><span class="ind-t">Study Abroad Consultants</span><span class="ind-d">A single student journey can run for a year.</span><span class="ind-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="ind-row" href="/partners/"><span class="ind-n">08</span><span class="ind-t">Channel Partners</span><span class="ind-d">Your partners send leads - you need to see every one.</span><span class="ind-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a>
  </div>
</section>


<section class="section integrations-sec" id="integrations">
  <div class="center-head rv">
    <p class="eyebrow" style="justify-content:center">Extensions &amp; Integrations</p>
    <h2>Connect your admissions stack <em>with ExtraaEdge.</em></h2>
  </div>
  <div class="ilogo-wall rv">
    <?php
    $IH_B  = 'https://www.extraaedge.com/wp-content/uploads/2026/intigration-logo/';
    $IH_WA = 'https://www.extraaedge.com/wp-content/uploads/2026/social-icons/whatsapp-icon.webp';
    $ih_all = array(
      array('linkedin-ads.svg','LinkedIn Ads'), array('google-ads.svg','Google Ads'),
      array('google-remarketing.svg','Google Analytics'), array('facebook-ads.svg','Facebook Ads'),
      array('instagram.svg','Instagram'), array('__wa','WhatsApp'),
      array('shiksha.svg','Shiksha'), array('collegedekho.svg','CollegeDekho'),
      array('collegedunia-learn.svg','Collegedunia'), array('justdial.svg','Justdial'),
      array('wix.svg','Wix'), array('wordpress.svg','WordPress'), array('asterisk.svg','Asterisk'),
      array('zoho-forms.svg','Zoho Forms'), array('contact-form-7.svg','Contact Form 7'),
      array('sendgrid.svg','SendGrid'), array('msg91.svg','MSG91'), array('netcore.svg','Netcore'),
      array('razorpay.svg','Razorpay'), array('stripe.svg','Stripe'),
      array('typeform.svg','Typeform'), array('elementor.svg','Elementor'), array('populi.svg','Populi'),
      array('unlayer.svg','Unlayer'), array('twilio.svg','Twilio'),
      array('paytm.svg','Paytm'), array('adib.svg','ADIB'), array('hdfc-bank.svg','HDFC Bank'),
      array('mastercard.svg','Mastercard'), array('easebuzz.svg','Easebuzz'),
    );
    foreach ($ih_all as $x) {
      $src = ($x[0] === '__wa') ? $IH_WA : $IH_B . $x[0];
      echo '<div class="ilogo-cell"><img src="' . esc_url($src) . '" alt="' . esc_attr($x[1])
         . '" loading="lazy" decoding="async" onerror="this.closest(\'.ilogo-cell\').remove()"></div>';
    }
    ?>
  </div>
  <div class="integ-cta rv"><a href="/integrations/">See All Integrations <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg></a></div>
</section>


<section class="section security-sec" id="security">
  <div class="center-head rv">
    <h2>Your students&rsquo; data, <em>protected by design.</em></h2>
  </div>
  <div class="sec-grid rv">
    <div class="sec-item"><img src="https://www.extraaedge.com/wp-content/uploads/integration-icons/iso%20certified%20logo.png" alt="ISO 27001" loading="lazy" decoding="async"><b>ISO 27001 Certified</b><span>Audited information-security management.</span></div>
    <div class="sec-item"><img src="https://www.extraaedge.com/wp-content/uploads/integration-icons/GDPR%20logo%20.png" alt="GDPR" loading="lazy" decoding="async"><b>GDPR Compliant</b><span>Privacy-first data handling &amp; consent.</span></div>
    <div class="sec-item"><img src="https://www.extraaedge.com/wp-content/uploads/integration-icons/india-data-residency-logo.png" alt="India Data Residency" loading="lazy" decoding="async"><b>India Data Residency</b><span>Hosted on secure, scalable cloud.</span></div>
    <div class="sec-item"><img src="https://www.extraaedge.com/wp-content/uploads/integration-icons/role-based-acccess-logo.png" alt="Role-Based Access" loading="lazy" decoding="async"><b>Role-Based Access</b><span>Granular permissions &amp; full audit trails.</span></div>
  </div>
</section>


<section class="section faq-sec" id="faq">
  <div class="center-head rv">
    <h2>Everything you need to know about <em>ExtraaEdge.</em></h2>
  </div>
  <div class="faq-list rv" id="faqList">
    <div class="faq-row"><button type="button" class="faq-q" aria-expanded="false"><span>What is ExtraaEdge?</span><span class="faq-ic">+</span></button><div class="faq-a"><p>ExtraaEdge is India's Intelligent Admissions Growth Platform, purpose-built for educational institutions - schools, colleges, universities and edtech companies. Its Vidya AI suite (VidyaGPT, VidyaPulse and VidyaAgents) handles enquiry response, lead prioritisation and follow-up automatically, so counsellors focus on conversion.</p></div></div><div class="faq-row"><button type="button" class="faq-q" aria-expanded="false"><span>How does ExtraaEdge help convert more students?</span><span class="faq-ic">+</span></button><div class="faq-a"><p>ExtraaEdge prioritises high-intent leads with VidyaPulse scoring, responds to every enquiry in 60 seconds with VidyaAgents calling and WhatsApp automation, and tells counsellors exactly who to follow up with next - reducing response time by up to 90% and lifting conversions by up to 40%.</p></div></div><div class="faq-row"><button type="button" class="faq-q" aria-expanded="false"><span>Does ExtraaEdge offer a free demo?</span><span class="faq-ic">+</span></button><div class="faq-a"><p>Yes. You can book a free personalised 45-minute demo. A product expert will walk you through the platform live with data relevant to your sector.</p></div></div><div class="faq-row"><button type="button" class="faq-q" aria-expanded="false"><span>Is ExtraaEdge suitable for small colleges?</span><span class="faq-ic">+</span></button><div class="faq-a"><p>Yes. ExtraaEdge serves institutions from single-campus colleges to large university groups processing 100,000+ applications per cycle. Pricing and features scale to your needs.</p></div></div><div class="faq-row"><button type="button" class="faq-q" aria-expanded="false"><span>What AI features does ExtraaEdge offer?</span><span class="faq-ic">+</span></button><div class="faq-a"><p>VidyaGPT: 24x7 AI chat on your website and WhatsApp. VidyaPulse: lead intent scoring (HOT / WARM / COLD). VidyaAgents: AI calling, smart follow-ups and counsellor performance intelligence. All part of the Vidya AI suite, engineered for the admission workflow.</p></div></div><div class="faq-row"><button type="button" class="faq-q" aria-expanded="false"><span>Will ExtraaEdge work with my existing ads and website?</span><span class="faq-ic">+</span></button><div class="faq-a"><p>Yes. ExtraaEdge captures leads automatically from Meta &amp; Google Ads, your website and landing pages, education portals (Shiksha, Collegedunia), WhatsApp, IVR and more - so every enquiry lands in one place with full source tracking. It also connects to your ERP/SIS, payment gateway and telephony.</p></div></div><div class="faq-row"><button type="button" class="faq-q" aria-expanded="false"><span>How long does it take to go live?</span><span class="faq-ic">+</span></button><div class="faq-a"><p>Starting fresh: 7 days to go live. Switching from an existing system: 14 days, including full data migration, integrations (ads, website, WhatsApp, telephony), workflow set-up and counsellor training, with a dedicated onboarding specialist and Customer Success Manager.</p></div></div><div class="faq-row"><button type="button" class="faq-q" aria-expanded="false"><span>Does VidyaGPT support regional languages?</span><span class="faq-ic">+</span></button><div class="faq-a"><p>Yes. VidyaGPT understands and responds in 95+ languages including Hindi, Marathi, Tamil, Telugu, Kannada, Bengali, Gujarati and more - over chat and on AI voice calls - so you can engage every student in their preferred language.</p></div></div><div class="faq-row"><button type="button" class="faq-q" aria-expanded="false"><span>Is my data secure with ExtraaEdge?</span><span class="faq-ic">+</span></button><div class="faq-a"><p>Yes. ExtraaEdge is ISO 27001 certified and GDPR compliant, with India-based data residency, role-based access controls, encryption and full audit trails - enterprise-grade protection for your institution and applicants.</p></div></div><div class="faq-row"><button type="button" class="faq-q" aria-expanded="false"><span>How does pricing work?</span><span class="faq-ic">+</span></button><div class="faq-a"><p>ExtraaEdge uses simple, transparent product-based pricing - not module-based pricing that adds cost every time you scale. Your demo includes a tailored quote based on your enquiry volume and the modules you need, with no hidden third-party charges.</p></div></div><div class="faq-row"><button type="button" class="faq-q" aria-expanded="false"><span>Can I migrate from my existing CRM or spreadsheets?</span><span class="faq-ic">+</span></button><div class="faq-a"><p>Yes. Our team handles full data migration from your existing CRM or spreadsheets - leads, history, sources and stages - as part of onboarding, so you go live without losing any data.</p></div></div><div class="faq-row"><button type="button" class="faq-q" aria-expanded="false"><span>Will my counsellors actually adopt it?</span><span class="faq-ic">+</span></button><div class="faq-a"><p>Yes. ExtraaEdge is a single-window CRM designed around the admissions team, so it's quick to learn even for non-technical counsellors. Every account gets hands-on training, on-ground support and a dedicated Customer Success Manager to drive adoption.</p></div></div>
  </div>
</section>


<section class="section" id="ee-products" aria-label="Our products">
  <div class="section-intro rv">
    <p class="eyebrow">The admissions platform</p>
    <h2>Our Products. <em>The all-in-one admissions platform.</em></h2>
    <p>Browse by stage of the admission funnel &mdash; or see everything at once.</p>
  </div>
  <div class="rv">
    <div class="tab-bar" role="tablist" aria-label="Product categories" id="prodTabs"><button type="button" class="tab-btn on" data-g="capture">Capture &amp; Nurture <i>5</i></button><button type="button" class="tab-btn" data-g="engage">Engage &amp; Communicate <i>5</i></button><button type="button" class="tab-btn" data-g="convert">Convert &amp; Enroll <i>3</i></button><button type="button" class="tab-btn" data-g="automate">Automate <i>4</i></button><button type="button" class="tab-btn" data-g="measure">Measure <i>5</i></button><button type="button" class="tab-btn" data-g="vidya">Vidya AI <i>4</i></button><button type="button" class="tab-btn" data-g="essentials">Essentials <i>2</i></button><button type="button" class="tab-btn" data-g="all">All</button></div><div class="tl-list" id="prodList"><a class="tl-row" data-g="capture" href="/products/education-crm/"><span class="tl-t"><b>Education CRM</b><small>Capture &amp; Nurture</small></span><span class="tl-d">Every enquiry captured into one clean pipeline.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="capture" href="/products/marketing-automation/"><span class="tl-t"><b>Marketing Automation</b><small>Capture &amp; Nurture</small></span><span class="tl-d">Campaigns measured to enrolment, not clicks.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="capture" href="/solutions/lead-management/"><span class="tl-t"><b>Lead Management</b><small>Capture &amp; Nurture</small></span><span class="tl-d">One student, one timeline - nothing forgotten.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="capture" href="/solutions/lead-scoring/"><span class="tl-t"><b>Lead Scoring</b><small>Capture &amp; Nurture</small></span><span class="tl-d">Call the right student first, every time.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="capture" href="/products/journey-builder/"><span class="tl-t"><b>Journey Builder</b><small>Capture &amp; Nurture</small></span><span class="tl-d">Design the whole student journey visually.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="engage" href="/products/whatsapp-business-api/" hidden><span class="tl-t"><b>WhatsApp Business API</b><small>Engage &amp; Communicate</small></span><span class="tl-d">Official API with 98% open rates.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="engage" href="/products/cloud-telephony/" hidden><span class="tl-t"><b>Cloud Telephony &amp; IVR</b><small>Engage &amp; Communicate</small></span><span class="tl-d">Every call recorded on the lead.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="engage" href="/products/email-marketing/" hidden><span class="tl-t"><b>Email &amp; SMS Campaigns</b><small>Engage &amp; Communicate</small></span><span class="tl-d">Sends that fire exactly on stage moves.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="engage" href="/products/education-chatbot/" hidden><span class="tl-t"><b>Education Chatbot</b><small>Engage &amp; Communicate</small></span><span class="tl-d">24×7 AI answers in 95+ languages.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="engage" href="/products/mobile-crm/" hidden><span class="tl-t"><b>Mobile CRM</b><small>Engage &amp; Communicate</small></span><span class="tl-d">The whole funnel in your pocket.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="convert" href="/products/application-management-system/" hidden><span class="tl-t"><b>Application Management (AMS)</b><small>Convert &amp; Enroll</small></span><span class="tl-d">Forms, documents &amp; review on one rail.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="convert" href="/products/payment-enrollment/" hidden><span class="tl-t"><b>Payment &amp; Enrollment</b><small>Convert &amp; Enroll</small></span><span class="tl-d">Offer letter to fee paid, frictionless.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="convert" href="/solutions/walk-in-management/" hidden><span class="tl-t"><b>Walk-in Management</b><small>Convert &amp; Enroll</small></span><span class="tl-d">No campus visit ever goes unrecorded.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="automate" href="/products/workflow-automation/" hidden><span class="tl-t"><b>Workflow Automation</b><small>Automate</small></span><span class="tl-d">No-code rules that run admissions.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="automate" href="/products/lead-assignment/" hidden><span class="tl-t"><b>Lead Assignment &amp; Routing</b><small>Automate</small></span><span class="tl-d">The right counsellor, instantly.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="automate" href="/products/task-automation/" hidden><span class="tl-t"><b>Task Automation</b><small>Automate</small></span><span class="tl-d">Worklists that build themselves.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="automate" href="/products/follow-up-automation/" hidden><span class="tl-t"><b>Follow-up Automation</b><small>Automate</small></span><span class="tl-d">No follow-up ever slips again.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="measure" href="/analytics/executive-dashboard/" hidden><span class="tl-t"><b>Executive Dashboard</b><small>Measure</small></span><span class="tl-d">Your whole season on one screen.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="measure" href="/analytics/admission-analytics/" hidden><span class="tl-t"><b>Admission Analytics</b><small>Measure</small></span><span class="tl-d">Every funnel stage, measured live.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="measure" href="/analytics/marketing-analytics/" hidden><span class="tl-t"><b>Marketing Analytics</b><small>Measure</small></span><span class="tl-d">Every rupee tracked to enrolment.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="measure" href="/analytics/funnel-analytics/" hidden><span class="tl-t"><b>Funnel Analytics</b><small>Measure</small></span><span class="tl-d">Find the leak costing you admissions.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="measure" href="/analytics/custom-reports/" hidden><span class="tl-t"><b>Custom Reports</b><small>Measure</small></span><span class="tl-d">Any question, answered in a report.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="vidya" href="https://getvidya.ai/vidya-ai" target="_blank" rel="noopener" hidden><span class="tl-t"><b>Why Vidya AI</b><small>Vidya AI</small></span><span class="tl-d">Meet the agentic AI admission suite.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="vidya" href="https://getvidya.ai/vidya-gpt" target="_blank" rel="noopener" hidden><span class="tl-t"><b>VidyaGPT</b><small>Vidya AI</small></span><span class="tl-d">Your 24×7 AI chat counsellor.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="vidya" href="https://getvidya.ai/vidya-ai-voice-agent" target="_blank" rel="noopener" hidden><span class="tl-t"><b>VidyaAI Voice Agent</b><small>Vidya AI</small></span><span class="tl-d">Calls every new lead in 60 seconds.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="vidya" href="https://getvidya.ai/vidya-pulse" target="_blank" rel="noopener" hidden><span class="tl-t"><b>VidyaPulse</b><small>Vidya AI</small></span><span class="tl-d">Live buying-intent scores on every lead.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="essentials" href="/integrations/" hidden><span class="tl-t"><b>Integrations</b><small>Essentials</small></span><span class="tl-d">50+ tools flowing into one CRM.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="essentials" href="/security/" hidden><span class="tl-t"><b>Security &amp; Compliance</b><small>Essentials</small></span><span class="tl-d">ISO 27001, GDPR-ready, audit-logged.</span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a></div>
  </div>
  <div class="tab-foot"><a href="/products/">Explore All Features &rarr;</a></div>
</section>


<section class="section" id="ee-solutions" aria-label="Solutions" style="background:var(--cream)">
  <div class="section-intro rv">
    <h2>Solutions for every <em>admissions motion.</em></h2>
  </div>
  <div class="rv">
    <div class="tab-bar" role="tablist" aria-label="Solution categories" id="solTabs"><button type="button" class="tab-btn on" data-g="usecase">By Use Case <i>7</i></button><button type="button" class="tab-btn" data-g="team">By Team <i>6</i></button><button type="button" class="tab-btn" data-g="outcome">By Outcome <i>6</i></button></div><div class="tl-list" id="solList"><a class="tl-row" data-g="usecase" href="/use-case/admission-management/"><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Admission Management</b><small>Track every applicant in one live pipeline</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="usecase" href="/use-case/enrollment-management/"><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Enrollment Management</b><small>Move offers to enrolled &amp; fee-paid, faster</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="usecase" href="/use-case/student-recruitment/"><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Student Recruitment</b><small>Source verified enquiries from every channel</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="usecase" href="/use-case/lead-nurturing/"><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Lead Nurturing</b><small>Automated drips across WhatsApp, email &amp; SMS</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="usecase" href="/use-case/student-engagement/"><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Student Engagement</b><small>Keep every admit warm to day one</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="usecase" href="/use-case/event-management/"><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Event Management</b><small>Webinars &amp; fairs that fill themselves</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="usecase" href="/use-case/application-processing/"><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Application Processing</b><small>Forms, docs &amp; fees on one rail</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="team" href="/solutions/admissions/" hidden><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Admission Teams</b><small>The team’s whole day on one queue</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="team" href="/solutions/counselors/" hidden><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Counselors</b><small>A calmer, sharper daily list</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="team" href="/solutions/marketing/" hidden><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Marketing Teams</b><small>Campaigns measured to enrolment</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="team" href="/solutions/sales/" hidden><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Sales Teams</b><small>Close more with less chasing</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="team" href="/solutions/call-center/" hidden><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Call Centre</b><small>AI-first calling that never sleeps</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="team" href="/solutions/management/" hidden><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Leadership</b><small>Live numbers across campuses</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="outcome" href="/solutions/increase-admissions/" hidden><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Increase Admissions</b><small>More seats, same team &amp; budget</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="outcome" href="/solutions/improve-conversion/" hidden><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Improve Conversion Rate</b><small>+up to 40% across 500+ institutions</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="outcome" href="/solutions/faster-follow-ups/" hidden><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Faster Follow-ups</b><small>Hours of delay down to 60 seconds</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="outcome" href="/solutions/reduce-manual-work/" hidden><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Reduce Manual Work</b><small>Hours back every single week</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="outcome" href="/solutions/increase-roi/" hidden><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Increase Marketing ROI</b><small>More enrolments per rupee spent</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="tl-row" data-g="outcome" href="/solutions/better-student-experience/" hidden><span class="tl-chk" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span><span class="tl-t"><b>Better Student Experience</b><small>Admissions students actually enjoy</small></span><span class="tl-go" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a></div>
  </div>
  <div class="tab-foot">Not sure which solution fits? <a href="#admission-form">Book a 45-minute demo</a> &mdash; we&rsquo;ll map the right workflow on your own funnel.</div>
</section>


<section class="section res-sec" id="ee-resources" aria-label="Resources">
  <div class="section-intro rv">
    <h2>Everything you need <em>to win admissions.</em></h2>
  </div>
  <div class="res-grid rv">
    <a class="res-card" href="/blog/"><small>RESOURCE</small><h3>Blog</h3><p>Admission playbooks, trends and product thinking - fresh every week.</p><span class="res-link">Explore <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="res-card" href="/videos/"><small>RESOURCE</small><h3>Videos</h3><p>Product walkthroughs and how-tos, two minutes at a time.</p><span class="res-link">Explore <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="res-card" href="/webinars/"><small>RESOURCE</small><h3>Webinars</h3><p>Live sessions with admission leaders and our experts.</p><span class="res-link">Explore <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="res-card" href="/ebooks/"><small>RESOURCE</small><h3>eBooks</h3><p>Deep-dive guides you can hand your whole team.</p><span class="res-link">Explore <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="res-card" href="/help/"><small>RESOURCE</small><h3>Help Centre</h3><p>Step-by-step help for every module of the platform.</p><span class="res-link">Explore <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="res-card" href="/documentation/"><small>RESOURCE</small><h3>Documentation</h3><p>Admin, counsellor and automation handbooks.</p><span class="res-link">Explore <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="res-card" href="/api-documentation/"><small>RESOURCE</small><h3>API Documentation</h3><p>REST APIs and webhooks for your engineering team.</p><span class="res-link">Explore <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="res-card" href="/faqs/"><small>RESOURCE</small><h3>FAQs</h3><p>Straight answers on pricing, setup, security and AI.</p><span class="res-link">Explore <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="res-card" href="/roi-calculator/"><small>RESOURCE</small><h3>ROI Calculator</h3><p>See what ExtraaEdge is worth on your own numbers.</p><span class="res-link">Explore <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="res-card" href="/crm-comparison/"><small>RESOURCE</small><h3>CRM Comparison</h3><p>ExtraaEdge vs generic CRMs, honestly compared.</p><span class="res-link">Explore <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a><a class="res-card" href="/release-notes/"><small>RESOURCE</small><h3>Release Notes</h3><p>What shipped and improved, month by month.</p><span class="res-link">Explore <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M13 6l6 6-6 6"/></svg></span></a>
  </div>
</section>


<?php
$ee_blog_posts = function_exists('get_posts')
  ? get_posts(array('numberposts' => 3, 'post_status' => 'publish', 'suppress_filters' => false))
  : array();
if ($ee_blog_posts) : ?>
<section class="section blog-sec" id="ee-blog" aria-label="Latest from the blog">
  <div class="section-intro rv">
    <h2>Latest from the blog<span style="display:block"><em>Admission playbooks that fill more seats.</em></span></h2>
  </div>
  <div class="blog-grid rv">
    <?php foreach ($ee_blog_posts as $ee_bp) :
      $ee_bp_url   = get_permalink($ee_bp);
      $ee_bp_img   = function_exists('get_the_post_thumbnail_url') ? get_the_post_thumbnail_url($ee_bp, 'medium_large') : '';
      $ee_bp_cats  = function_exists('get_the_category') ? get_the_category($ee_bp->ID) : array();
      $ee_bp_cat   = ($ee_bp_cats && strtolower($ee_bp_cats[0]->name) !== 'uncategorized') ? $ee_bp_cats[0]->name : 'Admissions';
      $ee_bp_title = get_the_title($ee_bp);
      $ee_bp_exc   = wp_trim_words(get_the_excerpt($ee_bp), 18, '…');
    ?>
    <a class="blog-card" href="<?php echo esc_url($ee_bp_url); ?>">
      <span class="blog-img">
        <?php if ($ee_bp_img) : ?>
        <img src="<?php echo esc_url($ee_bp_img); ?>" alt="<?php echo esc_attr($ee_bp_title); ?>" loading="lazy" decoding="async">
        <?php else : ?>
        <span class="blog-ph" aria-hidden="true"><?php echo esc_html(mb_strtoupper(mb_substr(wp_strip_all_tags($ee_bp_title), 0, 1))); ?></span>
        <?php endif; ?>
      </span>
      <span class="blog-body">
        <span class="blog-meta"><span class="cat"><?php echo esc_html($ee_bp_cat); ?></span><span><?php echo esc_html(get_the_date('', $ee_bp)); ?></span></span>
        <h3><?php echo esc_html($ee_bp_title); ?></h3>
        <p><?php echo esc_html($ee_bp_exc); ?></p>
        <span class="rd">Read Article <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" width="14" height="14"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
      </span>
    </a>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>


<footer>
  <div class="footer-top">
    <a href="#top" class="brand footer-brand"><span class="brand-mark" aria-hidden="true"><i></i><i></i><i></i></span><strong>extraaedge</strong></a>
    <p>The Admission Growth Platform<br>built for education.</p>
  </div>
  <div class="footer-links">
    <div><strong>Platform</strong><a href="#ee-platform">Admission CRM</a><a href="#ee-products">Products</a><a href="#ee-vidya-suite">VidyaAI</a><a href="#ee-solutions">Solutions</a></div>
    <div><strong>Solutions</strong><a href="/industries/higher-education-crm/">Higher education</a><a href="/industries/school-crm/">Schools</a><a href="/industries/edtech-crm/">EdTech</a><a href="/industries/overseas-crm/">Study abroad</a></div>
    <div><strong>Company</strong><a href="#ee-resources">Resources</a><a href="/videos/customer-stories/">Customers</a><a href="/blog/">Blog</a><a href="#admission-form">Contact</a></div>
    <div><strong>Compare</strong><a href="/crm-comparison/">CRM Comparison</a><a href="#security">Security</a><a href="#faq">FAQ</a></div>
  </div>
  <div class="footer-bottom"><span>&copy; 2026 ExtraaEdge. India&rsquo;s Intelligent Admissions Growth Platform.</span><span>Privacy &middot; Terms &middot; Security</span></div>
</footer>


<div class="eedd-backdrop" id="eeddBack" aria-hidden="true"></div>
<aside class="ee-demo-drawer" id="admission-form" role="dialog" aria-modal="true" aria-label="Book a demo">
  <div class="eedd-head">
    <span><b>Book a Demo</b><small>Personalised to your institution &middot; 45 minutes</small></span>
    <button type="button" class="eedd-x" id="eeddClose" aria-label="Close">&#10005;</button>
  </div>
  <div class="eedd-body">
    <script async src="https://eeconfigstaticfiles.blob.core.windows.net/staticfiles/growth/ee-form-widget/form-7/widget.js"></script>
    <div id="ee-form-7"></div>
    <p class="secure-label">&#128274; Secure Data Transmission Active &middot; ISO 27001 Certified &middot; GDPR Compliant</p>
  </div>
</aside>


<div id="ee-stickcta" role="complementary" aria-label="Book a demo">
  <a class="go" href="#admission-form"><span aria-hidden="true"><svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M13 2L4.1 12.6h6L9.9 22 19 11.4h-6L13 2z"/></svg></span>Book a Free Demo</a>
  <button type="button" class="off" aria-label="Hide this bar">&#10005;</button>
</div>

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

  /* hero rotating headline - reserves the tallest phrase's height so nothing jumps */
  (function(){
    var DATA=[
      {pre:'Convert More Enquiries Into Admissions With ', acc:'India’s Intelligent Admissions Growth Platform'},
      {pre:'Capture And Convert Student Leads 24/7 With ',  acc:'AI-Powered Education Chatbot'},
      {pre:'Engage Every Prospect Instantly With ',         acc:'AI-Powered WhatsApp Admissions'},
      {pre:'Automate Student Recruitment Campaigns With ',  acc:'AI-Powered Marketing Automation'}
    ];
    var el=document.getElementById('heroRot'); if(!el) return;
    function fitRot(){
      var probe=document.createElement('h1');
      probe.style.cssText='position:absolute;left:-9999px;top:0;visibility:hidden;width:'+el.clientWidth+'px;min-height:0;height:auto;margin:0';
      var cs=getComputedStyle(el);
      ['font-size','line-height','letter-spacing','font-weight','font-family'].forEach(function(k,i){
        probe.style.setProperty(k,[cs.fontSize,cs.lineHeight,cs.letterSpacing,cs.fontWeight,cs.fontFamily][i]);
      });
      el.parentNode.appendChild(probe);
      var h=0;
      DATA.forEach(function(d){ probe.textContent=d.pre+d.acc; if(probe.offsetHeight>h) h=probe.offsetHeight; });
      probe.parentNode.removeChild(probe);
      if(h) el.style.minHeight=h+'px';
    }
    fitRot();
    window.addEventListener('resize',function(){ clearTimeout(fitRot.__t); fitRot.__t=setTimeout(fitRot,150); });
    try{ if(document.fonts&&document.fonts.ready) document.fonts.ready.then(fitRot); }catch(_){}
    var reduce=window.matchMedia&&window.matchMedia('(prefers-reduced-motion:reduce)').matches;
    if(reduce||DATA.length<2) return;
    var i=0;
    setInterval(function(){
      i=(i+1)%DATA.length;
      el.style.opacity=0;
      setTimeout(function(){
        el.innerHTML=DATA[i].pre+'<em>'+DATA[i].acc+'</em>';
        el.style.opacity=1;
      },260);
    },4200);
    el.style.transition='opacity .26s ease';
  })();

  /* hero stat counters */
  (function(){
    var els=[].slice.call(document.querySelectorAll('.stat [data-count]'));
    if(!els.length) return;
    var done=false;
    function run(){
      if(done) return; done=true;
      els.forEach(function(el){
        var target=parseInt(el.getAttribute('data-count'),10)||0, cur=0;
        var step=Math.max(1,Math.round(target/40));
        var t=setInterval(function(){
          cur+=step;
          if(cur>=target){ cur=target; clearInterval(t); }
          el.textContent=cur;
        },28);
      });
    }
    if('IntersectionObserver' in window){
      var io=new IntersectionObserver(function(entries){ entries.forEach(function(e){ if(e.isIntersecting) run(); }); },{threshold:.4});
      var host=document.querySelector('.stats'); if(host) io.observe(host);
    } else run();
  })();

  /* scroll reveal */
  var revealTargets=[].slice.call(document.querySelectorAll('.rv'));
  if('IntersectionObserver' in window && revealTargets.length){
    var io2=new IntersectionObserver(function(entries){
      entries.forEach(function(entry){ if(entry.isIntersecting){ entry.target.classList.add('in'); io2.unobserve(entry.target); } });
    },{threshold:.1,rootMargin:'0px 0px -6% 0px'});
    revealTargets.forEach(function(el){ io2.observe(el); });
  } else revealTargets.forEach(function(el){ el.classList.add('in'); });

  /* generic tab groups: products + solutions share .tab-bar/.tab-btn + .tl-row[data-g] */
  [].slice.call(document.querySelectorAll('.tab-bar')).forEach(function(bar){
    var list=bar.nextElementSibling;
    if(!list||!list.classList.contains('tl-list')) return;
    var btns=[].slice.call(bar.querySelectorAll('.tab-btn'));
    var rows=[].slice.call(list.querySelectorAll('.tl-row'));
    btns.forEach(function(b){
      b.addEventListener('click',function(){
        btns.forEach(function(x){ x.classList.toggle('on',x===b); });
        var g=b.getAttribute('data-g');
        rows.forEach(function(r){ r.hidden = !(g==='all' || r.getAttribute('data-g')===g); });
      });
    });
  });

  /* FAQ accordion */
  [].slice.call(document.querySelectorAll('.faq-row')).forEach(function(row){
    var btn=row.querySelector('.faq-q'), panel=row.querySelector('.faq-a');
    if(!btn||!panel) return;
    btn.addEventListener('click',function(){
      var open=row.getAttribute('data-open')==='1';
      [].slice.call(document.querySelectorAll('.faq-row[data-open="1"]')).forEach(function(r){
        if(r!==row){ r.removeAttribute('data-open'); r.querySelector('.faq-q').setAttribute('aria-expanded','false'); r.querySelector('.faq-a').style.maxHeight=null; }
      });
      if(open){ row.removeAttribute('data-open'); btn.setAttribute('aria-expanded','false'); panel.style.maxHeight=null; }
      else{ row.setAttribute('data-open','1'); btn.setAttribute('aria-expanded','true'); panel.style.maxHeight=panel.scrollHeight+'px'; }
    });
  });

  /* customer stories rail */
  (function(){
    var rail=document.getElementById('storiesRail'); if(!rail) return;
    var q=document.getElementById('storyQ'), who=document.getElementById('storyWho');
    [].slice.call(rail.querySelectorAll('.story-thumb')).forEach(function(btn){
      btn.addEventListener('click',function(){
        [].slice.call(rail.querySelectorAll('.story-thumb')).forEach(function(b){ b.classList.toggle('is-active',b===btn); });
        if(q) q.textContent='“'+btn.getAttribute('data-q').replace(/^[“”]|[“”]$/g,'')+'”';
        if(who) who.innerHTML='<b>'+btn.getAttribute('data-n')+'</b> · '+btn.getAttribute('data-r');
      });
    });
  })();

  /* sticky mobile demo pill */
  (function(){
    var pill=document.getElementById('ee-stickcta'); if(!pill) return;
    var off=pill.querySelector('.off');
    if(off) off.addEventListener('click',function(){ pill.style.display='none'; });
  })();
})();

</script>
<script>

(function(){
  var dr=document.getElementById('admission-form'),
      back=document.getElementById('eeddBack'),
      x=document.getElementById('eeddClose'),
      last=null;
  if(!dr||!back||!x) return;
  function openD(from){
    last=from||null;
    dr.classList.add('open'); back.classList.add('open');
    document.body.style.overflow='hidden';
    x.focus();
  }
  function closeD(){
    dr.classList.remove('open'); back.classList.remove('open');
    document.body.style.overflow='';
    if(last&&last.focus) last.focus();
  }
  document.addEventListener('click',function(e){
    var a=e.target.closest('a[href$="#admission-form"]');
    if(!a) return;
    e.preventDefault();
    openD(a);
  });
  back.addEventListener('click',closeD);
  x.addEventListener('click',closeD);
  document.addEventListener('keydown',function(e){ if(e.key==='Escape'&&dr.classList.contains('open')) closeD(); });
})();

</script>
<?php wp_footer(); ?>
</body>
</html>
