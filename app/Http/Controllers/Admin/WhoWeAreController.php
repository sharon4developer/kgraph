<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreWhoWeAreRequest;
use App\Http\Requests\Admin\UpdateWhoWeAreRequest;
use App\Models\WhoWeAre;
use Exception;
use Illuminate\Http\Request;

class WhoWeAreController extends Controller
{
    public function index()
    {
        $title = 'Who We Are';
        $sub_title = 'Who We Are';

        return view('admin.who-we-are.index',compact('title','sub_title'));
    }

    public function create()
    {
        $title = 'Who We Are';
        $sub_title = 'Add';
        return view('admin.who-we-are.create',compact('title','sub_title'));
    }

    public function store(StoreWhoWeAreRequest $request)
    {
        try{
            $save= WhoWeAre::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/who-we-are',
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
        $data = WhoWeAre::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        $data = WhoWeAre::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Who We Are';
        $sub_title = 'Edit';
        return view('admin.who-we-are.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateWhoWeAreRequest $request, $id)
    {
        try{
            $save= WhoWeAre::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/who-we-are',
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
        $delete = WhoWeAre::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = WhoWeAre::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        WhoWeAre::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
