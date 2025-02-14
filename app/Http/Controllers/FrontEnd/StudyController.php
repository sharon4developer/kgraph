<?php

namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use App\Models\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    public function index()
    {

        $study = Study::getFullDataForHome();




        return view('frontend.pages.study', compact('study'));
    }
}
