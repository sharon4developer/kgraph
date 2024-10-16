<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Cms;
use App\Models\Explore;
use App\Models\Faq;
use App\Models\Journey;
use App\Models\Page;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Testimonial;
use App\Models\WhoWeAre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::getFullDataForHome();
        $serviceCategory = ServiceCategory::getFullDataForHome();
        $whoweare = WhoWeAre::getFullDataForHome();
        $journey = Journey::getFullDataForHome();
        $certificate = Certificate::getFullDataForHome();
        $testimonials = Testimonial::getFullDataForHome();
        $blogs = Blog::getFullDataForHome();
        $explore = Explore::getFullDataForHome();
        $faqs = Faq::getFullDataForHome();
        $seo = Page::getSeoDetails(request()->path());
        $cms = $titles = NULL;
        if ($seo && $seo->id) {
            $cms = Cms::getContents($seo->id);
        }
        return view('frontend.pages.home', compact('certificate', 'testimonials', 'seo', 'cms', 'banner','serviceCategory','whoweare','journey','blogs','explore','faqs'));
    }
}
