<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::view('/','home'); 
 
Route::view('/about', 'about'); 
 
Route::view('/contact', 'contact'); 
 
Route::resource('/jobs', JobController::class);

/**
 * Auth
 */

 Route::get('/login', [LoginController::class, 'create']) ;
 Route::post('/login', [LoginController::class, 'store']) ;
 Route::post('/logout', [LoginController::class, 'destroy']);
 
 Route::get('/register', [RegisterController::class, 'create']);
 Route::post('/register', [RegisterController::class, 'store']);
