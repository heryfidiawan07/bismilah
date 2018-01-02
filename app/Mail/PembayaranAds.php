<?php

namespace App\Mail;

use App\Advertising;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PembayaranAds extends Mailable
{
    use Queueable, SerializesModels;
    public $ads;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Advertising $ads)
    {
        $this->ads = $ads;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.adscheckout');
    }
}
