<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $company;
    public $status; // 'active' or 'inactive'

    public function __construct($company, $status)
    {
        $this->company = $company;
        $this->status = $status;
    }

    public function build()
    {
        $view = $this->status === 'active'
            ? 'admin.emails.companyActivated'
            : 'admin.emails.companyDeactivated';

        return $this->subject("Company Status Updated: " . ucfirst($this->status))
                    ->view($view)
                    ->with([
                        'company' => $this->company,
                    ]);
    }
}


