<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTermsAndConditionRequest;
use App\Http\Requests\Admin\UpdateTermsAndConditionRequest;
use App\Models\TermsAndCondition;
use Exception;
use Illuminate\Http\Request;

class TermsAndConditionController extends Controller
{
    public function index()
    {
        $title = 'Terms And Condition';
        $sub_title = 'Terms And Condition';

        $data = TermsAndCondition::getData();

        return view('admin.terms-and-condition.index',compact('title','sub_title','data'));
    }

    public function store(StoreTermsAndConditionRequest $request)
    {
        try{
            $save= TermsAndCondition::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/terms-and-condition',
                ];
            }else{
                $response=[
                    'status'=>false,
                    'message'=>'Something wrong please try again.',
                ];
            }

        }catch(Exception $e){
            $response=[
                'status'=>false,
                'message'=>'Something went wrong please try again.',
                'error'=>$e->getMessage(),
            ];
        }
        return response()->json($response);
    }
}
