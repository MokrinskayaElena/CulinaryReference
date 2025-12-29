<!-- error.blade.php -->

<!-- Модальное окно -->
<div id="errorModal" class="modal" style="display:none; position: fixed; z-index: 999; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.6);">
  <div class="modal-content" style="background-color: #333; margin: 10% auto; padding: 30px; border-radius: 10px; width: 500px; max-width: 90%; box-shadow: 0 4px 8px rgba(0,0,0,0.2); position: relative;">
    <span id="closeBtn" style="position: absolute; top: 15px; right: 15px; cursor: pointer; font-size: 24px; color: #fff;">&times;</span>
    <p id="modalText" style="color: #fff; font-size: 20px; line-height: 1.6; letter-spacing: 2px; font-family: Arial, sans-serif; margin: 0;">
    </p>
  </div>
</div>

@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('errorModal');
        var closeBtn = document.getElementById('closeBtn');
        var modalText = document.getElementById('modalText');

        modal.style.display = 'block';
        modalText.innerText = "{{ session('error') }}";

        closeBtn.onclick = function() {
            modal.style.display = 'none';
        };

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
    });
</script>
@endif