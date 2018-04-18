<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Activity;

class LogLockout
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
     * @param  Lockout  $event
     * @return void
     */
    public function handle(Lockout $event)
    {
        $geoplugin =  var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . request()->ip())));

        Activity::create([

            'type' => 'Lockout',

            'description' => 'Username: ' . ( $event->user->name ?? 'UNKNOWN' )
                           . ' | Email: ' . ( $event->user->email ?? 'UNKNOWN' )
                           . ' | IP: ' . request()->ip()

        ]);
    }
}
