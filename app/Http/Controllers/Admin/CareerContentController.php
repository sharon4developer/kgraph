<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCareerContentRequest;
use App\Http\Requests\Admin\UpdateCareerContentRequest;
use App\Models\CareerContent;
use Exception;
use Illuminate\Http\Request;

class CareerContentController extends Controller
{
    public function index()
    {
        $title = 'Career Content';
        $sub_title = 'Career Content';

        $count = CareerContent::getCount();

        return view('admin.career-content.index',compact('title','sub_title','count'));
    }

    public function create()
    {
        $title = 'Career Content';
        $sub_title = 'Add';

        return view('admin.career-content.create',compact('title','sub_title'));
    }

    public function store(StoreCareerContentRequest $request)
    {
        try{
            $save= CareerContent::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/career-contents',
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
        $data = CareerContent::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        $data = CareerContent::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Career Content';
        $sub_title = 'Edit';

        return view('admin.career-content.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateCareerContentRequest $request, $id)
    {
        try{
            $save= CareerContent::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/career-contents',
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
