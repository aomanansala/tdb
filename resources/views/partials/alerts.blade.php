@if (session()->has('successMessage'))
    <div class="alert alert-success mb-0">
        {{ session()->get('successMessage') }}
    </div>
@endif

@if (session()->has('errorMessage'))
    <div class="alert alert-danger mb-0">
        {{ session()->get('errorMessage') }}
    </div>
@endif
