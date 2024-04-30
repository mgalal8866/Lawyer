<?php

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

Route::get('/', ViewUser::class)->name('main-dashboard');
Route::get('/user/view', ViewUser::class)->name('view-user');
Route::get('/issue/view',ViewIssue::class)->name('view-issue');
Route::get('/lawyer/view',ViewLawyer::class)->name('view-lawyer');
Route::get('/notification/view',ViewNotification::class)->name('view-notification');
