<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerBranch;
use App\Models\CareerDepartment;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::getFullDataForHome();

        $branches = CareerBranch::getFullDataForHome();

        $departments = CareerDepartment::getFullDataForHome();

        return view('frontend.pages.careers',compact('careers','branches','departments'));
    }
}
