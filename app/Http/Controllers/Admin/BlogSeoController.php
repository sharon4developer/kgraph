<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogSeoRequest;
use App\Http\Requests\Admin\UpdateBlogSeoRequest;
use App\Models\BlogSeo;
use Exception;
use Illuminate\Http\Request;

class BlogSeoController extends Controller
{
    public function store(StoreBlogSeoRequest $request)
    {
        try{
            $save= BlogSeo::createData($request);

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
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
        $data = BlogSeo::getData($request->blog_id);
        return $data;
    }
}
