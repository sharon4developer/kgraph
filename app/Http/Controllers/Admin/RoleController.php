<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\RedirectResponse;
use DB;
use App\Models\Admin;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if(!auth('admin')->user()->hasPermissionTo('roles')){
        //     return redirect()->route('admin.dashboard');
        // }
        $title = 'Role';
        $sub_title = 'Role';
        return view('admin.roles.index', compact('title','sub_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { $title = 'Role';
        $sub_title = 'Role';
        return view('admin.roles.create', [
            'title' => $title,
            'sub_title' => $sub_title,
            'permissions' => Permission::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try{

            $value             = new Role;
            $value->name       = $request->name;
            $value->guard_name = 'web';
            $save              = $value->save();

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/roles',
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
    public function show(string $id)
    {
        $data = Role::orderBy('created_at','desc');
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('permissions', function (Role $role) {
          if ($role->id == 1) {
            $buttonStatus = "disabled";
          }else{
            $buttonStatus = "";
          }
          $btn = "<a href='" . url('admin/role-permissions', $role->id) . "' class='btn btn-outline-primary ".$buttonStatus."'>Permissions</a>";
          return $btn;
        })

        ->rawColumns(['action','permissions'])
        ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Role::where('id',$id)->first();
        if(!$data){
            abort(404);
        }
        $title = 'Role';
        $sub_title = 'Role';
        return view('admin.roles.edit',compact('data','title','sub_title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $value             = Role::find($request->table_id);
            $value->name       = $request->name;
            $value->name       = $request->name;
            $value->guard_name = 'web';
            $save              = $value->save();

            if($save){
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/roles',
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
    public function destroy(string $id)
    {
        $data = Admin::where('id','!=',1)->orderBy('created_at','desc')->whereHas("roles", function($q) use($id) {
            $q->where("id", $id);
        })->get();
        if($data){
            $data->map->delete();
        }
        $value = Role::find($id);
         if($value){
             $value->delete();
             $delete = true;
         }
         else
            $delete =false;

        return response()->json($delete);
    }

    public function permissions($id)
    {
        $title = 'Role Permissions';
        $sub_title = 'Role Permissions';

        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
        ->where("role_has_permissions.role_id", $id)
        ->pluck('permission_id')
        ->toArray();
        return view('admin.role-permissions.index', compact('role', 'rolePermissions', 'permissions','title','sub_title'));

    }

    // Store
    public function storeRolePermision(Request $request, $id)
    {
        try{
            $role = Role::where('id', $request->role_id)->first();
            if ($role->name != 'super-admin') {
                $role->syncPermissions($request->name);
                $response=[
                    'status'=>true,
                    'message'=>'Saved successfully...',
                    'return_url'=>'/admin/roles',
                ];
            } else {
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
