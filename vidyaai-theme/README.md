# VidyaAI — WordPress Theme

Standalone landing theme for **VidyaAI** (getvidya.ai) — the 24/7 AI Admission Agent
(VidyaGPT chat, AI voice calling & intent scoring). Independent of the ExtraaEdge theme.

## Design system
- **Navy** `#19335D` / `#1E3A8A` · **Teal/Cyan** `#06B6D4` · **Off-white** `#F8FAFC` · **Deep Slate** `#0F172A`
- **Plus Jakarta Sans** (headings) + **Inter** (body)
- Mobile-first, no build step, no dependencies.

## Files
```
vidyaai-theme/
├── style.css              Theme header + all CSS (enqueued)
├── functions.php          Theme setup + font/stylesheet enqueue
├── header.php             <head>, wp_head(), sticky nav
├── footer.php             Site footer, page JS, wp_footer()
├── front-page.php         Homepage (renders the landing sections)
├── index.php              Fallback template (also renders the landing)
└── template-parts/
    └── home.php           All 14 landing sections (hero, VidyaGPT, AI calling,
                           intent scoring, how-it-works, languages, integrations,
                           proof, security, FAQ, demo form)
```

## Install
1. Zip the `vidyaai-theme/` folder (or upload it via FTP to `wp-content/themes/`).
2. **WP Admin → Appearance → Themes → Add New → Upload Theme** → choose the zip → **Install**.
3. **Activate**.
4. (Optional) **Settings → Reading → Your homepage displays → A static page** isn't required —
   `front-page.php` is used automatically. The landing also renders on any URL via `index.php`.

## Notes
- Self-contained: does **not** depend on the ExtraaEdge theme.
- The demo form is front-end only — wire `<form>` to your CRM / lead endpoint when going live.
- No `screenshot.png` included; add a 1200×900 PNG named `screenshot.png` for the Appearance preview.
