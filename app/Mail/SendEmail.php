<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailSubject;
    public $emailMessage;
    public $status;

    public function __construct($subject, $emailMessage, $status)
    {
        $this->emailSubject = $subject;
        $this->emailMessage = $emailMessage;
        $this->status = $status;
    }

    public function build()
    {
        return $this->view('emails.index')
                    ->subject($this->emailSubject)
                    ->with([
                        'emailMessage' => $this->emailMessage,
                        'status' => $this->status
                    ]);
    }
}
