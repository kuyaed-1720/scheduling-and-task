<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () { return view('home'); });
Route::get('/home', function () { return view('home'); });
Route::get('/task', function () { return view('task'); });
Route::get('/schedule', function () { return view('schedule'); });
Route::get('/user', function () { return view('users/create'); });
Route::get('/setting', function () { return view('setting'); });


Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users/delete', [UserController::class, 'delete'])->name('users.delete');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');


Route::get('/schedule', [ScheduleController::class, 'index'])->name('users.schedule');