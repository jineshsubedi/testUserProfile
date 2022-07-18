<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/profile', 'UserProfileController@profile');
Route::put('/profile', 'UserProfileController@updateProfile')->name('updateProfile');