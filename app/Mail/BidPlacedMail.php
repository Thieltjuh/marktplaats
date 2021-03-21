<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BidPlacedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Array that contains email data
     *
     * @var array
     */
    protected $details;

    /**
     * Create a new message instance.
     *
     * @param $details
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): BidPlacedMail
    {
        return $this->view('emails.bid_placed', ['details' => $this->details]);
    }
}
