document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.page-carousel-container');
    if (!carousel) {
        return;
    }

    const slides = carousel.querySelectorAll('.page-carousel-slide');
    let currentSlide = 0;

    if (slides.length > 0) {
        slides[0].classList.add('active');
        slides[0].style.opacity = 1;

        setInterval(() => {
            slides[currentSlide].style.opacity = 0;
            slides[currentSlide].classList.remove('active');

            currentSlide = (currentSlide + 1) % slides.length;

            slides[currentSlide].classList.add('active');
            // Force reflow to restart animation/transition
            void slides[currentSlide].offsetWidth;
            slides[currentSlide].style.opacity = 1;

        }, 5000); // Cambia de imagen cada 5 segundos
    }
});
