<?php

namespace App\Listeners;

use App\Events\LoginDetected;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateActivityLog
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
     * @param  LoginDetected  $event
     * @return void
     */
    public function handle(LoginDetected $event)
    {
        //
    }
}
