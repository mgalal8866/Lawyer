<?php

use App\Livewire\Booking\ViewBooking;
use App\Livewire\Dashboard\Main;
use App\Livewire\Issue\DetailsIssue;
use App\Livewire\Issue\ViewIssue;
use App\Livewire\Lawyer\ViewLawyer;
use App\Livewire\Notification\ViewNotification;
use App\Livewire\Users\ViewUser;
use Illuminate\Support\Facades\Route;

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

Route::get('/', Main::class)->name('main-dashboard');
Route::get('/issue/details/{id?}', DetailsIssue::class)->name('detailsissue');
Route::get('/user/view', ViewUser::class)->name('view-user');
Route::get('/issue/view',ViewIssue::class)->name('view-issue');
Route::get('/booking/view',ViewBooking::class)->name('view-booking');
Route::get('/lawyer/view',ViewLawyer::class)->name('view-lawyer');
Route::get('/notification/view',ViewNotification::class)->name('view-notification');
