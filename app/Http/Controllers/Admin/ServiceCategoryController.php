<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceCategoryRequest;
use App\Http\Requests\Admin\UpdateServiceCategoryRequest;
use App\Models\ServiceCategory;
use Exception;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('service-categories'), 403);
        $title = 'Service Category';
        $sub_title = 'Service Category';

        return view('admin.service-category.index',compact('title','sub_title'));
    }

    public function create()
    {
        abort_unless(Gate::allows('service-categories-create'), 403);
        $title = 'Service Category';
        $sub_title = 'Add';
        return view('admin.service-category.create',compact('title','sub_title'));
    }

    public function store(StoreServiceCategoryRequest $request)
    {
        abort_unless(Gate::allows('service-categories-create'), 403);
        try{
            $save= ServiceCategory::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/service-categories',
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
        abort_unless(Gate::allows('service-categories'), 403);
        $data = ServiceCategory::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('service-categories-edit'), 403);
        $data = ServiceCategory::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Service Category';
        $sub_title = 'Edit';
        return view('admin.service-category.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateServiceCategoryRequest $request, $id)
    {
        abort_unless(Gate::allows('service-categories-edit'), 403);
        try{
            $save= ServiceCategory::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/service-categories',
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
        abort_unless(Gate::allows('service-categories-delete'), 403);
        $delete = ServiceCategory::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = ServiceCategory::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        ServiceCategory::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
