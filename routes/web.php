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
    $jobs =Job::with('employer')->latest()->simplePaginate(5);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);

});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function () {
    $data = request()->validate(
        [
            'title' => 'required',
            'salary' => 'required'
        ]
    );

    //dd($data);

    Job::create([
        'title' =>  request('title'),
        'salary' => request('salary'), 
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});
