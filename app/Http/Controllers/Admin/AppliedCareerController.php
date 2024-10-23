<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppliedCareer;
use Illuminate\Http\Request;

class AppliedCareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Careers';
        $sub_title = 'Careers';

        return view('admin.applied-career.index',compact('title','sub_title'));
    }

    public function show(Request $request)
    {
        $data = AppliedCareer::getFullData($request);
        return $data;
    }
}
