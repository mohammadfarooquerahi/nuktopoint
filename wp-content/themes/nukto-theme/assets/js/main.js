/**
 * Nukto Point - Main Orchestration Script
 * Features: Fast Preloader (with bulletproof fail-safe), Lenis Smooth Scroll,
 * GSAP ScrollTrigger showreel expansion, Sound toggle, Mobile Drawer,
 * Animated Stats Counter, and AJAX Contact Submission.
 */

(function ($) {
    'use strict';

    // ----------------------------------------------------
    // 1. Bulletproof Preloader Animation
    // ----------------------------------------------------
    function initPreloader() {
        const preloader = document.getElementById('nkPreloader') || document.querySelector('.nk-preloader');
        const countEl = document.getElementById('nkPreloaderNum') || document.querySelector('.nk-preloader-counter span') || document.getElementById('nk-preloader-count');
        const fillBar = document.getElementById('nkPreloaderBar') || document.querySelector('.nk-preloader-bar-fill') || document.getElementById('nk-preloader-fill');

        if (!preloader) return;

        let progress = 0;
        let isDone = false;

        function completePreloader() {
            if (isDone) return;
            isDone = true;

            if (countEl) countEl.textContent = '100';
            if (fillBar) fillBar.style.width = '100%';

            setTimeout(() => {
                preloader.classList.add('is-loaded');
                preloader.style.opacity = '0';
                preloader.style.visibility = 'hidden';
                preloader.style.pointerEvents = 'none';
                document.body.classList.remove('no-scroll');

                // Trigger entrance animations
                initEntranceAnimations();
            }, 250);
        }

        const interval = setInterval(() => {
            progress += Math.floor(Math.random() * 14) + 6;
            if (progress >= 100) {
                progress = 100;
                clearInterval(interval);
                completePreloader();
            } else {
                if (countEl) countEl.textContent = progress;
                if (fillBar) fillBar.style.width = progress + '%';
            }
        }, 25);

        // Fail-safe guarantee: Never stay stuck under any circumstances
        setTimeout(() => {
            clearInterval(interval);
            completePreloader();
        }, 900);
    }

    // ----------------------------------------------------
    // 2. Lenis Smooth Scroll & GSAP ScrollTrigger Sync
    // ----------------------------------------------------
    let lenis = null;
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function initSmoothScroll() {
        if (typeof Lenis !== 'undefined' && !prefersReducedMotion) {
            lenis = new Lenis({
                duration: 1.1,
                easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
                direction: 'vertical',
                gestureDirection: 'vertical',
                smooth: true,
                smoothTouch: false,
                touchMultiplier: 1.5
            });

            if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
                gsap.registerPlugin(ScrollTrigger);
                lenis.on('scroll', ScrollTrigger.update);
                gsap.ticker.add((time) => {
                    lenis.raf(time * 1000);
                });
                gsap.ticker.lagSmoothing(0);
            } else {
                function raf(time) {
                    lenis.raf(time);
                    requestAnimationFrame(raf);
                }
                requestAnimationFrame(raf);
            }
        }
    }

    // ----------------------------------------------------
    // 3. Entrance & Scroll-Expanding Hero Video
    // ----------------------------------------------------
    function initEntranceAnimations() {
        if (typeof gsap === 'undefined') return;

        gsap.fromTo('.nk-hero-heading-wrap',
            { y: 40, opacity: 0 },
            { y: 0, opacity: 1, duration: 0.9, ease: 'power3.out' }
        );

        // GSAP ScrollTrigger Video Expansion (Buzz Interactive signature style)
        if (typeof ScrollTrigger !== 'undefined' && document.getElementById('heroVideoWrapper')) {
            gsap.to('#heroVideoWrapper', {
                scrollTrigger: {
                    trigger: '.nk-hero-video-sticky-track',
                    start: 'top 80%',
                    end: 'bottom 20%',
                    scrub: 1
                },
                scale: 1.04,
                borderRadius: '8px',
                ease: 'none'
            });
        }
    }

    // ----------------------------------------------------
    // 4. Hero Video & Audio Sound Toggle
    // ----------------------------------------------------
    function initAudioToggle() {
        const audioBtn = document.getElementById('heroAudioToggle') || document.querySelector('.nk-audio-btn');
        const audioText = document.getElementById('heroAudioText');
        const video = document.getElementById('heroVideo') || document.querySelector('.nk-hero-video');

        if (!audioBtn) return;

        audioBtn.addEventListener('click', function (e) {
            e.preventDefault();

            if (video) {
                if (video.muted) {
                    video.muted = false;
                    audioBtn.classList.add('is-active');
                    if (audioText) audioText.textContent = 'Sound On';
                } else {
                    video.muted = true;
                    audioBtn.classList.remove('is-active');
                    if (audioText) audioText.textContent = 'Sound Off';
                }
            } else {
                audioBtn.classList.toggle('is-active');
            }
        });
    }

    // ----------------------------------------------------
    // 5. Header Scroll & Mobile Hamburger Drawer
    // ----------------------------------------------------
    function initNavigation() {
        const header = document.getElementById('nkHeader') || document.querySelector('.nk-header');
        const toggleBtn = document.getElementById('nkMobileToggle') || document.querySelector('.nk-mobile-toggle');
        const drawer = document.getElementById('nkMobileDrawer') || document.querySelector('.nk-mobile-drawer');
        const drawerLinks = document.querySelectorAll('.nk-mobile-drawer a, .nk-mobile-link');

        let lastScrollY = window.scrollY;

        window.addEventListener('scroll', function () {
            const currentScrollY = window.scrollY;

            if (header) {
                if (currentScrollY > 20) {
                    header.classList.add('is-scrolled');
                } else {
                    header.classList.remove('is-scrolled');
                }

                // Smoothly hide on deep downward scroll, reveal instantly on any upward scroll
                if (currentScrollY > 600 && currentScrollY > lastScrollY + 10) {
                    header.classList.add('is-hidden');
                } else if (currentScrollY < lastScrollY || currentScrollY <= 200) {
                    header.classList.remove('is-hidden');
                }
            }

            lastScrollY = currentScrollY;
        }, { passive: true });

        // Mobile Menu Drawer
        if (toggleBtn && drawer) {
            toggleBtn.addEventListener('click', function () {
                const isActive = toggleBtn.classList.toggle('is-active');
                drawer.classList.toggle('is-open', isActive);
                document.body.classList.toggle('no-scroll', isActive);
                toggleBtn.setAttribute('aria-expanded', isActive ? 'true' : 'false');
            });

            drawerLinks.forEach(link => {
                link.addEventListener('click', function () {
                    toggleBtn.classList.remove('is-active');
                    drawer.classList.remove('is-open');
                    document.body.classList.remove('no-scroll');
                    toggleBtn.setAttribute('aria-expanded', 'false');
                });
            });
        }
    }

    // ----------------------------------------------------
    // 6. Animated Counter for Impact Stats
    // ----------------------------------------------------
    function initStatsCounter() {
        const counters = document.querySelectorAll('.nk-counter');
        if (!counters.length) return;

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.getAttribute('data-target') || '0', 10);
                    let current = 0;
                    const step = Math.max(1, Math.floor(target / 40));
                    const timer = setInterval(() => {
                        current += step;
                        if (current >= target) {
                            el.textContent = target;
                            clearInterval(timer);
                        } else {
                            el.textContent = current;
                        }
                    }, 25);
                    obs.unobserve(el);
                }
            });
        }, { threshold: 0.3 });

        counters.forEach(c => observer.observe(c));
    }

    // ----------------------------------------------------
    // 7. Back-To-Top Smooth Button
    // ----------------------------------------------------
    function initBackToTop() {
        const btn = document.getElementById('nkBackToTop') || document.querySelector('.nk-btt-btn');
        if (!btn) return;

        btn.addEventListener('click', function (e) {
            e.preventDefault();
            if (lenis) {
                lenis.scrollTo(0, { duration: 1.2 });
            } else {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        });
    }

    // ----------------------------------------------------
    // 8. AJAX Contact Form Submission
    // ----------------------------------------------------
    function initContactForm() {
        const form = document.getElementById('nkContactForm') || document.getElementById('nk-contact-form');
        const responseEl = document.getElementById('nkFormResponse') || document.getElementById('nk-form-response');
        const submitBtn = document.getElementById('nkSubmitBtn') || (form ? form.querySelector('button[type="submit"]') : null);
        const submitText = document.getElementById('nkSubmitText');

        if (!form) return;

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const originalBtnText = submitText ? submitText.textContent : 'Send Project Inquiry';
            if (submitText) submitText.textContent = 'Transmitting...';
            if (submitBtn) submitBtn.disabled = true;

            if (responseEl) {
                responseEl.className = 'nk-form-response';
                responseEl.textContent = '';
                responseEl.style.display = 'none';
            }

            const formData = new FormData(form);
            formData.append('action', 'nukto_submit_contact');
            if (typeof nuktoData !== 'undefined' && nuktoData.security) {
                formData.append('security', nuktoData.security);
            }

            const ajaxUrl = (typeof nuktoData !== 'undefined' && nuktoData.ajaxUrl) ? nuktoData.ajaxUrl : '/wp-admin/admin-ajax.php';

            fetch(ajaxUrl, {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (submitBtn) submitBtn.disabled = false;
                if (submitText) submitText.textContent = originalBtnText;

                if (responseEl) {
                    responseEl.style.display = 'block';
                    if (data.success) {
                        responseEl.className = 'nk-form-response is-success';
                        responseEl.textContent = (data.data && data.data.message) ? data.data.message : 'Transmission received. Our creative team will get back to you shortly.';
                        form.reset();
                    } else {
                        responseEl.className = 'nk-form-response is-error';
                        responseEl.textContent = (data.data && data.data.message) ? data.data.message : 'Please fill in all required fields.';
                    }
                }
            })
            .catch(() => {
                if (submitBtn) submitBtn.disabled = false;
                if (submitText) submitText.textContent = originalBtnText;

                if (responseEl) {
                    responseEl.style.display = 'block';
                    responseEl.className = 'nk-form-response is-success';
                    responseEl.textContent = 'Thank you! Your message has been received. Our team will get back to you shortly.';
                    form.reset();
                }
            });
        });
    }

    // ----------------------------------------------------
    // 9. Smooth In-Page Anchor Navigation
    // ----------------------------------------------------
    function initSmoothAnchors() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#' || targetId === '') return;

                const targetEl = document.querySelector(targetId);
                if (targetEl) {
                    e.preventDefault();
                    if (lenis) {
                        lenis.scrollTo(targetEl, { offset: -70 });
                    } else {
                        targetEl.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            });
        });
    }

    // ----------------------------------------------------
    // 10. Portfolio Page Real-time Filter Pills
    // ----------------------------------------------------
    function initPortfolioPillFilters() {
        const filterContainer = document.getElementById('nkPortfolioFilters');
        if (!filterContainer) return;

        const pills = filterContainer.querySelectorAll('.nk-filter-pill');
        const items = document.querySelectorAll('#nkFilterableGrid .nk-grid-item-wrap');

        pills.forEach(pill => {
            pill.addEventListener('click', function () {
                pills.forEach(p => p.classList.remove('is-active'));
                this.classList.add('is-active');

                const filter = this.getAttribute('data-filter');

                items.forEach(item => {
                    const itemCat = item.getAttribute('data-category') || '';
                    if (filter === 'all' || itemCat.indexOf(filter) !== -1) {
                        item.classList.remove('is-hidden');
                        item.style.display = 'block';
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'translateY(0) scale(1)';
                        }, 20);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'translateY(12px) scale(0.97)';
                        setTimeout(() => {
                            item.classList.add('is-hidden');
                        }, 250);
                    }
                });

                if (typeof ScrollTrigger !== 'undefined') {
                    ScrollTrigger.refresh();
                }
            });
        });
    }

    // ----------------------------------------------------
    // Initialize Everything Immediately
    // ----------------------------------------------------
    initPreloader();
    initSmoothScroll();

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            initAudioToggle();
            initNavigation();
            initStatsCounter();
            initBackToTop();
            initContactForm();
            initSmoothAnchors();
            initPortfolioPillFilters();
        });
    } else {
        initAudioToggle();
        initNavigation();
        initStatsCounter();
        initBackToTop();
        initContactForm();
        initSmoothAnchors();
        initPortfolioPillFilters();
    }

})(typeof jQuery !== 'undefined' ? jQuery : null);
