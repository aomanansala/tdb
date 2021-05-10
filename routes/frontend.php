<?php

Route::group(['namespace' => 'App\Http\Controllers\Frontend', 'as' => 'frontend.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'FrontendController@index']);
});
