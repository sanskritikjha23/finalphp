<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/login',[AuthManager::class,'login'])->name(name:'login');
Route::get('/registration',[AuthManager::class,'registration'])->name('registration');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('projects.issues', IssueController::class);
});

Route::middleware(['auth', 'superAdmin'])->group(function () {
    Route::resource('projects.tasks', TaskController::class);
    Route::resource('projects.issues', IssueController::class);
    Route::resource('timesheets', TimesheetController::class);
});

require __DIR__.'/auth.php';
