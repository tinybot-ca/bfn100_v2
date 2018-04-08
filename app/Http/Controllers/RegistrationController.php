<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth')->only(['index', 'show']);
    }

    public function index() 
    {
        $users = User::all();

        return view('registrations.index', compact('users'));
    }

    public function show(User $user) 
    {
        $pushups = $user->pushups->sortBy('datetime')->reverse();

        return view('registrations.show', compact(['user', 'pushups']));
    }

    public function create()
    {
        return view('registrations.create');
    }

    public function store()
    {
        // Form validation
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        // Create and save the user
        $user = User::create([
            'name' => request('name'), 
            'email' => request('email'), 
            'password' => bcrypt(request('password'))
        ]);

        // Sign the user in
        auth()->login($user);

        // Redirect 
        return redirect()->home();
    }
    
}