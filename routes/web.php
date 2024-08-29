<?php

use Illuminate\Support\Facades\Route;

// sidebar
Route::get('/', function () { return view('welcome'); })->name('welcome');
Route::get('/home', function () { return view('welcome'); })->name('welcome');
Route::get('/tasks', function () { return view('pages.tasks.index'); })->name('pages.tasks.index');
Route::get('/calendar', function () { return view('pages.calendar.index'); })->name('pages.calendar.index');
Route::get('/users', function () { return view('pages.users.index'); })->name('pages.users.index');
Route::get('/settings', function () { return view('pages.settings.index'); })->name('pages.settings.index');
