/**
 * Nukto Point - Matter.js Interactive Tag Physics Playground
 * Replicates the bouncing, draggable brand skill tags in Buzz Interactive's footer.
 */

(function () {
    'use strict';

    function initPhysics() {
        const container = document.getElementById('nkTagCanvas') || document.getElementById('nkPhysicsWrap') || document.getElementById('nk-matter-container');
        if (!container || typeof Matter === 'undefined') return;

        // Module aliases
        const { Engine, Runner, Bodies, Composite, Mouse, MouseConstraint, Events } = Matter;

        // Container dimensions
        let width = container.clientWidth || (container.parentElement ? container.parentElement.clientWidth : window.innerWidth);
        let height = container.clientHeight || 220;

        if (width <= 0) width = 800;
        if (height <= 0) height = 220;

        // Create engine
        const engine = Engine.create({
            gravity: { x: 0, y: 0.9 }
        });
        const world = engine.world;

        // Create boundary walls
        const wallThickness = 120;
        let ground = Bodies.rectangle(width / 2, height + wallThickness / 2, width * 2, wallThickness, { isStatic: true });
        let leftWall = Bodies.rectangle(-wallThickness / 2, height / 2, wallThickness, height * 2, { isStatic: true });
        let rightWall = Bodies.rectangle(width + wallThickness / 2, height / 2, wallThickness, height * 2, { isStatic: true });

        Composite.add(world, [ground, leftWall, rightWall]);

        // Tag definitions matching Nukto Point's real services & credentials
        const tagLabels = [
            'Brand Identity',
            'Communication Design',
            'Amazon EBC / A+',
            'Visual Systems',
            'Packaging Design',
            'Social Media Campaigns',
            'SZABIST Faculty',
            '10+ Years Experience',
            'M.Phil Art & Design',
            'Nukto Point',
            'Outdoor Billboards'
        ];

        const tagElements = [];
        const tagBodies = [];

        // Build DOM tags and physics bodies
        tagLabels.forEach((label, i) => {
            const el = document.createElement('div');
            el.className = 'nk-physics-tag nk-interactive';
            el.textContent = label;
            container.appendChild(el);

            // Measure initial rendered size
            const rect = el.getBoundingClientRect();
            const tagW = Math.max(rect.width, 90);
            const tagH = Math.max(rect.height, 34);

            // Staggered initial spawn
            const spawnX = Math.random() * (width - tagW - 40) + tagW / 2 + 20;
            const spawnY = -40 - (i * 28);

            const body = Bodies.rectangle(spawnX, spawnY, tagW, tagH, {
                chamfer: { radius: 17 },
                restitution: 0.65,
                friction: 0.1,
                frictionAir: 0.02,
                density: 0.001
            });

            tagElements.push(el);
            tagBodies.push(body);
        });

        Composite.add(world, tagBodies);

        // Add Mouse & Touch constraint
        const mouse = Mouse.create(container);
        const mouseConstraint = MouseConstraint.create(engine, {
            mouse: mouse,
            constraint: {
                stiffness: 0.25,
                render: { visible: false }
            }
        });

        Composite.add(world, mouseConstraint);

        // Prevent page scroll hijack when dragging
        if (mouseConstraint.mouse.element) {
            mouseConstraint.mouse.element.removeEventListener('mousewheel', mouseConstraint.mouse.mousewheel);
            mouseConstraint.mouse.element.removeEventListener('DOMMouseScroll', mouseConstraint.mouse.mousewheel);
        }

        // Run the engine
        const runner = Runner.create();
        Runner.run(runner, engine);

        // Sync DOM elements to Matter.js bodies on each tick
        Events.on(engine, 'afterUpdate', function () {
            for (let i = 0; i < tagBodies.length; i++) {
                const body = tagBodies[i];
                const el = tagElements[i];
                const x = body.position.x - el.offsetWidth / 2;
                const y = body.position.y - el.offsetHeight / 2;
                const angle = body.angle;

                el.style.transform = `translate3d(${x}px, ${y}px, 0) rotate(${angle}rad)`;
            }
        });

        // Window resize handler
        let resizeTimer;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () {
                const newW = container.clientWidth || 800;
                const newH = container.clientHeight || 220;

                Matter.Body.setPosition(ground, { x: newW / 2, y: newH + wallThickness / 2 });
                Matter.Body.setPosition(rightWall, { x: newW + wallThickness / 2, y: newH / 2 });
            }, 200);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initPhysics);
    } else {
        initPhysics();
    }
})();
