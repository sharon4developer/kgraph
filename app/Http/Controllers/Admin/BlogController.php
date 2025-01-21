<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
         abort_unless(Gate::allows('blogs'), 403);
         $userCanDelete = Gate::allows('blogs-delete');
        $title = 'Blogs';
        $sub_title = 'Blogs';

        return view('admin.blogs.index',compact('title','sub_title','userCanDelete'));
    }

    public function create()
    {
        abort_unless(Gate::allows('blogs-create'), 403);
        $title = 'Blogs';
        $sub_title = 'Add';
        return view('admin.blogs.create',compact('title','sub_title'));
    }

    public function store(StoreBlogRequest $request)
    {
        abort_unless(Gate::allows('blogs-create'), 403);
        try{
            $save= Blog::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/blogs',
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
        abort_unless(Gate::allows('blogs'), 403);
        $data = Blog::getFullData($request);
        return $data;
    }


    public function edit($id)
    {
        abort_unless(Gate::allows('blogs-edit'), 403);
        $data = Blog::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Blogs';
        $sub_title = 'Edit';
        return view('admin.blogs.edit',compact('data','title','sub_title'));
    }






    public function update(UpdateBlogRequest $request, $id)
    {
        abort_unless(Gate::allows('blogs-edit'), 403);
        try{
            $save= Blog::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/blogs',
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
        abort_unless(Gate::allows('blogs-delete'), 403);

        $delete = Blog::deleteData($request);
        return response()->json($delete);
    }






    public function changeStatus(Request $request)
    {
        $data = Blog::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Blog::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
