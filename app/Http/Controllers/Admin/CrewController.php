<?php

namespace App\Http\Controllers\Admin;

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
        $title = 'Crew';
        $sub_title = 'Crew';
        $count = Crew::count();

        return view('admin.crew.index',compact('title','sub_title','count'));
    }

    public function create()
    {
        $title = 'Crew';
        $sub_title = 'Add';
        return view('admin.crew.create',compact('title','sub_title'));
    }

    public function store(StoreCrewRequest $request)
    {
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
        $data = Crew::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
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
