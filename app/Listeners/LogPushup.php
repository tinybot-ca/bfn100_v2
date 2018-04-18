<?php

namespace App\Listeners;

use App\Events\PushupActivity;
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
    public function handle(PushupActivity $event)
    {
        $pushup = $event->pushup;
        $type = $event->type;

        Activity::create([

            'type' => $type,

            'description' => 'Authorized User ID: ' . auth()->id() . 
                ' | Authorized Username: ' . auth()->user()->name . 
                ' | IP: ' . request()->ip() . 
                ' | Date: ' . $pushup->datetime->toDayDateTimeString() . 
                ' | User: ' . $pushup->user->name . 
                ' | # of push-ups: ' . $pushup->amount . 
                ' | Comment: ' . $pushup->comment

            ]);
    }
}
