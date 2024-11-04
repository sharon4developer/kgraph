<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceSeoRequest;
use App\Http\Requests\Admin\UpdateServiceSeoRequest;
use App\Models\ServiceSeo;
use Exception;
use Illuminate\Http\Request;

class ServiceSeoController extends Controller
{
    public function store(StoreServiceSeoRequest $request)
    {
        try{
            $save= ServiceSeo::createData($request);

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
        $data = ServiceSeo::getData($request->service_id);
        return $data;
    }
}
