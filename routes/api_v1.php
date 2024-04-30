<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Stevebauman\Location\Facades\Location;
use App\Http\Controllers\Api\V1\CityController;
use App\Http\Controllers\Api\V1\IssueController;
use App\Http\Controllers\Api\V1\UsersController;
use App\Http\Controllers\Api\V1\QuestionController;
use App\Http\Controllers\Api\V1\IssueAnswerController;



Route::controller(UsersController::class)->prefix('auth')->as('auth.')->group(function () {
    Route::post('signup', 'signup')->name('signup');
    Route::get('login', 'login')->name('login');
    Route::get('specialist', 'specialist')->name('specialist');

});
Route::controller(CityController::class)->group(function () {
    Route::get('city', 'city')->name('login');
    Route::get('area', 'area')->name('login');
});
Route::controller(IssueController::class)->middleware(['jwt.verify'])->group(function () {
    Route::post('new', 'newissue')->name('newissue');
    Route::get('my', 'myissue')->name('myissue');
    Route::get('issue/{id?}', 'get_issue_id')->name('myissue');
});
Route::controller(IssueAnswerController::class)->middleware(['jwt.verify'])->group(function () {
    Route::post('answer', 'newanswer')->name('newanswer');
    Route::get('my', 'myissue')->name('myissue');
});

