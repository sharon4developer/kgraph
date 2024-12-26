<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CareerApplication extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;
    public $resume;
    public $message;

    /**
     * Create a new message instance.
     *
     * @param array $data
     * @param mixed $resume
     */
    public function __construct($data, $resume,$message)
    {
        $this->contactData = $data;
        $this->resume = $resume;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->subject('New Career Application - ' . $this->contactData['jobName'])
                      ->view('emails.career_application')
                      ->with('data', $this->contactData);

        // Attach the resume file if available
        if ($this->resume) {
            $email->attach($this->resume->getRealPath(), [
                'as' => $this->resume->getClientOriginalName(),
                'mime' => $this->resume->getMimeType(),
            ]);
        }

        if ($this->message) {
            $email->attach($this->message->getRealPath(), [
                'as' => $this->message->getClientOriginalName(),
                'mime' => $this->message->getMimeType(),
            ]);
        }

        return $email;
    }
}
