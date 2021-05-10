<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/backend/app.css') }}">

    @yield('styles')
    @livewireStyles
</head>

<body style="padding-top: {{ (session()->has('successMessage') || session()->has('errorMessage')) ? '175px' : '' }}">
<div>
    @include('backend.partials.side-menu')
    @include('backend.partials.header')

    <div id="content-container">
        @yield('content')
    </div>
</div>
@livewireScripts
</body>

<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')

<script>
    $(document).ready(function() {
        $(".dropdown-toggle").dropdown();
    });
</script>
</html>


</html>
