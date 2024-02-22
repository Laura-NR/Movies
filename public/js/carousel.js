document.addEventListener("DOMContentLoaded", function () {
    const carouselContainer = document.querySelector('[data-carousel]');
    const slides = document.querySelectorAll('[data-slides] img');
    const dots = document.querySelectorAll('#dots ul div');
    let currentIndex = 0;

    function showSlide(index) {
        console.log("showSlide function");
        console.log(index);
        console.log("Dots:", dots);
        slides.forEach((slide, i) => {
            //slide.classList.toggle('active', i === index);
            if (i === index) {
                slide.dataset.active = true; //Activate slide
            }
            else {
                delete slide.dataset.active //Deactivate slide
            }
        });

        // Remove 'active-dot' class from all dots
        dots.forEach((dot, i) => {
            dot.classList.remove('active-dot');
        });

        // Add 'active-dot' class to the dot corresponding to the active slide
        dots[index].classList.add('active-dot');
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

