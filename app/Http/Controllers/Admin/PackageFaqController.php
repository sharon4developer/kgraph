<?php

namespace App\Http\Controllers\Admin;

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
        $title = 'Package Faq';
        $sub_title = 'Package Faq';

        $packages = Package::getFullDataForHome();

        return view('admin.package-faqs.index',compact('title','sub_title','packages'));
    }

    public function create()
    {
        $title = 'Package Faq';
        $sub_title = 'Add';

        $packages = Package::getFullDataForHome();

        return view('admin.package-faqs.create',compact('title','sub_title','packages'));
    }

    public function store(StorePackageFaqRequest $request)
    {
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
        $data = PackageFaq::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
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
