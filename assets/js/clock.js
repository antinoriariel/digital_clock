document.addEventListener('DOMContentLoaded', () => {
    const clockRoot = document.querySelector('[data-clock]');

    if (!clockRoot) {
        return;
    }

    const timeElement = clockRoot.querySelector('[data-clock-time]');
    const dateElement = clockRoot.querySelector('[data-clock-date]');
    const timezoneElement = clockRoot.querySelector('[data-clock-timezone]');
    const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone || 'UTC';

    if (!timeElement || !dateElement) {
        return;
    }

    if (timezoneElement) {
        timezoneElement.textContent = timeZone;
    }

    const timeFormatter = new Intl.DateTimeFormat('es-ES', {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false,
        timeZone,
    });

    const dateFormatter = new Intl.DateTimeFormat('es-ES', {
        weekday: 'long',
        day: '2-digit',
        month: 'long',
        year: 'numeric',
        timeZone,
    });

    const capitalizeFirstLetter = (value) => value.charAt(0).toUpperCase() + value.slice(1);

    const renderClock = () => {
        const now = new Date();
        timeElement.textContent = timeFormatter.format(now);
        dateElement.textContent = capitalizeFirstLetter(dateFormatter.format(now));
    };

    renderClock();
    window.setInterval(renderClock, 1000);

    const movementState = {
        x: 0,
        y: 0,
        vx: 180,
        vy: 140,
        width: 0,
        height: 0,
        ready: false,
    };

    const measure = () => {
        const rect = clockRoot.getBoundingClientRect();
        movementState.width = rect.width;
        movementState.height = rect.height;
    };

    const randomDirection = () => (Math.random() < 0.5 ? -1 : 1);
    const randomSpeed = (base, variance) => base + Math.random() * variance;

    const setTransform = () => {
        clockRoot.style.transform = `translate3d(${Math.round(movementState.x)}px, ${Math.round(movementState.y)}px, 0)`;
    };

    const placeInitialPosition = () => {
        measure();

        const maxX = Math.max(0, window.innerWidth - movementState.width);
        const maxY = Math.max(0, window.innerHeight - movementState.height);

        movementState.x = Math.random() * maxX;
        movementState.y = Math.random() * maxY;
        movementState.vx = randomDirection() * randomSpeed(160, 90);
        movementState.vy = randomDirection() * randomSpeed(120, 70);
        movementState.ready = true;

        setTransform();
    };

    const keepInsideViewport = () => {
        const maxX = Math.max(0, window.innerWidth - movementState.width);
        const maxY = Math.max(0, window.innerHeight - movementState.height);

        if (movementState.x < 0) {
            movementState.x = 0;
            movementState.vx = Math.abs(movementState.vx);
        } else if (movementState.x > maxX) {
            movementState.x = maxX;
            movementState.vx = -Math.abs(movementState.vx);
        }

        if (movementState.y < 0) {
            movementState.y = 0;
            movementState.vy = Math.abs(movementState.vy);
        } else if (movementState.y > maxY) {
            movementState.y = maxY;
            movementState.vy = -Math.abs(movementState.vy);
        }
    };

    let previousFrame = performance.now();

    const animate = (timestamp) => {
        const deltaSeconds = Math.min((timestamp - previousFrame) / 1000, 0.05);
        previousFrame = timestamp;

        measure();

        if (!movementState.ready) {
            placeInitialPosition();
        } else {
            const maxX = Math.max(0, window.innerWidth - movementState.width);
            const maxY = Math.max(0, window.innerHeight - movementState.height);

            movementState.x += movementState.vx * deltaSeconds;
            movementState.y += movementState.vy * deltaSeconds;

            if (movementState.x <= 0 || movementState.x >= maxX) {
                movementState.vx *= -1;
            }

            if (movementState.y <= 0 || movementState.y >= maxY) {
                movementState.vy *= -1;
            }

            keepInsideViewport();
            setTransform();
        }

        window.requestAnimationFrame(animate);
    };

    window.addEventListener('resize', () => {
        measure();
        keepInsideViewport();
        setTransform();
    });

    window.requestAnimationFrame(animate);
});
