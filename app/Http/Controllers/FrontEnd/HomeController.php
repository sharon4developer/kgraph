<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Certificate;
use App\Models\Cms;
use App\Models\Page;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $certificate = Certificate::getFullDataForHome();
        $testimonials = Testimonial::getFullDataForHome();
        $seo = Page::getSeoDetails(request()->path());
        $cms = $titles = NULL;
        $banner = Banner::getFullDataForHome();
        if ($seo && $seo->id) {
            $cms = Cms::getContents($seo->id);
        }
        return view('frontend.pages.home', compact('certificate', 'testimonials', 'seo', 'cms', 'banner'));
    }
}
