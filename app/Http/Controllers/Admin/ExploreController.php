<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExploreRequest;
use App\Http\Requests\Admin\UpdateExploreRequest;
use App\Models\Explore;
use Exception;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('explore'), 403);
        $title = 'Explore';
        $sub_title = 'Explore';

        return view('admin.explore.index',compact('title','sub_title'));
    }

    public function create()
    {  abort_unless(Gate::allows('explore-create'), 403);
        $title = 'Explore';
        $sub_title = 'Add';
        return view('admin.explore.create',compact('title','sub_title'));
    }

    public function store(StoreExploreRequest $request)
    {
         abort_unless(Gate::allows('explore-create'), 403);
        try{
            $save= Explore::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/explore',
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
         abort_unless(Gate::allows('explore'), 403);
        $data = Explore::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('explore-edit'), 403);
        $data = Explore::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Explore';
        $sub_title = 'Edit';
        return view('admin.explore.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateExploreRequest $request, $id)
    {
        abort_unless(Gate::allows('explore-edit'), 403);
        try{
            $save= Explore::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/explore',
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
        abort_unless(Gate::allows('explore-delete'), 403);
        $delete = Explore::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Explore::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Explore::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
