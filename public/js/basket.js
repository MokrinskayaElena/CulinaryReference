document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.basket-form').forEach(form => {
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
                const icon = this.querySelector('i');
                if (data.in_basket) {
                    // В корзине — меняем иконку на "добавлено"
                    icon.classList.remove('fa-shopping-cart');
                    icon.classList.add('fa-check');
                } else {
                    // Не в корзине — возвращаем исходную
                    icon.classList.remove('fa-check');
                    icon.classList.add('fa-shopping-cart');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});