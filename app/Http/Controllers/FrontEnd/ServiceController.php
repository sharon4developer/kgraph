<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Cms;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::getFullDataForHome();
        $certificate = Certificate::getFullDataForHome();
        $seo = Page::getSeoDetails(request()->path());
        $cms = $titles = NULL;
        if ($seo && $seo->id) {
            $cms = Cms::getContents($seo->id);
        }
        return view('frontend.pages.services', compact('certificate','services'));
    }
}
