<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceFaqRequest;
use App\Http\Requests\Admin\UpdateServiceFaqRequest;
use App\Models\Service;
use App\Models\ServiceFaq;
use Exception;
use Illuminate\Http\Request;

class ServiceFaqController extends Controller
{
    public function index()
    {
        $title = 'Service Faq';
        $sub_title = 'Service Faq';

        $services = Service::getFullDataForHome();

        return view('admin.service-faqs.index',compact('title','sub_title','services'));
    }

    public function create()
    {
        $title = 'Service Faq';
        $sub_title = 'Add';

        $services = Service::getFullDataForHome();

        return view('admin.service-faqs.create',compact('title','sub_title','services'));
    }

    public function store(StoreServiceFaqRequest $request)
    {
        try{
            $save= ServiceFaq::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/service-faq',
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
        $data = ServiceFaq::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        $data = ServiceFaq::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Service Faq';
        $sub_title = 'Edit';

        $services = Service::getFullDataForHome();

        return view('admin.service-faqs.edit',compact('data','title','sub_title','services'));
    }

    public function update(UpdateServiceFaqRequest $request, $id)
    {
        try{
            $save= ServiceFaq::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/service-faq',
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
        $delete = ServiceFaq::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = ServiceFaq::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        ServiceFaq::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
