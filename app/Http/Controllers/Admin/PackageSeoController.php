<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePackageSeoRequest;
use App\Http\Requests\Admin\UpdatePackageSeoRequest;
use App\Models\PackageSeo;
use Exception;
use Illuminate\Http\Request;

class PackageSeoController extends Controller
{
    public function store(StorePackageSeoRequest $request)
    {
        abort_unless(Gate::allows('packages-seo'), 403);
        try{
            $save= PackageSeo::createData($request);

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
        abort_unless(Gate::allows('packages-seo'), 403);
        $data = PackageSeo::getData($request->package_id);
        return $data;
    }
}
