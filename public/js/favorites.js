document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.favorite-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const productId = this.dataset.productId;
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                // Обновляем только иконку
                const icon = this.querySelector('i');
                if (data.favorited) {
                    // Удаляем класс 'fa-heart-o', добавляем 'fa-heart'
                    icon.classList.remove('fa-heart-o');
                    icon.classList.add('fa-heart');
                } else {
                    // Удаляем класс 'fa-heart', добавляем 'fa-heart-o'
                    icon.classList.remove('fa-heart');
                    icon.classList.add('fa-heart-o');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});