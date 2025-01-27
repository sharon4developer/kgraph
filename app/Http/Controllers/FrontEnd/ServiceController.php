<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Cms;
use App\Models\Page;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceContent;
use App\Models\ServiceSeo;
use App\Models\SubServices;
use App\Models\SubServiceSeo;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $serviceCategory = ServiceCategory::getFullDataForHome();
        $certificate = Certificate::getFullDataForHome();
        $seo = Page::getSeoDetails(request()->path());
        $serviceContents = ServiceContent::getFullDataForHome();

        return view('frontend.pages.services', compact('certificate','seo','serviceCategory','serviceContents'));
    }

    public function serviceDetails($slug)
    {
        $services = Service::where('slug',$slug)->first();

        if(!$services){
            abort(404);
        }

        $seo = ServiceSeo::getSeoDetails($services->id);

        return view('frontend.pages.servicesinner', compact('services','seo'));
    }

    public function eligibilityCheck($id=1)
    {
        $seo = Page::getSeoDetails(request()->path());

        return view('frontend.pages.servicesinerform');
    }

    public function subServiceDetails($slug)
    {
        $services = SubServices::where('slug',$slug)->first();

        if(!$services){
            abort(404);
        }

        $seo = SubServiceSeo::getSeoDetails($services->id);

        return view('frontend.pages.subservicesinner', compact('services','seo'));
    }
}
