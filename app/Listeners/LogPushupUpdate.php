<?php

namespace App\Listeners;

use App\Events\PushupUpdate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Activity;

class LogPushupUpdate
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
     * @param  PushupUpdate  $event
     * @return void
     */
    public function handle(PushupUpdate $event)
    {
        $pushup = $event->pushup;

        Activity::create([

            'type' => 'Pushup Update',

            'description' => 'Username: ' . $pushup->user->name . 
                ' | Email: ' . $pushup->user->email . 
                ' | IP: ' . request()->ip() . 
                ' | Date: ' . $pushup->datetime->toDayDateTimeString() . 
                ' | # of push-ups: ' . $pushup->amount . 
                ' | Comment: ' . $pushup->comment

        ]);
    }
}
