<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceContentRequest;
use App\Http\Requests\Admin\UpdateServiceContentRequest;
use App\Models\ServiceContent;
use Exception;
use Illuminate\Http\Request;

class ServiceContentController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('service-contents'), 403);
        $title = 'Service Content';
        $sub_title = 'Service Content';

        $count = ServiceContent::getCount();

        return view('admin.service-content.index',compact('title','sub_title','count'));
    }

    public function create()
    {
        abort_unless(Gate::allows('service-contents-create'), 403);
        $title = 'Service Content';
        $sub_title = 'Add';

        return view('admin.service-content.create',compact('title','sub_title'));
    }

    public function store(StoreServiceContentRequest $request)
    {
        abort_unless(Gate::allows('service-contents-create'), 403);
        try{
            $save= ServiceContent::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/service-contents',
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
        abort_unless(Gate::allows('service-contents'), 403);
        $data = ServiceContent::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('service-contents-edit'), 403);
        $data = ServiceContent::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Service Content';
        $sub_title = 'Edit';

        return view('admin.service-content.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateServiceContentRequest $request, $id)
    {
        abort_unless(Gate::allows('service-contents-edit'), 403);
        try{
            $save= ServiceContent::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/service-contents',
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
