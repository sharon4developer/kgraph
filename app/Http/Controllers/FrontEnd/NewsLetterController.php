<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\EligibilityCheck_nRequest;
use App\Http\Requests\EligibilityCheckRequest;
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

    public function submitCareer(EligibilityCheckRequest $request)
    {
        try {
            $save = AppliedCareer::saveCareer($request);
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
