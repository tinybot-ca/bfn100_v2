<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pushup;

class PushupsController extends Controller
{
    public function index() 
    {
        $pushups = Pushup::latest()->limit(8)->get();

        return view('pushups.index', compact('pushups'));
    }

    public function show(Pushup $pushup) 
    {
        return view('pushups.show', compact('pushup'));
    }

    public function create() 
    {
        return view('pushups.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'amount' => 'required|max:100'
        ]);

        Pushup::create([
            'user_id' => 1,
            'amount' => request('amount'),
            'comment' => request('comment')
        ]);
        // Todo: Change above to use below once I have user_id properly setup
        // Pushup::create(request(['amount', 'comment']));
        
        return redirect('/');

    }
}
