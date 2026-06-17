<?php
/**
 * VidyaAI theme — header (doctype, <head>, opening <body>, sticky nav).
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
, fonts, SEO,
 * nav, sections, footer — intentionally does NOT use get_header/get_footer).
 * Also deployable as the getvidya.ai home (where the live URL is just "/").
 * Design system:
 *   Navy #19335D / #1E3A8A · Teal/Cyan #06B6D4 · Off-white #F8FAFC ·
 *   Deep Slate #0F172A · Plus Jakarta Sans (headings) + Inter (body).
 */
?><!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
<title>VidyaAI — The 24/7 AI Admission Agent | VidyaGPT, AI Calling & Intent Scoring</title>
<meta name="description" content="VidyaAI is the 24/7 AI admission agent that answers, qualifies and follows up with every student across WhatsApp, web and phone — in 95+ languages. VidyaGPT chat, AI voice calling and intent scoring that hand counsellors only hot, ready-to-enrol leads. Book a demo." />
<meta name="keywords" content="VidyaAI, VidyaGPT, AI admission agent, AI calling admissions, admission chatbot, AI lead scoring, WhatsApp admission automation, education AI agent" />
<meta name="robots" content="index, follow, max-image-preview:large" />
<link rel="canonical" href="https://getvidya.ai/" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="VidyaAI" />
<meta property="og:title" content="VidyaAI — The 24/7 AI Admission Agent" />
<meta property="og:description" content="AI that answers, qualifies and follows up with every student 24/7 — VidyaGPT chat, AI voice calling & intent scoring. Counsellors get only hot leads." />
<meta property="og:url" content="https://getvidya.ai/" />
<meta name="twitter:card" content="summary_large_image" />

<script type="application/ld+json">
{"@context":"https://schema.org","@type":"SoftwareApplication","name":"VidyaAI","applicationCategory":"BusinessApplication","operatingSystem":"Web, WhatsApp, Phone","description":"24/7 AI admission agent — VidyaGPT chat, AI voice calling and intent scoring for educational institutions.","offers":{"@type":"Offer","price":"0","priceCurrency":"INR","description":"Free demo"},"provider":{"@type":"Organization","name":"ExtraaEdge Technology Solutions Pvt. Ltd","url":"https://www.extraaedge.com/"}}
</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="nav">
  <div class="wrap">
    <a href="/" class="logo"><span class="mark">V</span>Vidya<b>AI</b></a>
    <nav class="nav-links">
      <a href="#vidyagpt">VidyaGPT</a>
      <a href="#calling">AI Calling</a>
      <a href="#scoring">Intent Scoring</a>
      <a href="#how">How it works</a>
      <a href="#integrations">Integrations</a>
    </nav>
    <div class="nav-cta">
      <a href="https://www.extraaedge.com/" class="btn btn-ghost">ExtraaEdge CRM</a>
      <a href="#demo" class="btn btn-primary">Book a Demo</a>
      <button class="nav-burger" aria-label="Menu" onclick="document.getElementById('mnav').classList.toggle('open')">&#9776;</button>
    </div>
  </div>
  <div id="mnav" style="display:none"></div>
</header>
