<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $messageText;

    public function __construct(Booking $booking, $messageText)
    {
        $this->booking = $booking;
        $this->messageText = $messageText;
    }

    public function build()
    {
        return $this->subject('Booking Status Update')
                    ->view('admin.emails.booking-status');
    }
}
