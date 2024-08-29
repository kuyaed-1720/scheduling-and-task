<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// sidebar
Route::get('/', function () { return view('welcome'); })->name('welcome');
Route::get('/home', function () { return view('welcome'); })->name('welcome');
Route::get('/tasks', function () { return view('pages.tasks.index'); })->name('tasks');
Route::get('/calendar', function () { return view('pages.calendar.index'); })->name('calendar');
Route::get('/users', function () { return view('pages.users.index'); })->name('users');
Route::get('/settings', function () { return view('pages.settings.index'); })->name('settings');

// users
Route::get('/users', [UserController::class, 'index'])->name('users');