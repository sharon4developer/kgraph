<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSubServicesRequest;
use App\Http\Requests\Admin\UpdateSubServicesRequest;
use App\Models\Service;
use App\Models\SubServices;
use Exception;
use Illuminate\Http\Request;

class SubServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Sub Services';
        $sub_title = 'Sub Services';

        $services = Service::getFullDataForHome();

        return view('admin.sub-services.index',compact('title','sub_title','services'));
    }

    public function create()
    {
        $title = 'Sub Services';
        $sub_title = 'Add';

        $services = Service::getFullDataForHome();

        return view('admin.sub-services.create',compact('title','sub_title','services'));
    }

    public function store(StoreSubServicesRequest $request)
    {
        try{
            $save= SubServices::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/sub-services',
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
        $data = SubServices::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        $data = SubServices::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Sub Services';
        $sub_title = 'Edit';

        $services = Service::getFullDataForHome();

        return view('admin.sub-services.edit',compact('data','title','sub_title','services'));
    }

    public function update(UpdateSubServicesRequest $request, $id)
    {
        try{
            $save= SubServices::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/sub-services',
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
        $delete = SubServices::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = SubServices::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        SubServices::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
