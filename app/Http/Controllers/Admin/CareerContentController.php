<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
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
        abort_unless(Gate::allows('career-contents'), 403);
        $title = 'Career Content';
        $sub_title = 'Career Content';

        $count = CareerContent::getCount();

        return view('admin.career-content.index',compact('title','sub_title','count'));
    }

    public function create()
    {
        abort_unless(Gate::allows('career-contents-create'), 403);
        $title = 'Career Content';
        $sub_title = 'Add';

        return view('admin.career-content.create',compact('title','sub_title'));
    }

    public function store(StoreCareerContentRequest $request)
    {
        abort_unless(Gate::allows('career-contents-create'), 403);
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
        abort_unless(Gate::allows('career-contents'), 403);
        $data = CareerContent::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('career-contents-edit'), 403);
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
        abort_unless(Gate::allows('career-contents-edit'), 403);
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
