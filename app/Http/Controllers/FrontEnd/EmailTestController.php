<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class EmailTestController extends Controller
{
    /**
     * Show the email test form
     */
    public function show()
    {
        return view('frontend.pages.test-email');
    }

    /**
     * Send test email
     */
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'to' => ['required', 'email'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
            'mailer_type' => ['nullable', 'string', 'in:smtp,sendmail,log'],
            'smtp_host' => ['nullable', 'string'],
            'smtp_port' => ['nullable', 'integer'],
            'smtp_username' => ['nullable', 'string'],
            'smtp_password' => ['nullable', 'string'],
            'smtp_encryption' => ['nullable', 'string', 'in:tls,ssl'],
            'from_email' => ['nullable', 'email'],
            'from_name' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            // Determine mailer type
            $mailerType = $request->input('mailer_type', 'smtp');
            
            // Configure mailer based on type
            if ($mailerType === 'sendmail') {
                // Use sendmail transport
                Config::set('mail.default', 'sendmail');
            } elseif ($mailerType === 'log') {
                // Use log transport for debugging
                Config::set('mail.default', 'log');
            } else {
                // Configure SMTP dynamically if override values provided or use defaults
                Config::set('mail.default', 'smtp');
                
                if ($request->filled('smtp_host')) {
                    Config::set('mail.mailers.smtp.host', $request->smtp_host);
                }
                if ($request->filled('smtp_port')) {
                    Config::set('mail.mailers.smtp.port', $request->smtp_port);
                }
                if ($request->filled('smtp_username')) {
                    Config::set('mail.mailers.smtp.username', $request->smtp_username);
                } else {
                    // For localhost, ensure username is empty
                    if ($request->input('smtp_host') === 'localhost') {
                        Config::set('mail.mailers.smtp.username', null);
                    }
                }
                if ($request->filled('smtp_password')) {
                    Config::set('mail.mailers.smtp.password', $request->smtp_password);
                } else {
                    // For localhost, ensure password is empty
                    if ($request->input('smtp_host') === 'localhost') {
                        Config::set('mail.mailers.smtp.password', null);
                    }
                }
                // CRITICAL: For localhost, always disable encryption to avoid certificate errors
                if ($request->input('smtp_host') === 'localhost') {
                    Config::set('mail.mailers.smtp.encryption', null);
                    Config::set('mail.mailers.smtp.port', 25);
                } elseif ($request->filled('smtp_encryption')) {
                    Config::set('mail.mailers.smtp.encryption', $request->smtp_encryption);
                } else {
                    // Default encryption based on port
                    $port = $request->smtp_port ?? config('mail.mailers.smtp.port');
                    if ($port == 465) {
                        Config::set('mail.mailers.smtp.encryption', 'ssl');
                    } elseif ($port == 587) {
                        Config::set('mail.mailers.smtp.encryption', 'tls');
                    } elseif ($port == 25) {
                        // Port 25 typically doesn't use encryption
                        Config::set('mail.mailers.smtp.encryption', null);
                    }
                }
            }
            
            if ($request->filled('from_email')) {
                Config::set('mail.from.address', $request->from_email);
            }
            if ($request->filled('from_name')) {
                Config::set('mail.from.name', $request->from_name);
            }

            // Log the configuration being used
            Log::info('Email Test - Configuration', [
                'mailer' => config('mail.default'),
                'host' => config('mail.mailers.smtp.host'),
                'port' => config('mail.mailers.smtp.port'),
                'username' => config('mail.mailers.smtp.username'),
                'encryption' => config('mail.mailers.smtp.encryption'),
                'from' => config('mail.from.address'),
                'from_name' => config('mail.from.name'),
                'to' => $request->to,
                'subject' => $request->subject,
            ]);

            // Send email using Mail facade with dynamic configuration
            try {
                Mail::raw($request->message, function ($message) use ($request) {
                    $message->to($request->to)
                        ->subject($request->subject);
                    
                    if ($request->filled('from_email')) {
                        $message->from($request->from_email, $request->from_name ?? config('mail.from.name'));
                    }
                });
                
                Log::info('Email Test - Sent successfully', [
                    'to' => $request->to,
                    'from' => $request->from_email ?? config('mail.from.address'),
                    'mailer' => config('mail.default'),
                ]);
                
                $successMessage = 'Email sent successfully! ';
                if ($mailerType === 'log') {
                    $successMessage .= 'Email logged to storage/logs/laravel.log (check the log file to see the email content).';
                } else {
                    $successMessage .= 'Check your inbox and Laravel logs (storage/logs/laravel.log) for delivery details.';
                }
                
                return back()->with('success', $successMessage);
            } catch (\Swift_TransportException $e) {
                Log::error('Email Test - Transport Error', [
                    'error' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'to' => $request->to,
                    'host' => config('mail.mailers.smtp.host'),
                    'port' => config('mail.mailers.smtp.port'),
                ]);
                throw $e;
            } catch (\Exception $e) {
                Log::error('Email Test - General Error', [
                    'error' => $e->getMessage(),
                    'class' => get_class($e),
                    'to' => $request->to,
                ]);
                throw $e;
            }
        } catch (\Exception $e) {
            $errorMessage = 'Failed to send email: ' . $e->getMessage();
            
            // Provide helpful troubleshooting tips based on error type
            $troubleshooting = '';
            if (strpos($e->getMessage(), 'Connection timed out') !== false || 
                strpos($e->getMessage(), 'Connection could not be established') !== false) {
                $troubleshooting = "\n\n💡 Troubleshooting Tips:\n" .
                    "• Try 'localhost' with port 25 (no authentication needed)\n" .
                    "• Try 'Sendmail' transport option (works on most shared hosting)\n" .
                    "• The relay server may be blocked - localhost is usually more reliable\n" .
                    "• Check if port 25 or 587 is blocked by your hosting provider";
            } elseif (strpos($e->getMessage(), 'Authentication failed') !== false) {
                $troubleshooting = "\n\n💡 Troubleshooting Tips:\n" .
                    "• For localhost: Leave username and password empty\n" .
                    "• For relay: Use your cPanel username and password\n" .
                    "• Try 'localhost' option which doesn't require authentication";
            }
            
            return back()->with('error', $errorMessage . $troubleshooting)->withInput();
        }
    }
}

