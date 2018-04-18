<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Activity;

class LogSuccessfulLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $geoplugin =  var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . request()->ip())));

        Activity::create([
            'type' => 'Logout',
            'description' => 'Username: ' . $event->user->name . ' | Email: ' . $event->user->email . ' | IP: ' . request()->ip()
        ]);
    }
}
