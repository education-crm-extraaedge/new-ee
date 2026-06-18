#!/usr/bin/env python3
"""Synthesize the VidyaAI demo soundtrack (15s, 48k stereo) -> WAV.
Cinematic ambient pad + UI micro-interactions timed to the visual timeline."""
import numpy as np, wave, struct

SR=48000; DUR=15.0; N=int(SR*DUR)
t=np.arange(N)/SR
L=np.zeros(N); R=np.zeros(N)

def add(buf, start, sig, gain=1.0):
    i=int(start*SR); j=min(i+len(sig), N)
    if i<N: buf[i:j]+=sig[:j-i]*gain

def env(n, a, d, s, r, sus=0.7):
    e=np.ones(n); ai=int(a*SR); di=int(d*SR); ri=int(r*SR)
    if ai: e[:ai]=np.linspace(0,1,ai)
    if di: e[ai:ai+di]=np.linspace(1,sus,di)
    e[ai+di:n-ri]=sus
    if ri: e[n-ri:]=np.linspace(sus,0,ri)
    return e

def tone(f, dur, a=.005, d=.04, r=.06, sus=.5, partials=(1,)):
    n=int(dur*SR); tt=np.arange(n)/SR; w=np.zeros(n)
    for k,amp in enumerate(partials,1):
        w+=amp*np.sin(2*np.pi*f*k*tt)
    return w*env(n,a,d,SR and r,r,sus)

def noise_whoosh(dur, f0=200, f1=2600, gain=1.0):
    n=int(dur*SR); tt=np.arange(n)/SR
    nz=np.random.randn(n)
    # sweepy bandpass-ish via moving cosine gate + lowpass smoothing
    from numpy import convolve
    k=np.ones(220)/220; nz=convolve(nz,k,'same')
    sweep=np.sin(np.pi*tt/dur)  # rise-fall
    e=env(n,0.04,0.0,0.6,dur*0.55,0.9)
    return nz*sweep*e*gain

def click(freq=1700, dur=0.05, gain=0.5):
    n=int(dur*SR); tt=np.arange(n)/SR
    w=np.sin(2*np.pi*freq*tt)*np.exp(-tt*60)
    return w*gain

def blip(freq=880, dur=0.13, gain=0.4):
    n=int(dur*SR); tt=np.arange(n)/SR
    w=(np.sin(2*np.pi*freq*tt)+0.4*np.sin(2*np.pi*freq*2*tt))*np.exp(-tt*16)
    return w*gain

# ---------- 1. ambient cinematic pad (whole clip) ----------
pad=np.zeros(N)
for f,a in [(55,0.5),(110,0.32),(165,0.16),(220,0.12),(330,0.07)]:
    detune=1+0.0015*np.sin(2*np.pi*0.07*t + f)
    pad+=a*np.sin(2*np.pi*f*detune*t)
# slow swell + gentle breathing, fade in/out for seamless loop
swell=0.5+0.5*np.sin(2*np.pi*(t/DUR)-np.pi/2)        # 0->1->0 over clip
breath=0.85+0.15*np.sin(2*np.pi*0.18*t)
amp=np.ones(N); fi=int(0.6*SR); fo=int(1.2*SR)
amp[:fi]=np.linspace(0,1,fi); amp[-fo:]=np.linspace(1,0,fo)
pad*= (0.16*(0.4+0.6*swell))*breath*amp
# subtle airy shimmer
shimmer=0.03*np.sin(2*np.pi*1320*t)*(0.5+0.5*np.sin(2*np.pi*0.5*t))*amp
pad+=shimmer
L+=pad; R+=pad*0.98

# ---------- 2. soft intro swell hit (window appears ~0.2s) ----------
add(L,0.15, noise_whoosh(0.9,120,1400,0.10)); add(R,0.18, noise_whoosh(0.9,120,1400,0.10))

# ---------- 3. typing ticks (2.30 -> 4.40s) ----------
rng=np.random.default_rng(7)
tt=2.30
while tt<4.40:
    f=1500+rng.uniform(-300,300)
    c=click(f,0.035,0.16*rng.uniform(0.7,1.1))
    add(L,tt,c); add(R,tt,c*0.9)
    tt+=rng.uniform(0.045,0.085)

# ---------- 4. send whoosh + student bubble (4.50s) ----------
add(L,4.48, noise_whoosh(0.5,300,3000,0.22)); add(R,4.50, noise_whoosh(0.5,300,3000,0.22))
add(L,4.55, blip(660,0.12,0.18)); add(R,4.55, blip(660,0.12,0.18))

# ---------- 5. AI typing dots soft ticks (5.0-5.7) + response pop (5.75) ----------
for k,tt in enumerate(np.arange(5.05,5.7,0.18)):
    c=click(900,0.05,0.07); add(L,tt,c); add(R,tt,c)
add(L,5.73, noise_whoosh(0.45,200,2200,0.16)); add(R,5.75, noise_whoosh(0.45,200,2200,0.16))
# chime — pleasant two-note (reply ready)
add(L,5.80, blip(784,0.22,0.16)); add(R,5.80, blip(784,0.22,0.16))
add(L,5.92, blip(1175,0.26,0.13)); add(R,5.92, blip(1175,0.26,0.13))
# badge tick (6.5)
add(L,6.5, click(2200,0.05,0.12)); add(R,6.5, click(2200,0.05,0.12))

# ---------- 6. smart-action bubble + button clicks (9.0,9.55,9.72) ----------
add(L,9.0, noise_whoosh(0.4,200,2000,0.13)); add(R,9.0, noise_whoosh(0.4,200,2000,0.13))
add(L,9.55, click(1400,0.06,0.18)); add(R,9.55, click(1400,0.06,0.18))
add(L,9.72, click(1100,0.06,0.15)); add(R,9.72, click(1100,0.06,0.15))

# ---------- 7. automation panel slide-in whoosh (12.05) ----------
add(L,12.0, noise_whoosh(0.7,160,2600,0.24)); add(R,12.05, noise_whoosh(0.7,160,2600,0.24))
# score count ticks (12.8-13.6)
for tt in np.arange(12.82,13.6,0.07):
    c=click(1300,0.03,0.05); add(L,tt,c); add(R,tt,c)
# tags pop
add(L,13.35, blip(990,0.12,0.10)); add(R,13.5, blip(1240,0.12,0.10))

# ---------- 8. counsellor notification chime (13.65) ----------
for off,f in [(0,659),(0.10,988),(0.20,1319)]:
    add(L,13.65+off, blip(f,0.34,0.18)); add(R,13.65+off, blip(f,0.34,0.18))

# ---------- 9. final logo swell (14.1) ----------
add(L,14.05, noise_whoosh(1.0,80,1600,0.14)); add(R,14.05, noise_whoosh(1.0,80,1600,0.14))
add(L,14.2, tone(330,0.8,0.06,0.1,0.5,0.5,(1,0.5,0.25))*0.12)
add(R,14.2, tone(330,0.8,0.06,0.1,0.5,0.5,(1,0.5,0.25))*0.12)

# ---------- master: soft-clip limiter + tiny stereo width ----------
def finish(x):
    x=np.tanh(x*1.1)*0.92
    return x
L=finish(L); R=finish(R)
peak=max(np.max(np.abs(L)),np.max(np.abs(R)),1e-6)
L*=0.95/peak; R*=0.95/peak

inter=np.empty(N*2,dtype=np.int16)
inter[0::2]=np.clip(L*32767,-32768,32767).astype(np.int16)
inter[1::2]=np.clip(R*32767,-32768,32767).astype(np.int16)
import os
OUT_WAV=os.path.join(os.path.dirname(os.path.abspath(__file__)),'vidya-audio.wav')
with wave.open(OUT_WAV,'wb') as wf:
    wf.setnchannels(2); wf.setsampwidth(2); wf.setframerate(SR)
    wf.writeframes(inter.tobytes())
print("wrote vidya-audio.wav", DUR, "s")
