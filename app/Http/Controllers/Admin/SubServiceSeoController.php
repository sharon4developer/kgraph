<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSubServiceSeoRequest;
use App\Http\Requests\Admin\UpdateSubServiceSeoRequest;
use App\Models\SubServiceSeo;
use Exception;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class SubServiceSeoController extends Controller
{
    public function store(StoreSubServiceSeoRequest $request)
    {
        abort_unless(Gate::allows('sub-services'), 403);
        try{
            $save= SubServiceSeo::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
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

    public function show(Request $request)
    {
        abort_unless(Gate::allows('sub-services'), 403);
        $data = SubServiceSeo::getData($request->service_id);
        return $data;
    }
}
