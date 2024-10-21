<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageContent;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::getFullDataForHome();
        $packageContents = PackageContent::getFullDataForHome();

        return view('frontend.pages.packages',compact('packages','packageContents'));
    }

    public function packageDetails($id)
    {
        $package = Package::getData($id);

        return view('frontend.pages.packages-detail', compact('package'));
    }
}
