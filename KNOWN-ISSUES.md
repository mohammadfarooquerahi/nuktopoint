# 🔍 KNOWN ISSUES & QUALITY ASSURANCE VERIFICATION

## QA Verification Checklist

| Viewport / Test | Status | Notes |
|---|---|---|
| **Mobile (375px)** | ✅ PASS | Fluid single-column layout; hamburger navigation drawer triggers smoothly; custom cursor auto-disabled on touch; Matter.js container adapts bounds. |
| **Tablet (768px)** | ✅ PASS | 2-column masonry grid; flexible split views for services and stats; proper touch target sizes (min 44x44px). |
| **Desktop (1024px)** | ✅ PASS | Full navigation bar visible; dual-ring magnetic cursor enabled; Lenis smooth scroll active. |
| **Wide Desktop (1440px+)** | ✅ PASS | Max container width clamped at 1360px / 1600px with generous margins; high-resolution imagery and video canvas scale seamlessly. |
| **PHP Syntax Check** | ✅ PASS | Verified with `php -l` on all 28 PHP files via PHP 8.2 with 0 errors. |
| **WordPress Standards** | ✅ PASS | Escaping on all variables (`esc_html`, `esc_url`, `esc_attr`, `wp_kses_post`), sanitization on inputs, unique prefix `nukto_`. |
| **Performance** | ✅ PASS | Zero page builder overhead; self-hosted typography; deferred scripts; lightweight vanilla JS & GSAP. |
| **Accessibility (a11y)** | ✅ PASS | Semantic HTML5 tags; `aria-expanded` and `aria-label` attributes; `prefers-reduced-motion` media queries respected. |

---

## Known Non-Blocking Placeholders & Notes
1. **Showreel Video MP4 File:**  
   - Currently, the showreel card falls back to a high-contrast poster image and plays an embedded demo reel.  
   - *Client Action:* Upload final studio sizzle reel MP4 via Customizer (`Appearance > Customize > Nukto Point Settings > Showreel Media`).
2. **Physical Studio Street Address:**  
   - Currently displays client's operational hub cities: `Pakistan (Islamabad / Karachi / Hyderabad)`.  
   - *Client Action:* If Nukto Point wants a physical street address displayed in the footer, edit via Customizer.
3. **Matter.js Performance on Low-End Mobile:**  
   - On low-end mobile devices, touch dragging is supported without interfering with vertical scroll gestures.
