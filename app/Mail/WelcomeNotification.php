<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $ac_number,$password)
    {
        $this->data = $name;
        $this->ac_number = $ac_number;
        $this->password = $password;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Emails.welcomeNotification')
                            ->with(['name'=>$this->data,'ac_number'=> $this->ac_number, 'password'=>$this->password]);
    }
}
