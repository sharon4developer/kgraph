<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogContentRequest;
use App\Http\Requests\Admin\UpdateBlogContentRequest;
use App\Models\BlogContent;
use Exception;
use Illuminate\Http\Request;

class BlogContentController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('blog-content'), 403);
        $title = 'Blog Content';
        $sub_title = 'Blog Content';

        $count = BlogContent::getCount();

        return view('admin.blog-content.index',compact('title','sub_title','count'));
    }

    public function create()
    {
        abort_unless(Gate::allows('blog-content-create'), 403);
        $title = 'Blog Content';
        $sub_title = 'Add';

        return view('admin.blog-content.create',compact('title','sub_title'));
    }

    public function store(StoreBlogContentRequest $request)
    {    abort_unless(Gate::allows('blog-content-create'), 403);
        try{
            $save= BlogContent::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/blog-contents',
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
        abort_unless(Gate::allows('blog-content'), 403);
        $data = BlogContent::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('blog-content-edit'), 403);
        $data = BlogContent::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Blog Content';
        $sub_title = 'Edit';

        return view('admin.blog-content.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateBlogContentRequest $request, $id)
    {

        abort_unless(Gate::allows('blog-content-edit'), 403);
        try{
            $save= BlogContent::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/blog-contents',
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
