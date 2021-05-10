<?php

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['admin']
], function () {
    include 'backend/users.php';
});
