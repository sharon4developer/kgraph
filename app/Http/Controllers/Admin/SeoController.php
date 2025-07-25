<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSeoRequest;
use App\Http\Requests\Admin\UpdateSeoRequest;
use App\Models\Seo;
use Exception;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function store(StoreSeoRequest $request)
    {
        abort_unless(Gate::allows('seo-create'), 403);
        try{
            $save= Seo::createData($request);

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
        abort_unless(Gate::allows('seo'), 403);
        $data = Seo::getData($request->page_id);
        return $data;
    }
}
