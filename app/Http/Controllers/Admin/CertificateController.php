<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCertificateRequest;
use App\Http\Requests\Admin\UpdateCertificateRequest;
use App\Models\Certificate;
use Exception;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $title = 'Certificates';
        $sub_title = 'Certificates';

        return view('admin.certificates.index',compact('title','sub_title'));
    }

    public function create()
    {
        $title = 'Certificates';
        $sub_title = 'Add';
        return view('admin.certificates.create',compact('title','sub_title'));
    }

    public function store(StoreCertificateRequest $request)
    {
        try{
            $save= Certificate::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/certificates',
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
        $data = Certificate::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        $data = Certificate::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Certificates';
        $sub_title = 'Edit';
        return view('admin.certificates.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateCertificateRequest $request, $id)
    {
        try{
            $save= Certificate::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/certificates',
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
        $delete = Certificate::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Certificate::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Certificate::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
