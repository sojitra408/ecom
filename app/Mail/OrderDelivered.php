<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDelivered extends Mailable
{
    use Queueable, SerializesModels;
	public $userdata;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userdata)
    {
        $this->userdata=$userdata;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		$emaildata=$this->userdata;
        return $this->view('mail.order-delivered',compact('emaildata'))->subject('Hurrah! The postman successfully delivered your goodies!');
    }
}
