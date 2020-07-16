<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notifications extends Mailable
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
        return $this->view('notifications')->with([
            'bank' => $this->reply->bank,
            'date' => $this->reply->date,
            'price' => $this->reply->price,
            'order_id' => $this->reply->order_id,
            'premise' => $this->reply->premise,
            'name' => $this->reply->name,
            'tel' => $this->reply->tel,
            'address' => $this->reply->address,
        ]);
    }
}
