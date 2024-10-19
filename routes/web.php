<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/survey', [SurveyController::class, 'create'])->name('survey.create');
Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');
