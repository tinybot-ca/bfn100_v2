<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Pushup;

class PushupNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $pushup;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pushup $pushup)
    {
        $this->pushup = $pushup;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.pushup');
    }
}
