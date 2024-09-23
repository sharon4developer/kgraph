<?php

namespace App\Http\Controllers\Admin;

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
        $title = 'Blogs';
        $sub_title = 'Blogs';

        return view('admin.blogs.index',compact('title','sub_title'));
    }

    public function create()
    {
        $title = 'Blogs';
        $sub_title = 'Add';
        return view('admin.blogs.create',compact('title','sub_title'));
    }

    public function store(StoreBlogRequest $request)
    {
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
        $data = Blog::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
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
