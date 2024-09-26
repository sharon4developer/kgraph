<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCareerRequest;
use App\Http\Requests\Admin\UpdateCareerRequest;
use App\Models\Career;
use Exception;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $title = 'Careers';
        $sub_title = 'Careers';

        return view('admin.careers.index',compact('title','sub_title'));
    }

    public function create()
    {
        $title = 'Careers';
        $sub_title = 'Add';
        return view('admin.careers.create',compact('title','sub_title'));
    }

    public function store(StoreCareerRequest $request)
    {
        try{
            $save= Career::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/careers',
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
        $data = Career::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        $data = Career::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Careers';
        $sub_title = 'Edit';
        return view('admin.careers.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateCareerRequest $request, $id)
    {
        try{
            $save= Career::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/careers',
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
        $delete = Career::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Career::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Career::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
