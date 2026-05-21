document.addEventListener('DOMContentLoaded', () => {
    const clockRoot = document.querySelector('[data-clock]');

    if (!clockRoot) {
        return;
    }

    const timeElement = clockRoot.querySelector('[data-clock-time]');
    const dateElement = clockRoot.querySelector('[data-clock-date]');
    const startIso = clockRoot.dataset.clockIso;
    const timeZone = clockRoot.dataset.clockTimezoneId || undefined;

    if (!timeElement || !dateElement || !startIso) {
        return;
    }

    let current = new Date(startIso);

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

    const render = () => {
        timeElement.textContent = timeFormatter.format(current);
        dateElement.textContent = capitalizeFirstLetter(dateFormatter.format(current));
    };

    render();

    window.setInterval(() => {
        current = new Date(current.getTime() + 1000);
        render();
    }, 1000);
});