<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AuthenticationMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        $userName = $this->data['userName'];
        $password = $this->data['password'];
        return $this->view('mails.credentials',compact('userName','password'))
                ->from(env('MAIL_FROM_EMAIL'),env('MAIL_FROM_NAME'))
                ->replyTo(env('MAIL_FROM_EMAIL'))
                ->subject("Login Credentials Details");
    }
}



