<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EligibilityCheckMail extends Mailable
{
    use Queueable, SerializesModels;

    public $eligibilityData;

    /**
     * Create a new message instance.
     *
     * @param array $eligibilityData
     * @param string|null $resume
     */
    public function __construct($eligibilityData)
    {
        $this->eligibilityData = $eligibilityData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->subject('Eligibility Check Submission')
                      ->view('emails.eligibility_check')
                      ->with('data', $this->eligibilityData);
        return $email;
    }
}
