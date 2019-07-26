<?php

Route::view('/', 'Home::index')->name('/') -> middleware('web');
