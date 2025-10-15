document.addEventListener("DOMContentLoaded", () => {
    const sections = document.querySelectorAll('.fade-up');
    const appearOptions = { threshold: 0.2 };

    const appearOnScroll = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        });
    }, appearOptions);

    sections.forEach((sec) => appearOnScroll.observe(sec));
});