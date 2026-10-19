/**
 * Nukto Point - High-Precision Dual-Ring Magnetic Cursor
 */

(function () {
    'use strict';

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    const wrapper = document.getElementById('nkCursorWrapper') || document.querySelector('.nk-cursor-wrapper');
    const dot = document.getElementById('nkCursorDot') || document.querySelector('.nk-cursor-dot');
    const ring = document.getElementById('nkCursorRing') || document.querySelector('.nk-cursor-ring');

    if (!dot || !ring) return;

    let mouseX = window.innerWidth / 2;
    let mouseY = window.innerHeight / 2;
    let dotX = mouseX;
    let dotY = mouseY;
    let ringX = mouseX;
    let ringY = mouseY;

    let isHovering = false;
    let initialized = false;

    // Track mouse position
    window.addEventListener('mousemove', function (e) {
        mouseX = e.clientX;
        mouseY = e.clientY;

        if (!initialized) {
            initialized = true;
            document.body.classList.add('has-custom-cursor');
            dotX = mouseX;
            dotY = mouseY;
            ringX = mouseX;
            ringY = mouseY;
            if (wrapper) wrapper.style.display = 'block';
            dot.style.opacity = '1';
            ring.style.opacity = '1';
        }
    }, { passive: true });

    // Smooth lerp render loop
    function render() {
        if (initialized) {
            // Fast inner dot
            dotX += (mouseX - dotX) * 0.75;
            dotY += (mouseY - dotY) * 0.75;
            dot.style.transform = `translate3d(${dotX}px, ${dotY}px, 0) translate(-50%, -50%)`;

            // Smooth magnetic outer ring
            ringX += (mouseX - ringX) * 0.22;
            ringY += (mouseY - ringY) * 0.22;
            ring.style.transform = `translate3d(${ringX}px, ${ringY}px, 0) translate(-50%, -50%)`;
        }

        requestAnimationFrame(render);
    }
    requestAnimationFrame(render);

    // Interactive element hover handlers
    const interactiveSelectors = 'a, button, input, textarea, select, .nk-interactive, .nk-project-card, .nk-service-card, .nk-stat-card, .nk-physics-tag';

    document.addEventListener('mouseover', function (e) {
        if (e.target.closest(interactiveSelectors)) {
            isHovering = true;
            if (wrapper) wrapper.classList.add('is-hovering');
        }
    });

    document.addEventListener('mouseout', function (e) {
        if (e.target.closest(interactiveSelectors)) {
            isHovering = false;
            if (wrapper) wrapper.classList.remove('is-hovering');
        }
    });

    // Hide when mouse leaves window
    document.addEventListener('mouseleave', function () {
        dot.style.opacity = '0';
        ring.style.opacity = '0';
    });

    document.addEventListener('mouseenter', function () {
        if (initialized) {
            dot.style.opacity = '1';
            ring.style.opacity = '1';
        }
    });
})();
