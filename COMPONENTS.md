# Component Registry — Nukto Point Theme

A running list of every template part and UI component built for the Nukto Point theme. Update this file whenever creating or modifying components.

---

## Component Master List

| Component | File Path | Dependencies | Status | Description |
| :--- | :--- | :--- | :--- | :--- |
| **Site Header & Nav** | `header.php` | `assets/css/main.css`, `assets/js/main.js` | Planned | Sticky glassmorphic navbar with logo, menu, mega dropdown, Work CTA button, mobile drawer |
| **Custom Cursor** | `template-parts/custom-cursor.php` | `assets/js/cursor.js` | Planned | Trailing magnetic circular cursor with link-hover scale effect |
| **Hero Showcase** | `template-parts/hero.php` | GSAP, ScrollTrigger, Customizer settings | Planned | Dynamic typography ticker + expanding showreel video container with sound toggle |
| **Client Marquee** | `template-parts/marquee.php` | CSS Keyframes, Customizer items | Planned | Infinite sliding marquee with partner/client logos and brand pill dividers |
| **Selected Work Grid**| `template-parts/work-grid.php` | CPT `project`, `template-parts/project-card.php` | Planned | Asymmetric modern layout matching reference with chip categories and hover video preview |
| **Project Card** | `template-parts/project-card.php` | `single-project.php` | Planned | Individual portfolio item with meta badges, cover image, and hover transition |
| **Services Section** | `template-parts/services.php` | GSAP ScrollTrigger, Customizer | Planned | Sticky split-screen presentation: left statement + right interactive service modules |
| **About & Agency Stats**| `template-parts/about.php` | IntersectionObserver Counter, Customizer | Planned | Founder narrative + dynamic counting metrics (10+ Yrs, 440+ Views, 98% Satisfaction) |
| **Reviews Slider** | `template-parts/testimonials.php` | Swiper / Lightweight slider | Planned | Testimonial carousel with client avatar, company role, and pink pill pagination |
| **Contact Form** | `template-parts/contact-form.php`| `inc/helpers.php` (AJAX/Nonce) | Planned | Interactive form with budget radio pills, service checkboxes, validation |
| **Footer & Physics** | `footer.php`, `template-parts/footer-canvas.php` | Matter.js | Planned | Multi-city locations (Islamabad, Karachi, Hyderabad), physics canvas, back-to-top |
