<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;

// Home
Route::get('/', function () { return view('home'); });
Route::get('/home', function () { return view('home'); });

// Users
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users/delete', [UserController::class, 'delete'])->name('users.delete');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Schedule
Route::get('/schedule', [ScheduleController::class, 'index'])->name('users.schedule');