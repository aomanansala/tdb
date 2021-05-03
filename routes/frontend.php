<?php

Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function() {
    Route::get('/', ['as' => 'index', 'uses' => 'FrontendController@index']);
});
