# 🎯 NUKTO POINT — Custom WordPress Theme

> **"Think Big. Create Bold. Make Something Matter."**  
> An avant-garde, ultra-dark WordPress theme built from scratch for elite creative studios, art directors, and communication designers. Visually and interactively inspired by **Buzz Interactive** (`buzzinteractive.co`) and populated with real portfolio work and credentials from **Nukto Point** (`behance.net/nukto-poin`).

---

## ⚡ Highlights & Key Features

- **No Page Builders, No Bloat:** Zero Elementor, zero WPBakery, zero starter-theme baggage. Pure semantic HTML5, modern CSS custom properties, and native WordPress template architecture.
- **Visual Design Identity:**
  - Ultra-dark aesthetic: Canvas background `#080808` with signature electric magenta accents (`#ff00a3`).
  - Strict typographic scale powered by Google Fonts *Montserrat*.
- **Cutting-Edge Interactive Dynamics:**
  - **Custom Dual-Ring Magnetic Cursor:** Lerp-smoothed outer ring, responsive hover states, dynamic text labels (`VIEW`, `PLAY`, `EXPLORE`), and touch-device auto-disabling.
  - **Lenis Smooth Scroll:** Hardware-accelerated inertial scrolling synchronized with GSAP ScrollTrigger.
  - **GSAP Hero Showreel Expander:** Smooth scale-up transitions from embedded card to full-screen view.
  - **Matter.js 2D Physics Playground:** Interactive falling, bouncing, and draggable brand skill tags in the footer.
  - **Web Audio Engine:** Subtle synthesized ambient sound hum toggle in header with animated visual frequency bars.
- **Comprehensive WordPress Architecture:**
  - Custom Post Type `project` with taxonomy `project_category`.
  - Custom Meta Boxes: Client Name, Year, Disciplines / Services, External Link, Card Grid Size (`large` vs `regular`).
  - Customizer Panel: Real-time visual controls for hero ticker, big typography, showreel video, about narrative, metrics, contacts, and social links.
  - AJAX Contact Form: Nonce verification, input sanitization, and automated `wp_mail` transmission.
  - Accessibility & Performance: Mobile-first responsive breakpoints (375px, 768px, 1024px, 1440px), prefers-reduced-motion support, keyboard navigation.

---

## 📁 Repository & Directory Layout

```
nukto/
├── nukto-theme/                     # Production WordPress Theme Root
│   ├── assets/
│   │   ├── css/
│   │   ├── js/
│   │   │   ├── cursor.js            # Custom dual-ring magnetic cursor
│   │   │   ├── physics.js           # Matter.js 2D physics tag playground
│   │   │   └── main.js              # Lenis, GSAP, Preloader, Audio, AJAX Form
│   │   └── images/
│   │       ├── branding/            # Nukto avatar & brand assets
│   │       └── projects/            # 12 real Behance portfolio project covers
│   ├── inc/
│   │   ├── custom-post-types.php    # CPT 'project' & taxonomy 'project_category'
│   │   ├── customizer.php           # Real-time Customizer controls
│   │   ├── enqueue.php              # Scripts, styles & external libraries
│   │   └── helpers.php              # AJAX form handler & formatting helpers
│   ├── template-parts/
│   │   ├── custom-cursor.php
│   │   ├── preloader.php
│   │   ├── hero.php
│   │   ├── marquee.php
│   │   ├── project-card.php
│   │   ├── work-grid.php
│   │   ├── services.php
│   │   ├── about.php
│   │   ├── stats.php
│   │   ├── testimonials.php
│   │   ├── contact-form.php
│   │   └── footer-canvas.php
│   ├── style.css                    # Complete responsive CSS design system
│   ├── functions.php                # Theme setup, image sizes, nav menus
│   ├── header.php
│   ├── footer.php
│   ├── front-page.php               # Homepage orchestration
│   ├── single-project.php           # Detailed case study view
│   ├── archive-project.php          # Category-filterable portfolio directory
│   ├── page.php
│   ├── single.php
│   ├── archive.php
│   ├── index.php
│   ├── 404.php
│   ├── search.php
│   ├── searchform.php
│   ├── readme.txt
│   └── screenshot.png               # 1200x900 theme preview
├── wp-content/themes/nukto-theme/   # Mirrored installable theme path
├── content/
│   ├── content.json                 # Structured client data & 12 projects
│   ├── import.xml                   # WXR 1.2 WordPress importable file
│   ├── import-content.php           # Turnkey WP-CLI / PHP import script
│   └── MISSING.md                   # Documented client placeholders
├── nukto-theme.zip                  # Distributable ready-to-upload theme zip
├── PROJECT-SPEC.md                  # Design tokens, typography & specs
├── COMPONENTS.md                    # Component inventory & dependencies
├── CHANGELOG.md                     # File changelog & revision history
├── KNOWN-ISSUES.md                  # QA verification & cross-browser notes
└── NUKTO_CLIENT_MANUAL.md           # Client handover and operations manual
```

---

## 🚀 Quick Setup & Installation

### Option 1: WordPress Dashboard Upload (Recommended)
1. Download `nukto-theme.zip`.
2. Log into your WordPress Admin (`/wp-admin`).
3. Navigate to **Appearance > Themes > Add New > Upload Theme**.
4. Choose `nukto-theme.zip` and click **Install Now**.
5. Click **Activate**.

### Option 2: Turnkey Behance Content Import
To populate the 12 Behance projects, categories, core pages, and navigation menus:
- **Via WP-CLI:**
  ```bash
  wp eval-file content/import-content.php
  ```
- **Via WordPress Admin:**
  1. Go to **Tools > Import > WordPress**.
  2. Upload `content/import.xml`.
  3. Assign posts to your admin user and check "Download and import file attachments".

---

## 🎨 Content Customization

Navigate to **Appearance > Customize > Nukto Point Settings**:
- **Hero & Ticker:** Edit the live ticker status, main headline, and showreel caption.
- **Showreel Media:** Set custom MP4/WebM video URL or YouTube/Vimeo embed.
- **Services Showcase:** Customize 4 core agency discipline cards.
- **About & Philosophy:** Edit the biography, academic credentials (M.Phil, SZABIST), and location.
- **Key Metrics:** Update years of experience, appreciation count, project views, and client satisfaction rate.
- **Contact Info & Socials:** Update email (`nuktopoint@gmail.com`), phone (`+92 324 3601950`), and social links.

---

## 🛡️ Code Quality & Standards

- **Escaping & Sanitization:** 100% compliant with WordPress standards (`esc_html`, `esc_url`, `esc_attr`, `wp_kses_post`, `sanitize_text_field`).
- **PHP Syntax:** All PHP files verified with zero syntax errors (`php -l`).
- **Translation Ready:** Full text domain support (`nukto-point`).
- **Unique Prefixing:** All functions, hooks, and handles prefixed with `nukto_`.

---

© 2026 Nukto Point. Engineered with pride.
