<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

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
        //dd(request()->all());
        $validated= request()->validate([
            'first_name' => ['required'],
            'last_name'  => ['required'],
            'email'      => ['required', 'email'],
            'password'   => ['required',  'confirmed',Password::min(6)]
        ]);

       // dd($validated);

        $user = User::create($validated);

        Auth::login($user);

        return redirect('/jobs');
    }

}
