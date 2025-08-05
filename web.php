<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\AppliedJobsController;
use App\Http\Controllers\JobController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/dashboard', [ProfileController::class, 'dashboard'])->name('profile.dashboard');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/resume', [ResumeController::class, 'index'])->name('resume.index');
    Route::post('/resume', [ResumeController::class, 'store'])->name('resume.store');
    Route::delete('/resume', [ResumeController::class, 'destroy'])->name('resume.delete');
    Route::post('/resume/save-details', [ResumeController::class, 'saveDetails'])->name('resume.save-details');
    Route::get('/applied-jobs', [AppliedJobsController::class, 'index'])->name('applied-jobs.index');
});