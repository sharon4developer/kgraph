<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $locations = Location::getFullDataForHome();

        return view('frontend.pages.contact-us',compact('locations'));
    }
}
