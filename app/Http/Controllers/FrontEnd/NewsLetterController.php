<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\EligibilityCheck_nRequest;
use App\Models\AppliedCareer;
use App\Models\Contact;
use App\Models\EligibilityCheck;
use App\Models\NewsLetter;
use Exception;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function submitNewsLetter(Request $request)
    {
        // Honeypot: bots fill hidden fields, humans don't
        if ($request->filled('website')) {
            return response()->json(['status' => true, 'message' => 'Thank you for subscribing! We will keep you informed about immigration updates']);
        }
        try {
            $save = NewsLetter::saveNewsLetter($request);
            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Thank you for subscribing! We will keep you informed about immigration updates',
                ];
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Something wrong please try again.',
                ];
            }
        } catch (Exception $e) {
            $response = [
                'status' => false,
                'message' => 'Something went wrong please try again.',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($response);
    }

    public function submitContact(Request $request)
    {
        // Honeypot: bots fill hidden fields, humans don't
        if ($request->filled('website')) {
            return response()->json(['status' => true, 'message' => 'Submitted successfully']);
        }
        try {
            $save = Contact::saveContact($request);
            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Submitted successfully',
                ];
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Something wrong please try again.',
                ];
            }
        } catch (Exception $e) {
            $response = [
                'status' => false,
                'message' => 'Something went wrong please try again.',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($response);
    }

    public function submitCareerNew(EligibilityCheck_nRequest $request)
    {
        // Honeypot: bots fill hidden fields, humans don't
        if ($request->filled('website')) {
            return response()->json(['status' => true, 'message' => 'Submitted successfully']);
        }
        try {
            $save = AppliedCareer::saveCareerNew($request);
            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Submitted successfully',
                ];
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Something wrong please try again.',
                ];
            }
        } catch (Exception $e) {
            $response = [
                'status' => false,
                'message' => 'Something went wrong please try again.',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($response);
    }


    public function submitEligibility(Request $request)
    {
        // Honeypot: bots fill hidden fields, humans don't
        if ($request->filled('website')) {
            return response()->json(['status' => true, 'message' => 'Submitted successfully']);
        }
        try {
            $save = EligibilityCheck::createData($request);
            if ($save) {
                $response = [
                    'status' => true,
                    'message' => 'Submitted successfully',
                ];
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Something wrong please try again.',
                ];
            }
        } catch (Exception $e) {
            $response = [
                'status' => false,
                'message' => 'Something went wrong please try again.',
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($response);
    }
}
