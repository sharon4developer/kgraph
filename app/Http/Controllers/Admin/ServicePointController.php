<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServicePointRequest;
use App\Http\Requests\Admin\UpdateServicePointRequest;
use App\Models\Service;
use App\Models\ServicePoint;
use Exception;
use Illuminate\Http\Request;

class ServicePointController extends Controller
{
    public function index()
    {
        $title = 'Service Points';
        $sub_title = 'Service Points';

        $services = Service::getFullDataForHome();

        return view('admin.service-points.index',compact('title','sub_title','services'));
    }

    public function create()
    {
        $title = 'Service Points';
        $sub_title = 'Add';

        $services = Service::getFullDataForHome();

        return view('admin.service-points.create',compact('title','sub_title','services'));
    }

    public function store(StoreServicePointRequest $request)
    {
        try{
            $save= ServicePoint::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/service-points',
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
        $data = ServicePoint::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        $data = ServicePoint::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Service Points';
        $sub_title = 'Edit';

        $services = Service::getFullDataForHome();

        return view('admin.service-points.edit',compact('data','title','sub_title','services'));
    }

    public function update(UpdateServicePointRequest $request, $id)
    {
        try{
            $save= ServicePoint::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/service-points',
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
        $delete = ServicePoint::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = ServicePoint::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        ServicePoint::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
