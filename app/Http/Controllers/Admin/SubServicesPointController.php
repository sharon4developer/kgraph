<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSubServicesPointRequest;
use App\Http\Requests\Admin\UpdateSubServicesPointRequest;
use App\Models\SubServices;
use App\Models\SubServicesPoint;
use Exception;
use Illuminate\Http\Request;

class SubServicesPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_unless(Gate::allows('sub-service-points'), 403);
        $title = 'Service Points';
        $sub_title = 'Service Points';

        $services = SubServices::getFullDataForHome();

        return view('admin.sub-service-points.index',compact('title','sub_title','services'));
    }

    public function create()
    {
        abort_unless(Gate::allows('sub-service-points-create'), 403);
        $title = 'Service Points';
        $sub_title = 'Add';

        $services = SubServices::getFullDataForHome();

        return view('admin.sub-service-points.create',compact('title','sub_title','services'));
    }

    public function store(StoreSubServicesPointRequest $request)
    {
        abort_unless(Gate::allows('sub-service-points-create'), 403);
        try{
            $save= SubServicesPoint::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/sub-service-points',
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
        abort_unless(Gate::allows('sub-service-points'), 403);
        $data = SubServicesPoint::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('sub-service-points-edit'), 403);
        $data = SubServicesPoint::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Service Points';
        $sub_title = 'Edit';

        $services = SubServices::getFullDataForHome();

        return view('admin.sub-service-points.edit',compact('data','title','sub_title','services'));
    }

    public function update(UpdateSubServicesPointRequest $request, $id)
    {
        abort_unless(Gate::allows('sub-service-points-edit'), 403);
        try{
            $save= SubServicesPoint::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/sub-service-points',
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
        abort_unless(Gate::allows('sub-service-points-delete'), 403);
        $delete = SubServicesPoint::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = SubServicesPoint::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        SubServicesPoint::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
