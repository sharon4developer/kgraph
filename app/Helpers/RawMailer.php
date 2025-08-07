<?php
namespace App\Helpers;

class RawMailer
{
    /**
     * Send an email with HTML body and attachments via PHP mail().
     *
     * @param  string       $to
     * @param  string       $subject
     * @param  string       $htmlMessage
     * @param  array<string> $attachmentPaths
     * @return bool
     */
    public static function sendWithAttachments(string $to, string $subject, string $htmlMessage, array $attachmentPaths = []): bool
    {
        // Build boundaries
        $mixedBoundary = '==MIXED_' . md5(uniqid((string) time(), true));
        $altBoundary   = '==ALT_'   . md5(uniqid((string) time() + 1, true));

        // Headers
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"{$mixedBoundary}\"\r\n";
        // NOTE: “From” header can be set here or passed in.
        $headers .= "From: KGraph Support <Marketing@kgraph.ca>\r\n";

        // Start multipart/mixed
        $body  = "--{$mixedBoundary}\r\n";
        $body .= "Content-Type: multipart/alternative; boundary=\"{$altBoundary}\"\r\n\r\n";

        // Plain‐text fallback
        $plain = strip_tags($htmlMessage);
        $body .= "--{$altBoundary}\r\n";
        $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $body .= $plain . "\r\n\r\n";

        // HTML part
        $body .= "--{$altBoundary}\r\n";
        $body .= "Content-Type: text/html; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $body .= $htmlMessage . "\r\n\r\n";

        // Close alternative
        $body .= "--{$altBoundary}--\r\n\r\n";

        // Attach files
        foreach ($attachmentPaths as $path) {
            if (is_file($path)) {
                $filename = basename($path);
                $data     = chunk_split(base64_encode(file_get_contents($path)));
                $type     = mime_content_type($path) ?: 'application/octet-stream';

                $body .= "--{$mixedBoundary}\r\n";
                $body .= "Content-Type: {$type}; name=\"{$filename}\"\r\n";
                $body .= "Content-Transfer-Encoding: base64\r\n";
                $body .= "Content-Disposition: attachment; filename=\"{$filename}\"\r\n\r\n";
                $body .= $data . "\r\n\r\n";
            }
        }

        // Close mixed
        $body .= "--{$mixedBoundary}--\r\n";

        // Send
        return mail($to, $subject, $body, $headers);
    }
}
