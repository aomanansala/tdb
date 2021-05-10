<?php


Route::group(['namespace' => 'App\Http\Controllers\Auth', 'as' => 'auth.'], function() {
    Route::get('verification', ['as' => 'verifyEmail', 'uses' => 'AuthController@verifyEmail']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
    Route::get('login', ['as' => 'login.index', 'uses' => 'AuthController@loginIndex']);
    Route::post('login', ['as' => 'login.store', 'uses' => 'AuthController@loginStore']);
    Route::get('sign-up', ['as' => 'sign-up.index', 'uses' => 'AuthController@signUpIndex']);
    Route::post('sign-up', ['as' => 'sign-up.store', 'uses' => 'AuthController@signUpStore']);
});
