<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Message;
use App\Helpers\RawMailer;

class UnifiedMailer
{
    /**
     * Send email with HTML body and attachments.
     * Tries SMTP first, falls back to RawMailer if SMTP fails.
     *
     * @param  string       $to
     * @param  string       $subject
     * @param  string       $htmlMessage
     * @param  array<string> $attachmentPaths
     * @param  string|null  $fromEmail
     * @param  string|null  $fromName
     * @return bool
     */
    public static function sendWithAttachments(
        string $to,
        string $subject,
        string $htmlMessage,
        array $attachmentPaths = [],
        ?string $fromEmail = null,
        ?string $fromName = null
    ): bool {
        // Get from address/name from config if not provided
        $fromEmail = $fromEmail ?? config('mail.from.address', 'Marketing@kgraph.ca');
        $fromName = $fromName ?? config('mail.from.name', 'KGraph Support');

        // Try SMTP first (Laravel Mail)
        try {
            // Check if SMTP is configured (not 'log' or 'array')
            $mailer = config('mail.default');
            
            if (in_array($mailer, ['log', 'array'])) {
                // SMTP not configured, skip to fallback
                throw new \Exception("Mailer is set to '{$mailer}', using fallback");
            }

            // Try sending via Laravel Mail with SMTP
            Mail::send([], [], function (Message $message) use ($to, $subject, $htmlMessage, $attachmentPaths, $fromEmail, $fromName) {
                $message->to($to)
                    ->subject($subject)
                    ->from($fromEmail, $fromName)
                    ->html($htmlMessage);

                // Attach files
                foreach ($attachmentPaths as $path) {
                    if (is_file($path)) {
                        $message->attach($path);
                    }
                }
            });

            Log::info('UnifiedMailer: Email sent successfully via SMTP', [
                'to' => $to,
                'subject' => $subject,
                'mailer' => $mailer,
            ]);

            return true;

        } catch (\Exception $e) {
            // SMTP failed, log and fallback to RawMailer
            Log::warning('UnifiedMailer: SMTP failed, falling back to RawMailer', [
                'to' => $to,
                'subject' => $subject,
                'error' => $e->getMessage(),
                'mailer' => config('mail.default'),
            ]);

            // Fallback to RawMailer (PHP mail())
            try {
                $result = RawMailer::sendWithAttachments($to, $subject, $htmlMessage, $attachmentPaths);
                
                if ($result) {
                    Log::info('UnifiedMailer: Email sent successfully via RawMailer fallback', [
                        'to' => $to,
                        'subject' => $subject,
                    ]);
                } else {
                    Log::error('UnifiedMailer: Both SMTP and RawMailer failed', [
                        'to' => $to,
                        'subject' => $subject,
                    ]);
                }

                return $result;

            } catch (\Exception $fallbackException) {
                Log::error('UnifiedMailer: RawMailer fallback also failed', [
                    'to' => $to,
                    'subject' => $subject,
                    'error' => $fallbackException->getMessage(),
                ]);

                return false;
            }
        }
    }
}

