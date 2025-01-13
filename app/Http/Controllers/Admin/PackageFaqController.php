<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePackageFaqRequest;
use App\Http\Requests\Admin\UpdatePackageFaqRequest;
use App\Models\Package;
use App\Models\PackageFaq;
use Exception;
use Illuminate\Http\Request;

class PackageFaqController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('package-faq'), 403);
        $title = 'Package Faq';
        $sub_title = 'Package Faq';

        $packages = Package::getFullDataForHome();

        return view('admin.package-faqs.index',compact('title','sub_title','packages'));
    }

    public function create()
    {
        abort_unless(Gate::allows('package-faq-create'), 403);
        $title = 'Package Faq';
        $sub_title = 'Add';

        $packages = Package::getFullDataForHome();

        return view('admin.package-faqs.create',compact('title','sub_title','packages'));
    }

    public function store(StorePackageFaqRequest $request)
    {
        abort_unless(Gate::allows('package-faq-create'), 403);
        try{
            $save= PackageFaq::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/package-faq',
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
        abort_unless(Gate::allows('package-faq'), 403);
        $data = PackageFaq::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('package-faq-edit'), 403);
        $data = PackageFaq::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Package Faq';
        $sub_title = 'Edit';

        $packages = Package::getFullDataForHome();

        return view('admin.package-faqs.edit',compact('data','title','sub_title','packages'));
    }

    public function update(UpdatePackageFaqRequest $request, $id)
    {
        abort_unless(Gate::allows('package-faq-edit'), 403);
        try{
            $save= PackageFaq::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/package-faq',
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
        abort_unless(Gate::allows('package-faq-delete'), 403);
        $delete = PackageFaq::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = PackageFaq::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        PackageFaq::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
