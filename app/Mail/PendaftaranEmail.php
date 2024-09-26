<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PendaftaranEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $pendaftaran;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pendaftaran)
    {
        $this->pendaftaran = $pendaftaran;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('faris28dc@gmail.com')
        ->subject('Status Pendaftaran Anda')
        ->view('emails.pendaftaran');    }
}
