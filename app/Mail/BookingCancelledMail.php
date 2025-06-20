<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingCancelledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
   
    public $recipientType;

    public function __construct($booking, $recipientType)
    {
        $this->booking = $booking;
        $this->recipientType = $recipientType;
    }

    public function build()
    {
        //$booking->booking_items->first()->vehicle->company->name ?? ''
        $view = $this->recipientType === 'owner'
            ? 'website.email.booking_cancelled_owner'
            : 'website.email.booking_cancelled_user';

        $subject = $this->recipientType === 'owner'
            ? 'A Booking Has Been Cancelled for Your Vehicle'
            : 'Your Booking Has Been Cancelled';

        return $this->subject($subject)
                    ->view($view)
                    ->with([
                        'booking' => $this->booking,
                    ]);
    }
}
