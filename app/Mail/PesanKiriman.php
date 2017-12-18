<?php

namespace App\Mail;

use App\Pesan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PesanKiriman extends Mailable
{
    use Queueable, SerializesModels;
    public $pesan;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pesan $pesan)
    {
        $this->pesan = $pesan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.pesan');
    }
}
