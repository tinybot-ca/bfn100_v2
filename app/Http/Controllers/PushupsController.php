<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        $date = now()->format('Y-m-d');
        $time = now()->format('H:i:s');

        return view('pushups.create', compact(['date', 'time']));
    }

    public function messages() 
    {
        return [
            'amount.required' => 'The # of push-ups field is required.',
            'amount.min' => 'The # of push-ups must be at least 1.',
            'amount.max' => 'The # of push-ups may not be greater than 100.'
        ];
    }

    public function store()
    {
        // Can I use the count() function to check if any pushup records exist for the provided date?
        // https://stackoverflow.com/questions/29161433/laravel-5-how-to-retrieve-records-according-to-date

        $this->validate(request(), [
            'amount' => 'required|numeric|min:1|max:100',
            'date' => Rule::unique('pushups')->where(function ($query) {
                return $query->where('user_id', 2); // Todo: Change this to request('user_id')
            })
        ],
            $this->messages()
        );

        Pushup::create([
            'user_id' => 1,
            'date' => date('Y-m-d', strtotime(request('date'))),
            'time' => date('H:i:s', strtotime(request('time'))),
            'datetime' => date('Y-m-d H:i:s', strtotime(request('date') . ' ' . request('time'))),
            'amount' => request('amount'),
            'comment' => request('comment')
        ]);
        // Todo: Change above to use below once I have user_id properly setup
        // Pushup::create(request(['amount', 'comment']));
        
        return redirect('/');

    }
}
