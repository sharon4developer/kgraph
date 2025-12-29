<?php

namespace App\Models;
use App\Helpers\UnifiedMailer;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = ['email', 'name', 'country_code', 'mobile', 'message', 'order', 'service_of_interest', 'preferred_contact_method'];

    public static function getFullData($request)
    {
        $value =  SELF::select('email', 'id', 'created_at', 'name', 'country_code', 'mobile', 'message')->orderBy('order', 'asc');
        if ($request->has('from_date') && $request->filled('from_date')) {
            $value->whereDate('created_at', '>=', $request->input('from_date'));
        }

        if ($request->has('to_date') && $request->filled('to_date')) {
            $value->whereDate('created_at', '<=', $request->input('to_date'));
        }

        return DataTables::of($value)
            ->addIndexColumn()
            ->editColumn('mobile', function ($row) {
                return $row->country_code . $row->mobile;
            })
            ->editColumn('created_at', function ($row) {
                return date('Y-m-d H:i:s', strtotime($row->created_at));
            })
            ->addColumn('can_delete', function ($row) {
                return Gate::allows('contact-delete');
            })
            ->addColumn('can_edit', function ($row) {
                return Gate::allows('contact-edit');
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'edit', 'delete'])
            ->make(true);
    }
/*
    public static function saveContact($data)
    {
        $value = new Contact;
        $value->name = $data->name;
        $value->email = $data->email;
        $value->country_code = $data->country;
        $value->mobile = $data->mobile;
        $value->message = $data->message;

        $value->save();

        $contactData = [
            'name' => $data->name,
            'email' => $data->email,
            'mobile' => $data->country . ' ' . $data->mobile,
            'message' => $data->message,
        ];

        // Send the email
        $email = whatsApp::first('email');

        if (isset($email) && isset($email->email)) {

            Mail::to($email->email)->send(new ContactMessage($contactData));
        }
        return true;
    }
    */
    
    
    /**
     * Save a new contact message and send email via PHP mail().
     *
     * @param  object  $data
     * @return bool
     */
    public static function saveContact($data)
    {
        // 1) Persist the record
        $value = new self;
        // Combine first_name and last_name if they exist, otherwise use name
        $value->name = isset($data->first_name) && isset($data->last_name) 
            ? trim($data->first_name . ' ' . $data->last_name) 
            : ($data->name ?? '');
        $value->email        = $data->email;
        // Handle phone - if it's a single field, try to extract country code
        if (isset($data->phone)) {
            // If phone starts with +, extract country code
            $phone = $data->phone;
            if (strpos($phone, '+') === 0) {
                // Try to extract country code (assume 1-3 digits after +)
                preg_match('/^\+(\d{1,3})\s*(.+)$/', $phone, $matches);
                if (!empty($matches)) {
                    $value->country_code = '+' . $matches[1];
                    $value->mobile = $matches[2];
                } else {
                    $value->country_code = '+1'; // Default
                    $value->mobile = str_replace('+', '', $phone);
                }
            } else {
                $value->country_code = $data->country ?? '+1';
                $value->mobile = $phone;
            }
        } else {
            $value->country_code = $data->country ?? '+1';
            $value->mobile = $data->mobile ?? '';
        }
        $value->message      = $data->message ?? '';
        $value->service_of_interest = $data->service_of_interest ?? null;
        $value->preferred_contact_method = $data->preferred_contact_method ?? null;
        $value->save();

        // 2) Prepare data for the view
        $contactData = [
            'name'    => $value->name,
            'email'   => $value->email,
            'mobile'  => $value->country_code . ' ' . $value->mobile,
            'message' => $value->message,
            'service_of_interest' => $value->service_of_interest,
            'preferred_contact_method' => $value->preferred_contact_method,
        ];

        // 3) Find the recipient
        $recipient = whatsApp::value('email');
        if (! $recipient) {
            return true; // nothing to send to
        }

        // 4) Handle file uploads and prepare attachment paths
        $attachmentPaths = [];
        if ($data->hasFile('file')) {
            $file = $data->file('file');
            
            // Store file using the same method as careers form
            $filename = Cms::storeImage($file, $value->name);
            
            // Get full path for email attachment using Storage disk
            $fullPath = Storage::disk('career')->path($filename);
            if (file_exists($fullPath)) {
                $attachmentPaths[] = $fullPath;
            }
        }
        
        // Handle multiple files if needed (e.g., documents array)
        if ($data->hasFile('files')) {
            foreach ($data->file('files') as $file) {
                if ($file && $file->isValid()) {
                    $filename = Cms::storeImage($file, $value->name);
                    $fullPath = Storage::disk('career')->path($filename);
                    if (file_exists($fullPath)) {
                        $attachmentPaths[] = $fullPath;
                    }
                }
            }
        }

        // 5) Render the HTML body
        // FIX: Use $value->name instead of $data->name
        $subject  = "New contact message from {$value->name}";
        $htmlBody = view('emails.contact_message', [
            'contactData' => $contactData,
        ])->render();

        // 6) Send with UnifiedMailer (SMTP primary, RawMailer fallback)
        UnifiedMailer::sendWithAttachments(
            $recipient,
            $subject,
            $htmlBody,
            $attachmentPaths
        );

        // 7) Send confirmation email to sender
        $confirmationSubject = "Thank You for Your Consultation Request - KGraph";
        $confirmationBody = view('emails.contact_confirmation', [
            'contactData' => $contactData,
        ])->render();

        UnifiedMailer::sendWithAttachments(
            $value->email,
            $confirmationSubject,
            $confirmationBody,
            [] // No attachments for confirmation
        );

        return true;
    }

    
    
    

    public static function deleteData($data)
    {
        $value = SELF::find($data->id);
        if ($value) {
            $value->delete();
            return true;
        } else
            return false;
    }

    public static function updateOrder($data)
    {
        foreach ($data->order as $key => $value) {
            $step = SELF::find($value['id']);
            if ($step) {
                $step->order = $key;
                $step->save();
            }
        }
        return true;
    }
}
