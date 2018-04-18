<?php

namespace App\Listeners;

use App\Events\PushupDelete;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Activity;

class LogPushupDelete
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
     * @param  PushupDelete  $event
     * @return void
     */
    public function handle(PushupDelete $event)
    {
        $pushup = $event->pushup;

        Activity::create([

            'type' => 'Pushup Delete',

            'description' => 'Username: ' . $pushup->user->name . 
                ' | Email: ' . $pushup->user->email . 
                ' | IP: ' . request()->ip() . 
                ' | Date: ' . $pushup->datetime->toDayDateTimeString() . 
                ' | # of push-ups: ' . $pushup->amount . 
                ' | Comment: ' . $pushup->comment

        ]);
    }
}
