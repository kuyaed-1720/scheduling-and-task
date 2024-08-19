<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;

//Main Menu
Route::get('/', function () { return view('home'); });
Route::get('/home', function () { return view('home'); });


//Create User
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users/delete', [UserController::class, 'delete'])->name('users.delete');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

//Display sa baba na su mga Routes, sabing sa baba ngani
Route::get('/schedule', [ScheduleController::class, 'index'])->name('users.schedule');