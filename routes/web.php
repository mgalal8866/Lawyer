<?php

use App\Livewire\Dashboard\Main;
use App\Livewire\Users\ViewUser;
use App\Livewire\Issue\ViewIssue;
use App\Livewire\Lawyer\ViewLawyer;
use App\Livewire\Issue\DetailsIssue;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Booking\ViewBooking;
use Illuminate\Support\Facades\Route;
use App\Livewire\Notification\ViewNotification;
use App\Http\Controllers\Auth\UserAdminController;
use App\Livewire\Setting;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('guest:web')->group(function () {
    Route::get('/login', [UserAdminController::class, 'login'])->name('login');
    Route::post('/postlogin', [UserAdminController::class, 'postlogin'])->name('postlogin');
});

Route::middleware(['auth:web'])->group(function () {
    Route::get('/', Main::class)->name('main-dashboard');
    Route::post('/logout', [UserAdminController::class, 'adminlogout'])->name('adminlogout');
    Route::get('/issue/details/{id?}', DetailsIssue::class)->name('detailsissue');
    Route::get('/user/view', ViewUser::class)->name('view-user');
    Route::get('/issue/view' , ViewIssue::class)->name('view-issue');
    Route::get('/booking/view', ViewBooking::class)->name('view-booking');
    Route::get('/lawyer/view', ViewLawyer::class)->name('view-lawyer');
    Route::get('/no tification/view', ViewNotification::class)->name('view-notification');
    Route::get('/setting', Setting::class)->name('setting');
});

