<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $remember = true; // Forcing "Remember me" on for everyone
        
        if (! auth()->attempt(request(['email', 'password']), $remember)) {
        
            return back()->withInput()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

        // Flash message
        $success_message = 'Welcome back, ' . auth()->user()->name . '.';
        session()->flash('message', $success_message);

        return redirect()->home();
    }

    public function destroy()
    {
        auth()->logout();

        // Flash message
        $success_message = 'You have been logged out.';
        session()->flash('message', $success_message);

        return redirect()->home();
    }
}
