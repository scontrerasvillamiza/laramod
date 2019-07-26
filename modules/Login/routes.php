<?php

Route::group(['middleware' => 'web'], function () {

    Route::get('login', '\Login\Controllers\LoginController@showLoginForm')->name('login');

    Route::post('login', '\Login\Controllers\LoginController@login');

    Route::post('logout', '\Login\Controllers\LoginController@logout')->name('logout');

    Route::get('password/reset/{token}',
        '\Login\Controllers\ResetPasswordController@showResetForm')->name('password.reset');

    Route::post('password/reset', '\Login\Controllers\ResetPasswordController@reset');

    Route::post('password/email',
        '\Login\Controllers\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    Route::get('password/reset',
        '\Login\Controllers\ForgotPasswordController@showLinkRequestForm')->name('password.request');

    Route::get('password/reset',
        '\Login\Controllers\ForgotPasswordController@showLinkRequestForm')->name('password.request');

    Route::get('register',
        '\Login\Controllers\RegisterController@showRegistrationForm')->name('register');

    Route::post('register',
        '\Login\Controllers\RegisterController@register');

});
