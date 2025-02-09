<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::view('/','home'); 
 
Route::view('/about', 'about'); 
 
Route::view('/contact', 'contact'); 
 
Route::resource('/jobs', JobController::class);