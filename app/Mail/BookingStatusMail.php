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
    public $actionType; 

    /**
     * Create a new message instance.
     */
    public function __construct(Booking $booking, $messageText, $actionType = 'pickup')
    {
        $this->booking = $booking;
        $this->messageText = $messageText;
        $this->actionType = $actionType;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Booking Status Update')
                    ->view('admin.emails.booking-status')
                    ->with([
                        'booking' => $this->booking,
                        'messageText' => $this->messageText,
                        'bookingItems' => $this->booking->booking_items,
                        'actionType' => $this->actionType,
                    ]);
    }
}
