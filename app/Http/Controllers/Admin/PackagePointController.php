<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePackagePointRequest;
use App\Http\Requests\Admin\UpdatePackagePointRequest;
use App\Models\Package;
use App\Models\PackagePoint;
use Exception;
use Illuminate\Http\Request;

class PackagePointController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('package-points'), 403);
        $title = 'Package Points';
        $sub_title = 'Package Points';

        $packages = Package::getFullDataForHome();

        return view('admin.package-points.index',compact('title','sub_title','packages'));
    }

    public function create()
    {
        abort_unless(Gate::allows('package-points-create'), 403);
        $title = 'Package Points';
        $sub_title = 'Add';

        $packages = Package::getFullDataForHome();

        return view('admin.package-points.create',compact('title','sub_title','packages'));
    }

    public function store(StorePackagePointRequest $request)
    {
        abort_unless(Gate::allows('package-points-create'), 403);
        try{
            $save= PackagePoint::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/package-points',
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
        abort_unless(Gate::allows('package-points'), 403);
        $data = PackagePoint::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('package-points-edit'), 403);
        $data = PackagePoint::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Package Points';
        $sub_title = 'Edit';

        $packages = Package::getFullDataForHome();

        return view('admin.package-points.edit',compact('data','title','sub_title','packages'));
    }

    public function update(UpdatePackagePointRequest $request, $id)
    {
        abort_unless(Gate::allows('package-points-edit'), 403);
        try{
            $save= PackagePoint::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/package-points',
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
        abort_unless(Gate::allows('package-points-delete'), 403);
        $delete = PackagePoint::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = PackagePoint::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        PackagePoint::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
