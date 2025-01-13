<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCareerDepartmentRequest;
use App\Http\Requests\Admin\UpdateCareerDepartmentRequest;
use App\Models\CareerDepartment;
use Exception;
use Illuminate\Http\Request;

class CareerDepartmentController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('careers-departments'), 403);
        $title = 'Career Department';
        $sub_title = 'Career Department';

        return view('admin.career-department.index',compact('title','sub_title'));
    }

    public function create()
    {
        abort_unless(Gate::allows('careers-departments-create'), 403);
        $title = 'Career Branch';
        $sub_title = 'Add';
        return view('admin.career-department.create',compact('title','sub_title'));
    }

    public function store(StoreCareerDepartmentRequest $request)
    {
        abort_unless(Gate::allows('careers-departments-create'), 403);
        try{
            $save= CareerDepartment::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/career-departments',
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
        abort_unless(Gate::allows('careers-departments'), 403);
        $data = CareerDepartment::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('careers-departments-edit'), 403);
        $data = CareerDepartment::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Career Department';
        $sub_title = 'Edit';
        return view('admin.career-department.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateCareerDepartmentRequest $request, $id)
    {
        abort_unless(Gate::allows('careers-departments-edit'), 403);
        try{
            $save= CareerDepartment::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/career-departments',
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
        abort_unless(Gate::allows('careers-departments-delete'), 403);
        $delete = CareerDepartment::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = CareerDepartment::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        CareerDepartment::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
