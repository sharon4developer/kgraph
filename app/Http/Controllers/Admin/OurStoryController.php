<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOurStoryRequest;
use App\Http\Requests\Admin\UpdateOurStoryRequest;
use App\Models\OurStory;
use Exception;
use Illuminate\Http\Request;

class OurStoryController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('our-story'), 403);
        $title = 'Our Story';
        $sub_title = 'Our Story';

        return view('admin.our-story.index',compact('title','sub_title'));
    }

    public function create()
    {
        abort_unless(Gate::allows('our-story-create'), 403);
        $title = 'Our Story';
        $title = 'Our Story';
        $sub_title = 'Add';
        return view('admin.our-story.create',compact('title','sub_title'));
    }

    public function store(StoreOurStoryRequest $request)
    {
        abort_unless(Gate::allows('our-story-create'), 403);
        try{
            $save= OurStory::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/our-story',
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
        abort_unless(Gate::allows('our-story'), 403);
        $data = OurStory::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('our-story-edit'), 403);
        $data = OurStory::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Our Story';
        $sub_title = 'Edit';
        return view('admin.our-story.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateOurStoryRequest $request, $id)
    {
        abort_unless(Gate::allows('our-story-edit'), 403);
        try{
            $save= OurStory::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/our-story',
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
        abort_unless(Gate::allows('our-story-delete'), 403);
        $delete = OurStory::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = OurStory::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        OurStory::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
