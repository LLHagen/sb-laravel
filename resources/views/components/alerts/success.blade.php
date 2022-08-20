<div id="alert-success" class="alert alert-success position-absolute float-left col-10 mx-4" role="alert">
    {{ $text }}
</div>
<script>
    function alertHiden(alert)
    {
        alert.style.visibility = "hidden";
    }

    const alert = document.querySelector('#alert-success');

    document.addEventListener('click', function () {
        alertHiden(alert);
    })

    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            alertHiden(alert);
        }, 2000);
    });
</script>
