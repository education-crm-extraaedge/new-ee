# Vidya AI — Cinematic Product Demo

A self-contained, dark-SaaS animated product demo of **Vidya AI / VidyaGPT** for the
website hero section. Built to look like a real product interface (Intercom / Drift /
Linear style), not a cartoon. Communicates **speed, intelligence, automation and
conversion impact** in a 15-second seamless loop.

## Files

| File | What it is |
|------|------------|
| `vidya-ai-demo.html` | **Primary deliverable.** Standalone animated HTML/CSS/JS demo. Loops forever, auto-scales to any container, no build step. |
| `vidya-ai-demo.mp4` | 1920×1080 @ 60fps H.264 video **with synthesized sound design** (ambient pad, typing, whooshes, UI clicks, notification chime). |
| `vidya-ai-demo-muted.mp4` | Same video, no audio — for autoplay hero loops (browsers require muted autoplay). |
| `vidya-ai-demo-poster.jpg` | Poster / fallback still. |
| `tools/render.js` | Headless-Chromium renderer that exports the HTML to the silent MP4. |
| `tools/audio.py` | Synthesizes the soundtrack WAV (numpy). |

## Scene flow (timeline)

1. **0–2s — Hero intro:** VidyaGPT · Live · "Answering now" · "Trusted by 500+ education brands".
2. **2–5s — Student query:** realistic typing of *"Hi! I'm interested in the B.Des program…"*.
3. **5–9s — AI response:** instant reply (fee, eligibility, scholarships) + "Replied in 2.4s" badge + glow.
4. **9–12s — Smart action:** "Book Aptitude Slot" (glowing cyan CTA) / "Send Brochure".
5. **12–15s — Lead qualification:** HOT LEAD 🔥, intent score 92/100, tags, "Counsellor notified instantly".

## How to embed in the hero

**Option A — iframe (simplest, keeps it isolated, auto-scales):**

```html
<div style="position:relative;width:100%;aspect-ratio:16/9;border-radius:20px;overflow:hidden">
  <iframe src="/wp-content/themes/vidyaai-theme/assets/demo/vidya-ai-demo.html"
          title="Vidya AI live demo" loading="lazy"
          style="position:absolute;inset:0;width:100%;height:100%;border:0"></iframe>
</div>
```

**Option B — muted autoplay video (lighter on CPU):**

```html
<video src="/wp-content/themes/vidyaai-theme/assets/demo/vidya-ai-demo-muted.mp4"
       poster="/wp-content/themes/vidyaai-theme/assets/demo/vidya-ai-demo-poster.jpg"
       autoplay muted loop playsinline
       style="width:100%;aspect-ratio:16/9;border-radius:20px"></video>
```

The HTML version is recommended for the hero — it stays crisp at any resolution, loops
with zero seam, and is only ~28 KB.

## Regenerating the video

From a scratch dir with `npm i puppeteer @ffmpeg-installer/ffmpeg` and Python `numpy`:

```bash
node tools/render.js        # HTML -> vidya-silent.mp4 (1080p60)
python3 tools/audio.py      # -> vidya-audio.wav
ffmpeg -i vidya-silent.mp4 -i vidya-audio.wav -c:v copy -c:a aac -shortest \
       -movflags +faststart vidya-ai-demo.mp4
```

> The HTML is the single source of truth — every visual is a pure function of time
> `t`, so it is both a live loop and a frame-perfect render target.
