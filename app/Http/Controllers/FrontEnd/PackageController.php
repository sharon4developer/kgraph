<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageContent;
use App\Models\PackageSeo;
use App\Models\Page;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::getFullDataForHome();
        $packageContents = PackageContent::getFullDataForHome();
        $seo = Page::getSeoDetails(request()->path());

        return view('frontend.pages.packages',compact('packages','packageContents','seo'));
    }

    public function packageDetails($slug)
    {
        $package = Package::where('slug',$slug)->first();

        if(!$package){
            abort(404);
        }

        $seo = PackageSeo::getSeoDetails($package->id);

        return view('frontend.pages.packages-detail', compact('package','seo'));
    }
}
