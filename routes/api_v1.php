<?php

use App\Http\Controllers\Api\V1\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Stevebauman\Location\Facades\Location;



Route::controller(UsersController::class)
->prefix('auth')
->as('auth.')
->group(function () {
    Route::post('signup', 'signup')->name('signup');
    Route::get('login', 'login')->name('login');

});
