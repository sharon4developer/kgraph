<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSubServicesFaqRequest;
use App\Http\Requests\Admin\UpdateSubServicesFaqRequest;
use App\Models\SubServices;
use App\Models\SubServicesFaq;
use Exception;
use Illuminate\Http\Request;

class SubServicesFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Service Faq';
        $sub_title = 'Service Faq';

        $services = SubServices::getFullDataForHome();

        return view('admin.sub-service-faq.index',compact('title','sub_title','services'));
    }

    public function create()
    {
        $title = 'Service Faq';
        $sub_title = 'Add';

        $services = SubServices::getFullDataForHome();

        return view('admin.sub-service-faq.create',compact('title','sub_title','services'));
    }

    public function store(StoreSubServicesFaqRequest $request)
    {
        try{
            $save= SubServicesFaq::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/sub-service-faq',
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
        $data = SubServicesFaq::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        $data = SubServicesFaq::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Service Faq';
        $sub_title = 'Edit';

        $services = SubServices::getFullDataForHome();

        return view('admin.sub-service-faq.edit',compact('data','title','sub_title','services'));
    }

    public function update(UpdateSubServicesFaqRequest $request, $id)
    {
        try{
            $save= SubServicesFaq::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/sub-service-faq',
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
        $delete = SubServicesFaq::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = SubServicesFaq::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        SubServicesFaq::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
