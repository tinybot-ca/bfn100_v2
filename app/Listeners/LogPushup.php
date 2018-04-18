<?php

namespace App\Listeners;

use App\Events\PushupCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Activity;

class LogPushup
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PushupCreated  $event
     * @return void
     */
    public function handle(PushupCreated $event)
    {
        $pushup = $event->pushup;

        Activity::create([

            'type' => 'Pushup Created',

            'description' => 'Username: ' . $pushup->user->name . 
                ' | Email: ' . $pushup->user->email . 
                ' | IP: ' . request()->ip() . 
                ' | # of push-ups: ' . $pushup->amount . 
                ' | Comment: ' . $pushup->comment

            ]);
    }
}
