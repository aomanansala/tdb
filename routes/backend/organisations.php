<?php

Route::group(['prefix' => 'organisations', 'as' => 'organisations.'], function() {
    Route::get('/', \App\Http\Livewire\Organisation\Index::class)->name('index');
    Route::get('/create', \App\Http\Livewire\Organisation\Index::class)->name('create');
});
