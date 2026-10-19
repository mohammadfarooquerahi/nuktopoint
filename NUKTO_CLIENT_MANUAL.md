# 📖 NUKTO POINT &mdash; Complete Website Operations & Client Handover Manual

Welcome to your official **Nukto Point** (`nuktopoint.com`) operations and management guide. This custom WordPress theme has been crafted from scratch to mirror the award-winning interactive aesthetics of **Buzz Interactive** while showcasing the authentic creative portfolio, academic credentials, and communication design work of **Nukto Point**.

This guide provides step-by-step instructions for editing website content, managing portfolio projects, monitoring contact inquiries, and customizing visual styles &mdash; **all without touching any code**.

---

## 📑 Table of Contents

1. [Logging In to Your WordPress Dashboard](#1-logging-in-to-your-wordpress-dashboard)
2. [Visual Homepage Customization (Live Customizer)](#2-visual-homepage-customization-live-customizer)
   - [Hero Section & Live Ticker](#a-hero-section--live-ticker)
   - [Showreel Video & Visual Reel](#b-showreel-video--visual-reel)
   - [Services Showcase](#c-services-showcase)
   - [About Studio & Leadership Bio](#d-about-studio--leadership-bio)
   - [Impact Statistics & Key Metrics](#e-impact-statistics--key-metrics)
   - [Contact Information & Social Links](#f-contact-information--social-links)
3. [Managing the Portfolio (Projects CPT)](#3-managing-the-portfolio-projects-cpt)
   - [Adding a New Project](#adding-a-new-project)
   - [Setting Featured Images & Cover Art](#setting-featured-images--cover-art)
   - [Project Categories & Taxonomy Filters](#project-categories--taxonomy-filters)
   - [Project Meta Fields (Client, Year, Disciplines, Live Link, Grid Size)](#project-meta-fields)
4. [Interactive Features & Visual Engines](#4-interactive-features--visual-engines)
   - [Custom Dual-Ring Magnetic Cursor](#custom-dual-ring-magnetic-cursor)
   - [Lenis Smooth Inertial Scrolling](#lenis-smooth-inertial-scrolling)
   - [Matter.js 2D Physics Footer Tag Cloud](#matterjs-2d-physics-footer-tag-cloud)
   - [Web Audio Synthesizer Toggle](#web-audio-synthesizer-toggle)
5. [Inquiries & Contact Form Submissions](#5-inquiries--contact-form-submissions)
   - [How the AJAX Contact Form Works](#how-the-ajax-contact-form-works)
   - [Changing Recipient Email Address](#changing-recipient-email-address)
   - [Form Nonce Security & Anti-Spam Protection](#form-nonce-security--anti-spam-protection)
6. [Navigation Menus & Header/Footer Links](#6-navigation-menus--headerfooter-links)
7. [SEO, Social Sharing & Media Guidelines](#7-seo-social-sharing--media-guidelines)
8. [Client Action Items & Placeholder Replacements](#8-client-action-items--placeholder-replacements)
9. [Routine Maintenance, Backups & Security](#9-routine-maintenance-backups--security)

---

## 1. Logging In to Your WordPress Dashboard

1. Open your web browser (Chrome, Edge, Safari, Firefox).
2. Navigate to your website admin URL:
   ```
   https://yourdomain.com/wp-admin
   ```
3. Enter your **Username / Email Address** and **Password**.
4. Click **Log In**.

> 💡 **Tip:** Bookmark the `/wp-admin` URL in your browser bookmark bar for instant access.

---

## 2. Visual Homepage Customization (Live Customizer)

All major sections on the homepage are fully editable with a real-time live preview.

**How to open the Live Customizer:**
1. In the left admin sidebar, click **Appearance > Customize**.
2. Click on **Nukto Point Settings**.
3. You will see dedicated panels corresponding to each section of your homepage.
4. When you finish editing, click the blue **Publish** button at the top left to save changes instantly.

---

### A. Hero Section & Live Ticker
*Controls the top ticker badge, massive typography headline, and hero lead text.*
- **Ticker Status Text:** (Default: `AVAILABLE FOR SELECT COMMISSIONS • Q1/Q2`)
- **Main Headline Line 1:** (Default: `COMMUNICATION DESIGN`)
- **Main Headline Line 2:** (Default: `THAT COMMANDS ATTENTION.`)
- **Hero Lead Description:** A concise 2-sentence mission statement summarizing your studio's unique positioning.

---

### B. Showreel Video & Visual Reel
*Controls the showreel preview card that expands on scroll and launches the high-res video modal.*
- **Showreel Title / Badge:** (Default: `NUKTO POINT REEL`)
- **Showreel Video MP4 URL:** Enter a direct link to an MP4 video file uploaded to your Media Library or external CDN.
- **Showreel Cover Image:** Select a high-resolution background poster for the video card.

---

### C. Services Showcase
*Controls the 4 interactive service cards.*
- **Service 1:** Title, Subtitle, and Deliverable Items (e.g. `Branding & Visual Identity`).
- **Service 2:** E-Commerce & Amazon Creative (A+ Content, packaging dielines, listing sets).
- **Service 3:** Advertising & Outdoor Print (Billboards, exhibition standees, brochures).
- **Service 4:** Social Media & Strategic Campaigns (Ad creatives, awareness visuals).

---

### D. About Studio & Leadership Bio
*Showcases your M.Phil degree, 10+ years experience, and institutional roles (SZABIST, Pak-Turk Maarif, Switch Studio).*
- **Section Badge:** (Default: `THE PHILOSOPHY`)
- **Studio Narrative:** Rich biographical statement explaining your creative ethos.
- **Client Avatar:** Profile photograph of the lead designer (`assets/images/branding/nukto-avatar.jpg`).

---

### E. Impact Statistics & Key Metrics
*Four counter metrics highlighting your studio achievements.*
- **Stat 1:** `10+` &mdash; Years of Professional Design Experience
- **Stat 2:** `66+` &mdash; Behance Appreciations
- **Stat 3:** `440+` &mdash; Project Views
- **Stat 4:** `98%` &mdash; Client Satisfaction Rate

---

### F. Contact Information & Social Links
*Controls the contact footer, direct links, and social media handles.*
- **Contact Email:** (Default: `nuktopoint@gmail.com`)
- **Contact Phone / WhatsApp:** (Default: `+92 324 3601950`)
- **Studio Locations:** Pakistan (Islamabad / Karachi / Hyderabad)
- **Behance Profile:** `https://www.behance.net/nukto-poin`
- **Instagram:** `https://www.instagram.com/nuktopoint`
- **Facebook:** `https://www.facebook.com/p/NUKTO-61560572120480/`

---

## 3. Managing the Portfolio (Projects CPT)

The theme features a dedicated **Projects** Custom Post Type engineered specifically for design case studies.

### Adding a New Project
1. In your WP Admin sidebar, navigate to **Projects > Add New Project**.
2. **Title:** Enter the project name (e.g., `Amazon A+ Content / EBC Brand Story Design`).
3. **Main Content Editor:** Write the case study narrative, project background, challenge, and solution.
4. **Excerpt:** Add a short 1-2 sentence preview description for card listings.

### Setting Featured Images & Cover Art
1. On the right sidebar, look for the **Featured Image** panel.
2. Click **Set featured image**.
3. Upload a high-resolution image (`1600x1200px` or `1920x1080px`, JPG/PNG/WebP).
4. Always provide descriptive **Alt Text** for SEO and accessibility.

### Project Categories & Taxonomy Filters
1. On the right sidebar, check one or more categories under **Project Categories**:
   - `Branding & Visual Identity`
   - `E-Commerce & Amazon Creative`
   - `Advertising & Print Media`
   - `Social Media & Campaigns`
   - `Brand Strategy & PR`
2. These categories automatically generate interactive filter pills on the Portfolio page (`/work/`).

### Project Meta Fields
Below the text editor, locate the **Project Details & Metadata** box:
- **Client Name:** (e.g., `SZABIST University`, `Apex Cutlery`, `D2C Brand`)
- **Project Year:** (e.g., `2024`)
- **Services / Disciplines:** (e.g., `Billboard, Large Format, Typography`)
- **External Behance / Live URL:** (Link to external gallery or live site)
- **Card Grid Size:**
  - `Regular (1 Column)` &mdash; Standard card size.
  - `Large (Spans 2 Columns)` &mdash; Highlighted hero card in masonry layout.

---

## 4. Interactive Features & Visual Engines

### Custom Dual-Ring Magnetic Cursor
- The mouse pointer is accompanied by a dual-ring reactive cursor.
- Automatically expands and snaps magnetically when hovering over buttons, links, project cards, and inputs.
- Automatically disabled on touchscreens, mobile devices, and for visitors who have enabled `prefers-reduced-motion` in their OS settings.

### Lenis Smooth Inertial Scrolling
- Uses hardware-accelerated smooth scrolling for an ultra-fluid editorial browsing experience.
- Synchronized natively with **GSAP ScrollTrigger** for scroll-driven animations.

### Matter.js 2D Physics Footer Tag Cloud
- In the footer, brand skill tags ("Brand Identity", "Amazon EBC", "SZABIST Visiting Faculty", "Nukto Point") are physical 2D bodies with gravity and bounce.
- Visitors can drag, fling, and collide the tags with their cursor or finger!

### Web Audio Synthesizer Toggle
- Clicking the audio equalizer icon in the header toggles a subtle, high-tech ambient audio drone generated in real-time via the browser's Web Audio API (no heavy MP3 audio files needed).

---

## 5. Inquiries & Contact Form Submissions

### How the AJAX Contact Form Works
- The contact form at the bottom of the homepage submits inquiries via asynchronous AJAX without reloading the page.
- Fields: **Full Name**, **Email Address**, **Service Required**, and **Project Brief / Message**.
- When submitted, the visitor sees an animated confirmation alert, and the form sends a formatted HTML email to your studio inbox.

### Changing Recipient Email Address
- By default, form submissions are sent to the email configured in **Appearance > Customize > Nukto Point Settings > Contact Info**, or the WordPress administration email address.

### Form Nonce Security & Anti-Spam Protection
- Every form submission includes a cryptographic WordPress Nonce token (`_nukto_contact_nonce`) to block automated spam bots and cross-site request forgery attacks.

---

## 6. Navigation Menus & Header/Footer Links

**To edit your navigation links:**
1. Navigate to **Appearance > Menus**.
2. Select **Primary Navigation** from the dropdown.
3. You can reorder, add, or rename links:
   - **Home:** `/#`
   - **Work:** `/#work` (or `/work/` for full directory)
   - **Services:** `/#services`
   - **About:** `/#about`
   - **Contact:** `/#contact`
4. Check the **Primary Menu** checkbox under Menu Settings and click **Save Menu**.

---

## 7. SEO, Social Sharing & Media Guidelines

### Image Guidelines
- **Project Covers:** Ideal size `1600x1200px` or `1920x1080px`, under 400KB per image.
- **Format:** WebP is recommended for maximum speed; PNG is best for graphics with crisp line art.
- **Alt Text:** Always describe the image contents for search engine crawlers.

### Social Meta Sharing
- The theme outputs semantic Open Graph meta tags (`og:title`, `og:description`, `og:image`, `og:url`) on single project case studies, ensuring rich link preview cards when shared on WhatsApp, LinkedIn, X/Twitter, or Facebook.

---

## 8. Client Action Items & Placeholder Replacements

Please review the following items documented in `/content/MISSING.md` to finalize your production rollout:

1. **Showreel Video MP4:** Upload your studio showreel MP4 video to your WordPress Media Library and enter its link in **Appearance > Customize > Showreel Media**.
2. **Physical Studio Address:** If you would like to display a specific street address in the footer rather than city names (`Islamabad / Karachi / Hyderabad`), update it in the Customizer.
3. **Video Client Testimonials:** If you have video endorsements or client quotes, update the testimonials in `template-parts/testimonials.php`.

---

## 9. Routine Maintenance, Backups & Security

- **WordPress Core Updates:** Keep WordPress updated to the latest version.
- **Backups:** Use a reliable backup solution (e.g. UpdraftPlus or your hosting provider's automated daily backups).
- **Security:** Use strong passwords, 2-Factor Authentication (2FA), and ensure SSL (HTTPS) is active on your domain.

---

© 2026 Nukto Point. Engineered for creative distinction.
