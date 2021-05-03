@extends('frontend.layout.app')

@section('content')
    <div id="search-container">
        <div id="search-content-container">
            <div id="search-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3>Find a Great School</h3>
                            <p>Use advanced filters for search in categories, locations and radius of your position</p>

                            <div id="search-form" class="form-inline">
                                <input type="text" class="mb-2 mr-sm-2 mb-sm-0 w-25 flex-fill form-control" placeholder="Type keyword">
                                <input type="text" class="mb-2 mr-sm-2 mb-sm-0 w-25 flex-fill form-control" placeholder="Select school type">
                                <input type="text" class="mb-2 mr-sm-2 mb-sm-0 w-25 flex-fill form-control" placeholder="Select location">
                                <button type="button" class="btn shadow-none flex-fill btn-dark">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
