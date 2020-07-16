<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TrackNumber extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reply)
    {
        //
        $this->reply = $reply;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('track-number')->with([
            'number' => $this->reply->password,
            'tel' => $this->reply->tel,
            'url' => $this->reply->url,
            'customer' => $this->reply->customer
        ]);
    }
}
