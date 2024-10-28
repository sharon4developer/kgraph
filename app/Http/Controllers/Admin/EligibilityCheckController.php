<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EligibilityCheck;
use Illuminate\Http\Request;

class EligibilityCheckController extends Controller
{
    public function index()
    {
        $title = 'Eligibility Check';
        $sub_title = 'Eligibility Check';

        return view('admin.eligibility-check.index',compact('title','sub_title'));
    }

    public function show(Request $request)
    {
        $data = EligibilityCheck::getData($request);
        return $data;
    }

    public function edit($id)
    {
        $data = EligibilityCheck::getFullData($id);

        return response()->json(['data'=>$data,'status'=>true]);
    }
}
