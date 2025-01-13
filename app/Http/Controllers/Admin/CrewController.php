<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCrewRequest;
use App\Http\Requests\Admin\UpdateCrewRequest;
use App\Models\Crew;
use Exception;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('crew'), 403);
        $title = 'Crew';
        $sub_title = 'Crew';
        $count = Crew::count();

        return view('admin.crew.index',compact('title','sub_title','count'));
    }

    public function create()
    {
        abort_unless(Gate::allows('crew-create'), 403);
        $title = 'Crew';
        $sub_title = 'Add';
        return view('admin.crew.create',compact('title','sub_title'));
    }

    public function store(StoreCrewRequest $request)
    {
        abort_unless(Gate::allows('crew-create'), 403);
        try{
            $save= Crew::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/crew',
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
        abort_unless(Gate::allows('crew'), 403);
        $data = Crew::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('crew-edit'), 403);
        $data = Crew::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Crew';
        $sub_title = 'Edit';
        return view('admin.crew.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateCrewRequest $request, $id)
    {
        abort_unless(Gate::allows('crew-edit'), 403);
        try{
            $save= Crew::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/crew',
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
        abort_unless(Gate::allows('crew-delete'), 403);
        $delete = Crew::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Crew::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Crew::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
