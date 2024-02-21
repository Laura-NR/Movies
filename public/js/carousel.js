document.addEventListener("DOMContentLoaded", function () {
    const carouselContainer = document.querySelector('[data-carousel]');
    const slides = document.querySelectorAll('[data-slides] img');
    const dots = document.querySelectorAll('#dots ul div');
    let currentIndex = 0;

    function showSlide(index) {
        console.log("showSlide function");
        console.log(index);
        slides.forEach((slide, i) => {
            //slide.classList.toggle('active', i === index);
            if (i === index) {
                slide.dataset.active = true;                
            }
            else{
                delete slide.dataset.active
            }
        });

        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    }

    function updateCarousel(direction) {
        console.log("updateCarousel function");
        console.log(direction);
        if (direction === 'prev') {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        } else {
            currentIndex = (currentIndex + 1) % slides.length;
        }

        showSlide(currentIndex);
    };

    function autoRotate() {
        console.log("autoRotate function");
        setInterval(() => {
            updateCarousel('next');
        }, 3000); // Change slide every 3 seconds
    }

    // Initial display
    showSlide(currentIndex);
    autoRotate(); // Start auto rotation
});

