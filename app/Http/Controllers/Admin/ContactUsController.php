<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreContactUsRequest;
use App\Http\Requests\Admin\UpdateContactUsRequest;
use App\Models\ContactUs;
use Exception;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {

        abort_unless(Gate::allows('contact-us'), 403);
        $title = 'Contact Us';
        $sub_title = 'Contact Us';

        $data = ContactUs::getData();

        return view('admin.contact-us.index',compact('title','sub_title','data'));
    }

    public function store(StoreContactUsRequest $request)
    {

        abort_unless(Gate::allows('contact-us-create'), 403);
        try{
            $save= ContactUs::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/contact-us',
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
