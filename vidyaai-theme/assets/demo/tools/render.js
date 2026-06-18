/* Renders the deterministic VidyaAI demo to a raw video stream.
   For each frame we call window.__seek(t) (no real-time dependency),
   screenshot, and pipe the PNG straight into ffmpeg. */
const puppeteer = require('puppeteer');
const ffmpegPath = require('@ffmpeg-installer/ffmpeg').path;
const { spawn } = require('child_process');
const path = require('path');

const W = 1920, H = 1080, FPS = 60;
// HTML lives one level up (vidyaai-theme/assets/demo/vidya-ai-demo.html)
const HTML = 'file://' + path.resolve(__dirname, '../vidya-ai-demo.html') + '?capture=1';
const OUT_SILENT = path.resolve(__dirname, 'vidya-silent.mp4');

(async () => {
  const browser = await puppeteer.launch({
    headless: 'new',
    args: ['--no-sandbox','--force-color-profile=srgb','--hide-scrollbars','--disable-gpu',
           `--window-size=${W},${H}`],
    defaultViewport: { width: W, height: H, deviceScaleFactor: 1 },
  });
  const page = await browser.newPage();
  await page.goto(HTML, { waitUntil: 'networkidle0', timeout: 60000 });
  // give web fonts a moment, then confirm they're ready
  await page.evaluate(() => document.fonts.ready);
  await new Promise(r => setTimeout(r, 400));

  const LOOP = await page.evaluate(() => window.__LOOP);
  const totalFrames = Math.round(LOOP / 1000 * FPS);
  console.log(`Rendering ${totalFrames} frames @ ${FPS}fps (${LOOP}ms loop) ${W}x${H}`);

  const ff = spawn(ffmpegPath, [
    '-y','-f','image2pipe','-framerate', String(FPS), '-i','pipe:0',
    '-c:v','libx264','-pix_fmt','yuv420p','-preset','slow','-crf','17',
    '-movflags','+faststart', OUT_SILENT
  ], { stdio: ['pipe','inherit','inherit'] });

  for (let f = 0; f < totalFrames; f++) {
    const t = f / FPS * 1000;
    await page.evaluate((tt) => window.__seek(tt), t);
    const buf = await page.screenshot({ type: 'png', optimizeForSpeed: true });
    if (!ff.stdin.write(buf)) await new Promise(r => ff.stdin.once('drain', r));
    if (f % 60 === 0) process.stdout.write(`\r  frame ${f}/${totalFrames}`);
  }
  ff.stdin.end();
  await new Promise((res, rej) => { ff.on('close', c => c===0?res():rej(new Error('ffmpeg '+c))); });
  await browser.close();
  console.log(`\nDone -> ${OUT_SILENT}`);
})().catch(e => { console.error(e); process.exit(1); });
