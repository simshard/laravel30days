<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    /**
     * Display the resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
       dd(request()->all());
    }


}
