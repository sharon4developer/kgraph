<?php

namespace App\Http\Controllers\Admin;

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
        $title = 'Package Points';
        $sub_title = 'Package Points';

        $packages = Package::getFullDataForHome();

        return view('admin.package-points.index',compact('title','sub_title','packages'));
    }

    public function create()
    {
        $title = 'Package Points';
        $sub_title = 'Add';

        $packages = Package::getFullDataForHome();

        return view('admin.package-points.create',compact('title','sub_title','packages'));
    }

    public function store(StorePackagePointRequest $request)
    {
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
        $data = PackagePoint::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
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
