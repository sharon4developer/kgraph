<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use App\Models\TermsAndCondition;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function termsConditions()
    {
        $data = TermsAndCondition::getData();

        return view('frontend.pages.terms',compact('data'));
    }

    public function privacyPolicy()
    {
        $data = PrivacyPolicy::getData();

        return view('frontend.pages.privacy',compact('data'));
    }
}
