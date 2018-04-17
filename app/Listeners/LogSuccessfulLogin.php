<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Activity;

class LogSuccessfulLogin implements ShouldQueue
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $geoplugin =  var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . request()->ip())));
        // dd($geoplugin);
        // dd('User with this email: ' . $event->user->email . ' just logged in!');

        Activity::create([
            'description' => 'Username: ' . $event->user->name . ' | Email: ' . $event->user->email . ' | IP: ' . request()->ip()
        ]);
    }
}
