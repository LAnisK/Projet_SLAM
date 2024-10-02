let currentIndex = 0;
const slides = document.querySelectorAll('.slide');


function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.style.display = 'none'; 
    });
    slides[index].style.display = 'block'; 
}


function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length; 
    showSlide(currentIndex);
}


showSlide(currentIndex);


setInterval(nextSlide, 3000);
