<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {

        $address = 'team@sonicflow.com';
        $subject = 'Sonic Flow: Recover Password';
        $name = 'SonicFlow Team';

        return $this->view('emails.recoverPasswordEmail')
            ->from($address, $name)
            ->cc($address, $name)
            ->bcc($address, $name)
            ->replyTo($address, $name)
            ->subject($subject)
            ->with([ 'message_text' => $this->data['message_text'], 'link' => $this->data['link']]);
    }

}
