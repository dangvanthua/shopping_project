<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/demo',TestController::class,'testcai');
Route::get('demo', [TestController::class, 'testcai']);

// Route Event
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('create');
Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
Route::delete('/events/{id}/delete', [EventController::class, 'destroy'])->name('deleteEvent');

// Route User
Route::get('/auth/forgot_password', [UserController::class, 'showForgotPassword'])->name('auth.password');
Route::post('/auth/forgot_password', [UserController::class, 'submitFormForgetPassword'])->name('auth.sumitReset');
Route::get('/auth/get_password/{customer}/{token}', [UserController::class, 'showGetPassword'])->name('auth.getPassword');
Route::post('/auth/get_password/{customer}/{token}', [UserController::class, 'submitGetPassword'])->name('auth.submitPassword');
