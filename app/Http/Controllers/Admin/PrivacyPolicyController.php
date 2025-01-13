<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePrivacyPolicyRequest;
use App\Http\Requests\Admin\UpdatePrivacyPolicyRequest;
use App\Models\PrivacyPolicy;
use Exception;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('privacy-policy'), 403);
        $title = 'Privacy Policy';
        $sub_title = 'Privacy Policy';

        $data = PrivacyPolicy::getData();

        return view('admin.privacy-policy.index',compact('title','sub_title','data'));
    }

    public function store(StorePrivacyPolicyRequest $request)
    {
        abort_unless(Gate::allows('privacy-policy-create'), 403);
        try{
            $save= PrivacyPolicy::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/privacy-policy',
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
