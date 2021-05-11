
<script>
    window.addEventListener('errorMessage', event => {
        toastr.error(event.detail.message);
    });

    window.addEventListener('successMessage', event => {
        toastr.success(event.detail.message);
    });
</script>

