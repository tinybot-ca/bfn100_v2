<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Pushup;
use App\Events\PushupActivity;
use Carbon\Carbon;

class PushupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index() 
    {
        $pushups = Pushup::orderBy('datetime', 'desc')->limit(8)->get();

        return view('pushups.index', compact('pushups'));
    }

    public function show(Pushup $pushup) 
    {
        return view('pushups.show', compact('pushup'));
    }

    public function create() 
    {
        $date = now()->format('Y-m-d');
        $time = now()->format('H:i:s');

        return view('pushups.create', compact(['date', 'time']));
    }
    
    public function edit(Pushup $pushup) 
    {
        if (auth()->id() != $pushup->user->id) {
            session()->flash('message', 'Unauthorized access.');

            return back();
        }

        return view('pushups.edit', compact('pushup'));
    }
    
    public function update(Pushup $pushup) 
    {
        if (auth()->id() != $pushup->user->id) {
            session()->flash('message', 'Unauthorized access.');

            return back();
        }

        $messages = [
            'amount.required' => 'The # of push-ups field is required.',
            'amount.min' => 'The # of push-ups must be at least 1.',
            'amount.max' => 'The # of push-ups may not be greater than 100.'
        ];

        $this->validate(request(), [
            'amount' => 'required|numeric|min:1|max:100',
            'date' => Rule::unique('pushups')->where(function ($query) {
                return $query->where('user_id', auth()->id()); 
                })->ignore($pushup->date, 'date')
            ],
            $messages
        );

        $pushup->update(request(['amount', 'comment']));

        event(new PushupActivity($pushup, 'Pushup Update'));

        session()->flash('message', 'Push-up record has been updated.');

        return redirect('/pushups/' . $pushup->id);
    }

    public function store()
    {
        $messages = [
            'amount.required' => 'The # of push-ups field is required.',
            'amount.min' => 'The # of push-ups must be at least 1.',
            'amount.max' => 'The # of push-ups may not be greater than 100.'
        ];
        
        $this->validate(request(), [
            'amount' => 'required|numeric|min:1|max:100',
            'date' => Rule::unique('pushups')->where(function ($query) {
                return $query->where('user_id', auth()->id()); 
                })
            ],
            $messages
        );
    
        $pushup = Pushup::create([
                'user_id' => auth()->id(),
                'date' => date('Y-m-d', strtotime(request('date'))),
                'time' => date('H:i:s', strtotime(request('time'))),
                'datetime' => date('Y-m-d H:i:s', strtotime(request('date') . ' ' . request('time'))),
                'amount' => request('amount'),
                'comment' => request('comment')
            ]);

        event(new PushupActivity($pushup, 'Pushup Create'));

        session()->flash('message', 'Boom! Tell the world my story!');
    
        return redirect('/');
    }

    public function delete(Pushup $pushup)
    {
        if (auth()->id() != $pushup->user->id) {
            session()->flash('message', 'Unauthorized access.');

            return back();
        }

        return view('pushups.delete', compact('pushup'));
    }

    public function destroy(Pushup $pushup)
    {
        if (auth()->id() != $pushup->user->id) {
            session()->flash('message', 'Unauthorized access.');

            return back();
        }
        
        $pushup->delete();

        event(new PushupActivity($pushup, 'Pushup Delete'));
        
        session()->flash('message', 'Record deleted.');

        return redirect('/');
    }
}