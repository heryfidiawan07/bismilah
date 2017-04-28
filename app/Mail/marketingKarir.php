<?php

namespace App\Mail;

use App\Marketing;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class marketingKarir extends Mailable
{
    use Queueable, SerializesModels;
    public $marketing;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Marketing $marketing)
    {
        $this->marketing = $marketing;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.karir');
    }
}
