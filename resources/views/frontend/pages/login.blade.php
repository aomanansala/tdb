<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('css/frontend/app.css') }}">
    @yield('styles')
</head>

<body id="login-page">
<div id="login-page-container">
    <div id="login-page-content-container">
        <div id="login-page-content">
            <img src="{{ asset('images/login-logo.dfee4fd4.svg') }}">

            <h4>Sign in to Team DB</h4>

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

            <form action="{{ route('auth.login.store') }}" method="POST" class="form text-left">
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="userName">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <div class="form-check form-check-inline">
                                <input type="checkbox" id="remember" class="form-check-input">
                                <label for="remember" class="form-check-label">Remember me</label>
                            </div>
                        </div>

                        <div class="col text-right">
                            <a href="">Forgot username or password?</a>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-dark btn-block">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
