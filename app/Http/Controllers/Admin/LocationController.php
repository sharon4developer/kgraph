<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLocationRequest;
use App\Http\Requests\Admin\UpdateLocationRequest;
use App\Models\Location;
use Exception;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('locations'), 403);
        $title = 'Locations';
        $sub_title = 'Locations';

        return view('admin.locations.index',compact('title','sub_title'));
    }

    public function create()
    {
        abort_unless(Gate::allows('locations-create'), 403);
        $title = 'Locations';
        $sub_title = 'Add';
        return view('admin.locations.create',compact('title','sub_title'));
    }

    public function store(StoreLocationRequest $request)
    {
        abort_unless(Gate::allows('locations-create'), 403);
        try{
            $save= Location::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/locations',
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
        abort_unless(Gate::allows('locations'), 403);
        $data = Location::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('locations-edit'), 403);
        $data = Location::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Locations';
        $sub_title = 'Edit';
        return view('admin.locations.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateLocationRequest $request, $id)
    {
        abort_unless(Gate::allows('locations-edit'), 403);
        try{
            $save= Location::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/locations',
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

        abort_unless(Gate::allows('locations-delete'), 403);
        $delete = Location::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Location::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Location::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
