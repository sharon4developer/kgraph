<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreJourneyRequest;
use App\Http\Requests\Admin\UpdateJourneyRequest;
use App\Models\Journey;
use Exception;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    public function index()
    {
        $title = 'Journey';
        $sub_title = 'Journey';

        $count = Journey::getCount();

        return view('admin.journey.index',compact('title','sub_title','count'));
    }

    public function create()
    {
        $title = 'Journey';
        $sub_title = 'Add';

        return view('admin.journey.create',compact('title','sub_title'));
    }

    public function store(StoreJourneyRequest $request)
    {
        try{
            $save= Journey::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/journey',
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
        $data = Journey::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        $data = Journey::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Journey';
        $sub_title = 'Edit';

        return view('admin.journey.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateJourneyRequest $request, $id)
    {
        try{
            $save= Journey::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/journey',
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
}
