<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSubServicePointContentRequest;
use App\Http\Requests\Admin\UpdateSubServicePointContentRequest;
use App\Models\SubServicePointContent;
use App\Models\SubServices;
use App\Models\SubServicesPoint;
use Exception;
use Illuminate\Http\Request;

class SubServicePointContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        abort_unless(Gate::allows('sub-service-points'), 403);
        $title = 'Sub Service Point Content';
        $sub_title = 'Sub Service Point Content';

        $services = SubServices::getFullDataForHome();

        return view('admin.sub-service-point-contents.index',compact('title','sub_title','services'));
    }

    public function create()
    {

        abort_unless(Gate::allows('sub-service-points-create'), 403);
        $title = 'Sub Service Point Content';
        $sub_title = 'Add';

        $services = SubServicesPoint::getFullDataForHome();

        return view('admin.sub-service-point-contents.create',compact('title','sub_title','services'));
    }

    public function store(StoreSubServicePointContentRequest $request)
    {

        abort_unless(Gate::allows('sub-service-points-create'), 403);
        try{
            $save= SubServicePointContent::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/sub-service-point-contents',
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
        $data = SubServicePointContent::getFullData($request);
        return $data;
    }

    public function edit($id)
    {

        abort_unless(Gate::allows('sub-service-points-edit'), 403);
        $data = SubServicePointContent::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Sub Service Point Content';
        $sub_title = 'Edit';

        $services = SubServicesPoint::getFullDataForHome();

        return view('admin.sub-service-point-contents.edit',compact('data','title','sub_title','services'));
    }

    public function update(UpdateSubServicePointContentRequest $request, $id)
    {

        abort_unless(Gate::allows('sub-service-points-edit'), 403);
        try{
            $save= SubServicePointContent::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/sub-service-point-contents',
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
        $delete = SubServicePointContent::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = SubServicePointContent::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        SubServicePointContent::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }

    public function getSubServicePoints(Request $request)
    {
        $serviceId = $request->input('service_id');

        // Fetch sub-service points for the selected service
        $subServicePoints = SubServicesPoint::where('sub_service_id', $serviceId)->get();

        // Return the data as JSON
        return response()->json($subServicePoints);
    }
}
