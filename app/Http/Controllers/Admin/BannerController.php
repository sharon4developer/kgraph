<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBannerRequest;
use App\Http\Requests\Admin\UpdateBannerRequest;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $title = 'Banners';
        $sub_title = 'Banners';

        return view('admin.banners.index',compact('title','sub_title'));
    }

    public function create()
    {
        $title = 'Banners';
        $sub_title = 'Add';
        return view('admin.banners.create',compact('title','sub_title'));
    }

    public function store(StoreBannerRequest $request)
    {
        try{
            $save= Banner::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/banners',
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
        $data = Banner::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        $data = Banner::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Banners';
        $sub_title = 'Edit';
        return view('admin.banners.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateBannerRequest $request, $id)
    {
        try{
            $save= Banner::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/banners',
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

    public function destroy(Request $request)
    {
        $delete = Banner::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Banner::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Banner::updareOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
