@extends('frontend.layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('auth.sign-up.store') }}" class="form" method="POST">
                    {{ csrf_field() }}

                    <input type="hidden" name="referrer" value="{{ config('app.url') }}">

                    <div class="row p-5">
                        <div class="col-md-8 offset-2">
                            <div class="tdb card">
                                <h5 class="card-title p-3 mb-0">Sign Up</h5>

                                <hr class="mb-5">

                                <div class="p-3">
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
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4 text-right control-label">First name</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="firstName">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4 text-right control-label">Last name</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="lastName">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4 text-right control-label">Email</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4 text-right control-label">Username</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="userName">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-4 text-right control-label">Password</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-sm btn-dark">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
