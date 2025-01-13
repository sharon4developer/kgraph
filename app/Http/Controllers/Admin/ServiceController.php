<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceRequest;
use App\Http\Requests\Admin\UpdateServiceRequest;
use App\Models\Service;
use App\Models\ServiceCategory;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('services'), 403);
        $title = 'Services';
        $sub_title = 'Services';

        $serviceCategories = ServiceCategory::getFullDataForHome();

        return view('admin.services.index',compact('title','sub_title','serviceCategories'));
    }

    public function create()
    {
        abort_unless(Gate::allows('services-create'), 403);
        $title = 'Services';
        $sub_title = 'Add';

        $serviceCategories = ServiceCategory::getFullDataForHome();

        return view('admin.services.create',compact('title','sub_title','serviceCategories'));
    }

    public function store(StoreServiceRequest $request)
    {
        abort_unless(Gate::allows('services-create'), 403);
        try{
            $save= Service::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/services',
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
        abort_unless(Gate::allows('services'), 403);
        $data = Service::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('services-edit'), 403);
        $data = Service::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Services';
        $sub_title = 'Edit';

        $serviceCategories = ServiceCategory::getFullDataForHome();

        return view('admin.services.edit',compact('data','title','sub_title','serviceCategories'));
    }

    public function update(UpdateServiceRequest $request, $id)
    {
        abort_unless(Gate::allows('services-edit'), 403);
        try{
            $save= Service::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/services',
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
        abort_unless(Gate::allows('services-delete'), 403);
        $delete = Service::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Service::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Service::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
