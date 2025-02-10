<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create()
    {
       return view('auth.register');
    }

    public function store()
    {
        dd(request()->all());
    }
   
}
