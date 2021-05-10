
<script>
    window.addEventListener('errorMessage', event => {
        toastr.error(event.detail.message);
    });

    window.addEventListener('successMessage', event => {
        toastr.error(event.detail.message);
    });
</script>

