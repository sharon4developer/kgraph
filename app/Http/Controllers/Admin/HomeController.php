<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreHomeRequest;
use App\Http\Requests\Admin\UpdateHomeRequest;
use App\Models\Home;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('home'), 403);
        $title = 'About Us';
        $sub_title = 'About Us';

        $count = Home::getCount();

        return view('admin.home.index',compact('title','sub_title','count'));
    }

    public function create()
    {
        abort_unless(Gate::allows('home-create'), 403);
        $title = 'About Us';
        $sub_title = 'Add';

        return view('admin.home.create',compact('title','sub_title'));
    }

    public function store(StoreHomeRequest $request)
    {
        abort_unless(Gate::allows('home-create'), 403);
        try{
            $save= Home::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/home',
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
        $data = Home::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('home-edit'), 403);
        $data = Home::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'About Us';
        $sub_title = 'Edit';

        return view('admin.home.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateHomeRequest $request, $id)
    {
        abort_unless(Gate::allows('home-edit'), 403);
        try{
            $save= Home::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/home',
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
