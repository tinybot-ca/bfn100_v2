<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Attempting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Activity;

class LogAuthenticationAttempt
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
     * @param  Attempting  $event
     * @return void
     */
    public function handle(Attempting $event)
    {
        $geoplugin =  var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . request()->ip())));

        Activity::create([

            'type' => 'Login Attempt',

            'description' => 'Username: ' . ( $event->user->name ?? 'UNKNOWN' )
                           . ' | Email: ' . ( $event->user->email ?? 'UNKNOWN' )
                           . ' | IP: ' . request()->ip()
                           
        ]);
    }
}
