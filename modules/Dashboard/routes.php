<?php

Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth']], function () {
    Route::get('/', '\Dashboard\Controllers\DashboardController@showDashboard')->name('dashboard');
    Route::post('/', '\Dashboard\Controllers\DashboardController@handlePost');
});
