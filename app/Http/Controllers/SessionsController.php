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
        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

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
