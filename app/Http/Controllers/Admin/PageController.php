<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePageRequest;
use App\Http\Requests\Admin\UpdatePageRequest;
use App\Models\Cms;
use App\Models\Page;
use Exception;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('pages'), 403);
        $title = 'Pages';
        $sub_title = 'Pages';
        return view('admin.pages.index',compact('title','sub_title'));
    }

    public function show()
    {
        abort_unless(Gate::allows('pages'), 403);
        $data = Page::getFullData();
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('pages-edit'), 403);
        $data = Page::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Pages';
        $sub_title = 'Edit';
        return view('admin.pages.edit',compact('data','title','sub_title'));
    }

    public function update(UpdatePageRequest $request,$id)
    {
        abort_unless(Gate::allows('pages-edit'), 403);
        try{
            $save= Page::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/pages',
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

    public function changeStatus(Request $request)
    {
        $data = Page::changeStatus($request);
        return response()->json($data);
    }
    public function changeSectionContent($id)
    {
        $title = 'Pages';
        $sub_title = 'Section Contents';
        $data = Cms::getData($id);
        return view('admin.pages.contents',compact('data','title','sub_title','id'));
    }
}
