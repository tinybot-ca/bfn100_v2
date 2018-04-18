<?php

namespace App\Listeners;

use App\Events\PushupCreate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Activity;

class LogPushupCreate
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
     * @param  PushupCreate  $event
     * @return void
     */
    public function handle(PushupCreate $event)
    {
        $pushup = $event->pushup;

        Activity::create([

            'type' => 'Pushup Create',

            'description' => 'Username: ' . $pushup->user->name . 
                ' | Email: ' . $pushup->user->email . 
                ' | IP: ' . request()->ip() . 
                ' | Date: ' . $pushup->datetime->toDayDateTimeString() . 
                ' | # of push-ups: ' . $pushup->amount . 
                ' | Comment: ' . $pushup->comment

            ]);
    }
}
