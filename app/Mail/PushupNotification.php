<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Pushup;

class PushupNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $pushup;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Pushup $pushup)
    {
        $this->user = $user;
        $this->pushup = $pushup;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'BFN100: ' . $this->pushup->user->name . ' just pounded out ' . $this->pushup->amount . ' push-ups!';

        return $this->markdown('emails.pushup')->subject($subject);
    }
}
