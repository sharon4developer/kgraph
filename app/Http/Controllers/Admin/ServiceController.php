<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceRequest;
use App\Http\Requests\Admin\UpdateServiceRequest;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $title = 'Services';
        $sub_title = 'Services';

        return view('admin.services.index',compact('title','sub_title'));
    }

    public function create()
    {
        $title = 'Services';
        $sub_title = 'Add';
        return view('admin.services.create',compact('title','sub_title'));
    }

    public function store(StoreServiceRequest $request)
    {
        try{
            $save= Service::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/services',
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
        $data = Service::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        $data = Service::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Services';
        $sub_title = 'Edit';
        return view('admin.services.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateServiceRequest $request, $id)
    {
        try{
            $save= Service::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/services',
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
        $delete = Service::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Service::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Service::updareOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
