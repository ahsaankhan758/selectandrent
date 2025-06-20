<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RefundedMail extends Mailable
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
        if( $this->recipientType == 'customer' ) 
            $view = 'admin.emails.booking_refunded';
        elseif( $this->recipientType == 'company' )
            $view = 'admin.emails.booking_refunded_owner_emplyoee';
        

        if( $this->recipientType == 'customer' ) 
            $subject = 'A Refund Has Been Issued For Yor Booking';
        elseif( $this->recipientType == 'company' )
            $subject = 'A Refund Has Been Issued For Yor Booking';
        

        return $this->subject($subject)
                    ->view($view)
                    ->with([
                        'booking' => $this->booking,
                        'recipientType' => $this->recipientType
                    ]);
    }
}
