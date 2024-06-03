<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PayslipEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $pdf;

    public function __construct($pdf)
    {
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this->view('emails.payslip')
                    ->attachData($this->pdf->output(), 'payslip.pdf');
    }
}
