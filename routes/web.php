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

/**
 * Index
 */
Route::get('/jobs', function () {
    $jobs =Job::with('employer')->latest()->simplePaginate(5);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);

});

/**
 * Create
 */
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

 /**
  * Store
  */
Route::post('/jobs', function () {
    request()->validate(
        [
           'title' =>[ 'required',  'min:3'],
           'salary' => ['required']
        ]
    );
 
    Job::create([
        'title' =>  request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

/**
 * Show
 */
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

/**
 * Edit
 */
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});


/**
 * Update
 */

 Route::patch('/jobs/{id}', function($id){
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // authorize (ToDo.)

    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id)->with('success', 'Job updated');
});


/**
 * Destroy
 */
Route::delete('/jobs/{id}', function ($id) {
    //auth
    $job = Job::find($id);
    $job->delete();
    return redirect('/jobs')->with('success', 'Job deleted');
});