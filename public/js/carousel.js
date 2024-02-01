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
    }

    carouselContainer.addEventListener('click', (event) => {
        const button = event.target.closest('[data-carousel-button]');
        if (button) {
            updateCarousel(button.dataset.carouselButton);
            console.log(button.dataset.carouselButton);
        }
    });

    function autoRotate() {
        console.log("autoRotate function");
        setInterval(() => {
            updateCarousel('next');
        }, 10000); // Change slide every 5 seconds (adjust as needed)
    }

    // Initial display
    showSlide(currentIndex);
    autoRotate(); // Start auto rotation
});


