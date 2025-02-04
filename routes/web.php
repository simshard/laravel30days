<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['greeting' => 'Hello World!']);//->name('home');
});

Route::get('/about', function () {
    return view('about');//->name('about');
});

Route::get('/contact', function () {
    return view('contact');//->name('contact');
});
Route::get('/jobs', function () {
    $jobs =Job::with('employer')->get();    
    return view('jobs', [
        'jobs' => $jobs
    ]);

});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('job', ['job' => $job]);
});
