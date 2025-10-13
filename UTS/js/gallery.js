let currentSlide = 0;
const slides = document.getElementById('slides');
const indicators = document.querySelectorAll('.indicator');
const totalSlides = 2;

function updateSlide() {
    slides.style.transform = `translateX(calc(-${currentSlide * 100}% - ${currentSlide * 40}px))`;
    indicators.forEach((indicator, index) => {
    indicator.classList.toggle('active', index === currentSlide);
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateSlide();
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    updateSlide();
}

function goToSlide(index) {
    currentSlide = index;
    updateSlide();
}
