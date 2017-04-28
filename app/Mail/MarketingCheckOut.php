<?php

namespace App\Mail;

use App\Pembayaran;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MarketingCheckOut extends Mailable
{
    use Queueable, SerializesModels;
    public $bayar;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pembayaran $bayar)
    {
        $this->bayar = $bayar;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.bayar');
    }
}
