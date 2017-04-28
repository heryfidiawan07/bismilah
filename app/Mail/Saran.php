<?php

namespace App\Mail;

use App\Kritik;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Saran extends Mailable
{
    use Queueable, SerializesModels;
    public $kritik;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Kritik $kritik)
    {
        $this->kritik = $kritik;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.kritik');
    }
}
