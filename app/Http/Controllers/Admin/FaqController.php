<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFaqRequest;
use App\Http\Requests\Admin\UpdateFaqRequest;
use App\Models\Faq;
use Exception;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('faq'), 403);
        $title = 'Faq';
        $sub_title = 'Faq';

        return view('admin.faqs.index',compact('title','sub_title'));
    }

    public function create()
    {
        abort_unless(Gate::allows('faq-create'), 403);
        $title = 'Faq';
        $sub_title = 'Add';

        return view('admin.faqs.create',compact('title','sub_title'));
    }

    public function store(StoreFaqRequest $request)
    {
        abort_unless(Gate::allows('faq-create'), 403);
        try{
            $save= Faq::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/faq',
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
        abort_unless(Gate::allows('faq'), 403);
        $data = Faq::getFullData($request);
        return $data;
    }

    public function edit($id)
    {
        abort_unless(Gate::allows('faq-edit'), 403);
        $data = Faq::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Faq';
        $sub_title = 'Edit';

        return view('admin.faqs.edit',compact('data','title','sub_title'));
    }

    public function update(UpdateFaqRequest $request, $id)
    {
        abort_unless(Gate::allows('faq-edit'), 403);
        try{
            $save= Faq::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/faq',
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
        abort_unless(Gate::allows('faq-delete'), 403);
        $delete = Faq::deleteData($request);
        return response()->json($delete);
    }

    public function changeStatus(Request $request)
    {
        $data = Faq::changeStatus($request);
        return response()->json($data);
    }

    public function changeOrder(Request $request)
    {
        $newOrder = $request->input('order');

        Faq::updateOrder($request);

        return response()->json(['message' => 'Order updated successfully']);
    }
}
