<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReturnSchedule extends Mailable
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
        return $this->view('mail.return-pickup-schedule',compact('emaildata'))->subject('TOT Return process on the way');
    }
}
