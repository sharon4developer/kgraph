<?php

namespace App\Http\Controllers\Admin;
use Exception;
use App\Models\whatsApp;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorewhatsAppRequest;
use App\Http\Requests\UpdatewhatsAppRequest;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_unless(Gate::allows('settings'), 403);
        $title = "Whats app number ";
        $sub_title = ' ';
        $count = whatsApp::count();
        return view('admin.settings.index',compact('title','sub_title','count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // abort_unless(Gate::allows('settings-create'), 403);
        $title = 'Testimonials';
        $title = 'Whats app number';
        $sub_title = ' ';
        return view('admin.settings.create',compact('title','sub_title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorewhatsAppRequest $request)
    {
    //   abort_unless(Gate::allows('settings-create'), 403);
        try{
            $save= whatsApp::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/settings',
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

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

        $data = whatsApp::getFullData($request);

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // abort_unless(Gate::allows('settings-edit'), 403);
        $data = whatsApp::getData($id);
        if(!$data){
            abort(404);
        }
        $title = 'Settings';
        $sub_title = 'Edit';




        return view('admin.settings.edit',compact('data','title','sub_title'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatewhatsAppRequest $request, $id)
    {
    //    abort_unless(Gate::allows('settings-edit'), 403);
        try{
            $save= whatsApp::updateData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/settings',
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(whatsApp $whatsApp)
    {
        //
    }
}
