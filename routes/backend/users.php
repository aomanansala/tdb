<?php

Route::group(['prefix' => 'users', 'as' => 'users.'], function() {
    Route::get('/', \App\Http\Livewire\User\Index::class)->name('index');
    Route::get('{id}/edit', \App\Http\Livewire\User\Edit::class)->name('edit');
    Route::get('create', \App\Http\Livewire\User\Create::class)->name('create');
});
