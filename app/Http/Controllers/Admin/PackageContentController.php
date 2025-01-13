<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePackageContentRequest;
use App\Http\Requests\Admin\UpdatePackageContentRequest;
use App\Models\PackageContent;
use Exception;
use Illuminate\Http\Request;

class PackageContentController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('package-contents'), 403);
        $title = 'Package Content';
        $sub_title = 'Package Content';

        $count = PackageContent::getCount();

        return view('admin.package-content.index',compact('title','sub_title','count'));
    }

    public function create()
    {
        abort_unless(Gate::allows('package-contents-create'), 403);
        $title = 'Package Content';
        $sub_title = 'Add';

        return view('admin.package-content.create',compact('title','sub_title'));
    }

    public function store(StorePackageContentRequest $request)
    {
        abort_unless(Gate::allows('package-contents-create'), 403);
        try{
            $save= PackageContent::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/package-contents',
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

        abort_unless(Gate::allows('package-contents'), 403);
        $data = PackageContent::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('package-contents-edit'), 403);
        $data = PackageContent::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Package Content';
        $sub_title = 'Edit';

        return view('admin.package-content.edit',compact('data','title','sub_title'));
    }

    public function update(UpdatePackageContentRequest $request, $id)
    {
        abort_unless(Gate::allows('package-contents-edit'), 403);
        try{
            $save= PackageContent::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/package-contents',
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
