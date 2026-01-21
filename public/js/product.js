document.addEventListener('DOMContentLoaded', () => {
        const slidesContainer = document.querySelector('.slides');
        const slides = Array.from(slidesContainer.children);
        const groupSize = 4;

        // Перебираем и группируем слайды по 4
        slidesContainer.innerHTML = '';

        for (let i = 0; i < slides.length; i += groupSize) {
            const groupSlides = slides.slice(i, i + groupSize);
            const groupDiv = document.createElement('div');
            groupDiv.className = 'slide-group';

            groupSlides.forEach(slide => {
                groupDiv.appendChild(slide);
            });

            slidesContainer.appendChild(groupDiv);
        }
    });