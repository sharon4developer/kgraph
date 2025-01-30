<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PasswordResetRequest;
use App\Http\Requests\Admin\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'Profile';
        $sub_title = 'Admin Profile';
        return view('admin.profile.index',compact('title','sub_title'));
    }

    public function updatePassword(PasswordResetRequest $request)
    {
        $update = User::updatePassword($request);
        if($update){

            $response=[
                'status'=>true,
                'message'=>'Updated successfully...',
            ];
        }else{
            $response=[
                'status'=>false,
                'message'=>'Something went wrong...',
            ];
        }
        return response()->json($response);
    }
    public function editDetails(UserEditRequest $request)
    {
        $update = User::editDetails($request);

        if($update){
            $response=[
                'status'=>true,
                'user' =>$update,
                'message'=>'Updated successfully...',
            ];
        }else{
            $response=[
                'status'=>false,
                'message'=>'Something went wrong...',
            ];
        }
        return response()->json($response);
    }
}
