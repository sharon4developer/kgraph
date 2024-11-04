<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerBranch;
use App\Models\CareerDepartment;
use App\Models\Page;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::getFullDataForHome();

        $branches = CareerBranch::getFullDataForHome();

        $departments = CareerDepartment::getFullDataForHome();

        $seo = Page::getSeoDetails(request()->path());

        return view('frontend.pages.careers',compact('careers','branches','departments','seo'));
    }
}
