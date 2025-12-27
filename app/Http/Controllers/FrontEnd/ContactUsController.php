<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Page;
use App\Models\Service;
use App\Models\SubServices;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $locations = Location::getFullDataForHome();

        $seo = Page::getSeoDetails(request()->path());

        // Fetch active services for the dropdown
        $services = Service::where('status', 1)
            ->select('id', 'title')
            ->orderBy('title', 'asc')
            ->get();
        
        $subServices = SubServices::where('status', 1)
            ->select('id', 'title')
            ->orderBy('title', 'asc')
            ->get();
        
        // Combine and sort alphabetically
        $allServices = $services->merge($subServices)->sortBy('title')->values();

        return view('frontend.pages.contact-new', compact('locations', 'seo', 'allServices'));
    }
}
