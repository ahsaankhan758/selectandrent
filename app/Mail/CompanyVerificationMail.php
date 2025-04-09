<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompanyVerificationMail extends Mailable implements ShouldQueue

{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

      /**
     * Build the message.
     */
    // public function build()
    // {
    //     return $this->subject('Please Verify Your Company Registration')
    //                 ->view('website.email.emailtemplate');
    // }
    public function build()
    {
        return $this->subject('Please Verify Your Company Registration')
            ->view('website.email.emailtemplate')
            ->with([
                'logo' => $this->embed(public_path('company-assets/icons/select-and-rent-logo-3.png')),
                'facebook' => $this->embed(public_path('company-assets/icons/socials(3).png')),
                'twitter' => $this->embed(public_path('company-assets/icons/socials.png')),
                'instagram' => $this->embed(public_path('company-assets/icons/socials(2).png')),
                'linkedin' => $this->embed(public_path('company-assets/icons/socials(1).png')),
            ]);
    }
    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Company Verification Mail',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
