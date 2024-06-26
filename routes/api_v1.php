<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CityController;
use App\Http\Controllers\Api\V1\IssueController;
use App\Http\Controllers\Api\V1\UsersController;
use App\Http\Controllers\Api\V1\BookingController;
use App\Http\Controllers\Api\V1\CommentsController;
use App\Http\Controllers\Api\V1\IssueAnswerController;
use App\Http\Controllers\Api\V1\NotificationController;


Route::controller(UsersController::class)->group(function () {
    Route::prefix('auth')->as('auth.')->group(function(){
        Route::post('signup', 'signup')->name('signup');
        Route::get('login', 'login')->name('login');
        Route::get('specialist', 'specialist')->name('specialist');
        Route::get('check/point', 'check_point')->name('check-point');
    });
    Route::Post('update/profile', 'profile_update')->name('profile_update');
    Route::get('details/profile', 'profile_details')->name('profile_details');
    Route::get('lawyer/{id?}', 'lawyer_by_id')->name('lawyer_by_id');
    Route::Post('change_password', 'change_password')->name('change_password');
    Route::get('booking/lawyer', 'booking_lawyer')->name('booking_lawyer');
});

    Route::controller(BookingController::class)->group(function () {
    Route::get('get/booking', 'get_booking')->name('get_booking');
    Route::post('new_booking', 'new_booking')->name('new_booking');
    Route::get('my_booking', 'my_booking')->name('get_my_bookingbooking');
    Route::get('change_status/{id?}', 'change_status')->name('change_status');
});
Route::controller(CityController::class)->group(function () {
    Route::get('city', 'city')->name('city');
    Route::get('area', 'area')->name('area');
});

Route::controller(CommentsController::class)->group(function () {
    Route::get('add/rating', 'new_comment')->name('new_comment');
    Route::get('comments/{id?}', 'get_comment_byid')->name('get_comment_byid');
});

Route::controller(IssueController::class)->middleware(['jwt.verify'])->group(function () {
    Route::post('new', 'newissue')->name('newissue');
    Route::get('my', 'myissue')->name('myissue');
    Route::get('issue/{id?}', 'get_issue_id')->name('myissue');
    Route::get('delete/issue/{id?}', 'delete_issue')->name('delete_issue');
    Route::get('all/issue', 'get_all_issue')->name('get_all_issue');
    Route::get('all/issue/by_city', 'get_all_issue_by_city')->name('get_all_issue_by_city');
});

Route::controller(IssueAnswerController::class)->middleware(['jwt.verify'])->group(function () {
    Route::post('answer', 'newanswer')->name('newanswer');
    Route::get('offer/{id?}', 'accept_offer')->name('accept_offer');
    Route::get('my_accepted_offers', 'my_accept_offer')->name('my_accept_offer');
    Route::get('my_accepted_offers/lawyer', 'my_accept_offer_lawyer')->name('my_accept_offer_lawyer');
});

Route::controller(NotificationController::class)->middleware(['jwt.verify'])->group(function () {

    Route::get('checkactive', 'checkactive')->name('checkactive');
    Route::get('notification', 'get_my_notification')->name('notification');
});

