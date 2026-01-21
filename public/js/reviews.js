document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('show-review-form-btn');
    const form = document.getElementById('review-form');

    if (toggleBtn && form) {
        toggleBtn.addEventListener('click', () => {
            form.style.display = form.style.display === 'none' || form.style.display === '' ? 'block' : 'none';
        });
    }

    // Работа с звездами
    const stars = document.querySelectorAll('#star-rating span');
    const ratingInput = document.getElementById('rating-input');

    let currentRating = 0;

    stars.forEach(star => {
        star.addEventListener('mouseenter', () => {
            const val = parseInt(star.getAttribute('data-value'));
            highlightStars(val);
        });

        star.addEventListener('mouseleave', () => {
            highlightStars(currentRating);
        });

        star.addEventListener('click', () => {
            currentRating = parseInt(star.getAttribute('data-value'));
            ratingInput.value = currentRating;
            highlightStars(currentRating);
        });
    });

    function highlightStars(rating) {
        stars.forEach(star => {
            const val = parseInt(star.getAttribute('data-value'));
            if (val <= rating) {
                star.classList.add('selected');
            } else {
                star.classList.remove('selected');
            }
        });
    }

    // Обработка формы
    const formElement = document.getElementById('review-form');
    if (formElement) {
        formElement.addEventListener('submit', (e) => {
            e.preventDefault();

            const formData = new FormData(formElement);
            fetch('/reviews', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(res => {
                if (!res.ok) {
                    return res.json().then(errorData => { throw errorData; });
                }
                return res.json();
            })
            .then(data => {
                alert('Отзыв добавлен!');
                location.reload();
            })
            .catch(error => {
                alert('Ошибка при отправке отзыва.');
                console.error(error);
            });
        });
    }
});