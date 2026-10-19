# Design System & Project Specification — Nukto Point Theme

> **Theme Name:** Nukto Point (Creative Agency Theme)  
> **Reference Site:** https://www.buzzinteractive.co/  
> **Client Content:** https://www.behance.net/nukto-poin  
> **Architecture:** Bespoke WordPress Theme (No page builders, Vanilla JS / GSAP, Native Customizer & CPTs)

---

## 1. Brand Identity & Tokens

### Color Palette (Hex Codes)
* **Background Deep (Primary Dark):** `#080808` (rich obsidian black)
* **Background Card / Surface:** `#121212` (subtle dark gray for cards & containers)
* **Background Elevate / Secondary:** `#181818` (hover states, input fills)
* **Accent Primary (Signature Hot Pink / Fuchsia):** `#ff00a3` (matches Buzz Interactive signature accent, active states, text selection, hover effects)
* **Accent Glow:** `rgba(255, 0, 163, 0.35)`
* **Text Primary (High Contrast):** `#ffffff`
* **Text Muted / Gray:** `#9e9e9e`
* **Text Dark:** `#080808` (for light badges/chips)
* **Border Subtle:** `rgba(255, 255, 255, 0.12)`
* **Border Accent:** `rgba(255, 0, 163, 0.4)`

### Typography Scale
* **Primary Font Family:** `'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif`
* **Weights:** `300` (Light), `400` (Regular), `500` (Medium), `600` (Semi-Bold), `700` (Bold), `800` (Extra Bold), `900` (Black)
* **Display H1 (Hero):** `clamp(2.75rem, 6.5vw, 6.5rem)` | line-height: `1.05` | letter-spacing: `-0.03em` | weight: `700`
* **Heading H2 (Section):** `clamp(2.25rem, 4.5vw, 4.25rem)` | line-height: `1.15` | letter-spacing: `-0.02em` | weight: `700`
* **Heading H3 (Cards / Subheads):** `clamp(1.25rem, 2vw, 1.875rem)` | line-height: `1.25` | weight: `600`
* **Body Large:** `1.25rem (20px)` | line-height: `1.5`
* **Body Regular:** `1rem (16px)` | line-height: `1.6`
* **Body Small / Captions:** `0.875rem (14px)` | line-height: `1.4`
* **Chips / Badges:** `0.75rem (12px)` | weight: `600` | text-transform: `uppercase` | letter-spacing: `0.05em`

### Spacing Scale
* `--space-xs`: `0.5rem` (8px)
* `--space-sm`: `1rem` (16px)
* `--space-md`: `1.5rem` (24px)
* `--space-lg`: `3rem` (48px)
* `--space-xl`: `5rem` (80px)
* `--space-2xl`: `8rem` (128px)

### Breakpoints
* **Mobile Small:** `375px`
* **Mobile Large:** `480px`
* **Tablet:** `768px`
* **Desktop / Laptop:** `1024px`
* **Wide Desktop:** `1440px`
* **Container Max Width:** `1440px` (with `clamp(1.25rem, 4vw, 4rem)` padding)

---

## 2. Interactive & Motion Tokens

* **Smooth Scroll:** Lenis smooth scrolling with lerp `0.1` and wheel multiplier `0.5`.
* **Custom Cursor:** Custom dual-element cursor (center dot `#ff00a3` + outer smoothing ring) with hover expand on links, buttons, and cards.
* **Scroll-Triggered Hero Expand:** GSAP ScrollTrigger clip-path polygon expand matching reference video reveal.
* **Text Reveal Animation:** Split text skew/reveal with stagger.
* **Marquee Speed:** 25s continuous infinite CSS loop with pause on hover.
* **Interactive Physics Canvas:** Matter.js interactive gravity tag bounce canvas in footer.
