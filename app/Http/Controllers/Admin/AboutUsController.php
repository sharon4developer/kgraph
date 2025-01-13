<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAboutUsRequest;
use App\Http\Requests\Admin\UpdateAboutUsRequest;
use App\Models\AboutUs;
use Exception;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('about-us'), 403);
        $title = 'About Us';
        $sub_title = 'About Us';

        $count = AboutUs::getCount();

        return view('admin.about-us.index',compact('title','sub_title','count'));
    }

    public function create()
    {
        abort_unless(Gate::allows('about-us-create'), 403);
        $title = 'About Us';
        $sub_title = 'Add';

        return view('admin.about-us.create',compact('title','sub_title'));
    }

    public function store(StoreAboutUsRequest $request)
    {
        abort_unless(Gate::allows('about-us-create'), 403);
        try{
            $save= AboutUs::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/about-us',
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
        abort_unless(Gate::allows('about-us'), 403);
        $data = AboutUs::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('about-us-edit'), 403);
        $data = AboutUs::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'About Us';
        $sub_title = 'Edit';

        return view('admin.about-us.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateAboutUsRequest $request, $id)
    {
        abort_unless(Gate::allows('about-us-edit'), 403);
        try{
            $save= AboutUs::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/about-us',
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
