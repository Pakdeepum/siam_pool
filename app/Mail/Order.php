<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Order extends Mailable
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
        return $this->view('order-mail')->with([
            'customer' => $this->reply->customer,
            'order_id' => $this->reply->order_id,
            'date' => $this->reply->date,
            'tel' => $this->reply->tel,
            'product' => $this->reply->product,
            'total' => $this->reply->total
        ]);
    }
}
