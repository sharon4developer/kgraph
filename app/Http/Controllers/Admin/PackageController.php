<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePackageRequest;
use App\Http\Requests\Admin\UpdatePackageRequest;
use App\Models\Package;
use Exception;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('packages'), 403);
        $title = 'Packages';
        $sub_title = 'Packages';

        return view('admin.packages.index',compact('title','sub_title'));
    }

    public function create()
    {
        abort_unless(Gate::allows('packages-create'), 403);
        $title = 'Packages';
        $sub_title = 'Add';
        return view('admin.packages.create',compact('title','sub_title'));
    }

    public function store(StorePackageRequest $request)
    {
        abort_unless(Gate::allows('packages-create'), 403);
        try{
            $save= Package::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/packages',
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
        abort_unless(Gate::allows('packages'), 403);
        $data = Package::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('packages-edit'), 403);
        $data = Package::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Packages';
        $sub_title = 'Edit';
        return view('admin.packages.edit',compact('data','title','sub_title'));
    }

    public function update(UpdatePackageRequest $request, $id)
    {
        abort_unless(Gate::allows('packages-edit'), 403);
        try{
            $save= Package::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/packages',
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
        abort_unless(Gate::allows('packages-delete'), 403);
        $delete = Package::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Package::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Package::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
