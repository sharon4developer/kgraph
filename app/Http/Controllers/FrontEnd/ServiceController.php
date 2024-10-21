<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Cms;
use App\Models\Page;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceContent;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $serviceCategory = ServiceCategory::getFullDataForHome();
        $certificate = Certificate::getFullDataForHome();
        $seo = Page::getSeoDetails(request()->path());
        $cms = $titles = NULL;
        if ($seo && $seo->id) {
            $cms = Cms::getContents($seo->id);
        }
        $serviceContents = ServiceContent::getFullDataForHome();

        return view('frontend.pages.services', compact('certificate','seo','serviceCategory','serviceContents'));
    }

    public function serviceDetails($id)
    {
        $services = Service::getData($id);

        return view('frontend.pages.servicesinner', compact('services'));
    }
}
