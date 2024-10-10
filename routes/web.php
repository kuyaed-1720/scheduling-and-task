<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SignupController;

// Home
Route::get('/', function () { return view('signup'); });
Route::get('/home', function () { return view('home'); });

// Users
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/update-cell', [UserController::class, 'updateCell']);
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Events
// Route::get('/events', [EventController::class, 'index'])->name('events.index');
// Route::post('/events', [EventController::class, 'store'])->name('events.store');
// Route::get('/api/events', [EventController::class, 'getEvents']);
Route::controller(EventController::class)->group(function(){
  Route::get('/events', [EventController::class, 'index'])->name('events.index');
  Route::post('/events', [EventController::class, 'store'])->name('events.store');
  Route::get('/api/events', [EventController::class, 'getEvents']);
});

// Tasks
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/tasks/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::post('/tasks/{task}', [TaskController::class, 'complete'])->name('tasks.complete');
Route::get('/tasksshow', [TaskController::class, 'tasksshow'])->name('tasks.tasksshow');

// Settings
Route::get('/settings', [SettingController::class, 'index']);
Route::post('/settings',[SettingController::class, 'store']);

// Signup
Route::get('/signup', [LoginController::class, 'create'])->name('signup.create');
Route::post('/signup', [LoginController::class, 'index'])-> name('signup.home');
Route::post('/', [SignupController::class, 'store'])->name('signup.store');