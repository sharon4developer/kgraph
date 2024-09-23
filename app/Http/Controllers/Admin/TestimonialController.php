<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTestimonialRequest;
use App\Http\Requests\Admin\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Exception;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $title = 'Testimonials';
        $sub_title = 'Testimonials';

        return view('admin.testimonials.index',compact('title','sub_title'));
    }

    public function create()
    {
        $title = 'Testimonials';
        $sub_title = 'Add';
        return view('admin.testimonials.create',compact('title','sub_title'));
    }

    public function store(StoreTestimonialRequest $request)
    {
        try{
            $save= Testimonial::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/testimonials',
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
        $data = Testimonial::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        $data = Testimonial::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Testimonials';
        $sub_title = 'Edit';
        return view('admin.testimonials.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateTestimonialRequest $request, $id)
    {
        try{
            $save= Testimonial::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/testimonials',
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
        $delete = Testimonial::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Testimonial::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Testimonial::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
