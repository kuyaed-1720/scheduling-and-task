<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () { return view('home'); });
Route::get('/home', function () { return view('home'); });
Route::get('/task', function () { return view('task'); });
Route::get('/schedule', function () { return view('schedule'); });
Route::get('/user', function () { return view('users/create'); });
Route::get('/setting', function () { return view('setting'); });


Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
