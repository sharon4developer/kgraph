<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCareerBranchRequest;
use App\Http\Requests\Admin\UpdateCareerBranchRequest;
use App\Models\CareerBranch;
use Exception;
use Illuminate\Http\Request;

class CareerBranchController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('career-branches'), 403);
        $title = 'Career Branch';
        $sub_title = 'Career Branch';

        return view('admin.career-branch.index',compact('title','sub_title'));
    }

    public function create()
    {
        abort_unless(Gate::allows('career-branches-create'), 403);
        $title = 'Career Branch';
        $sub_title = 'Add';
        return view('admin.career-branch.create',compact('title','sub_title'));
    }

    public function store(StoreCareerBranchRequest $request)
    {
        abort_unless(Gate::allows('career-branches-create'), 403);
        try{
            $save= CareerBranch::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/career-branches',
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
        abort_unless(Gate::allows('career-branches'), 403);
        $data = CareerBranch::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('career-branches-edit'), 403);
        $data = CareerBranch::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Career Branch';
        $sub_title = 'Edit';
        return view('admin.career-branch.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateCareerBranchRequest $request, $id)
    {
        abort_unless(Gate::allows('career-branches-edit'), 403);
        try{
            $save= CareerBranch::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/career-branches',
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
        abort_unless(Gate::allows('career-branches-delete'), 403);
        $delete = CareerBranch::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = CareerBranch::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        CareerBranch::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
