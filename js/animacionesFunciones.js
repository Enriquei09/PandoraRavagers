let slideIndex = 0;

        function showSlides() {
            const slides = document.querySelectorAll(".carousel-slide");
            slides.forEach((slide, index) => {
                slide.style.display = index === slideIndex ? "block" : "none";
            });
            slideIndex = (slideIndex + 1) % slides.length;
        }

        // Cambia de imagen cada 3 segundos
        setInterval(showSlides, 3000);

        // Muestra la primera imagen al cargar la página
        showSlides();
