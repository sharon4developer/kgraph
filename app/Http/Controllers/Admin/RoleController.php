<?php

namespace App\Http\Controllers\Admin;
use DB;

use Exception;
use App\Models\User;
use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;


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

        abort_unless(Gate::allows('roles'), 403);
        $title = 'Role';
        $sub_title = 'Role';
        return view('admin.roles.index', compact('title','sub_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {

        abort_unless(Gate::allows('roles-create'), 403);
        $title = 'Role';
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
        abort_unless(Gate::allows('roles-create'), 403);
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
    { abort_unless(Gate::allows('roles'), 403);
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

        abort_unless(Gate::allows('roles-edit'), 403);
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
        abort_unless(Gate::allows('roles-edit'), 403);
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
        abort_unless(Gate::allows('roles-delete'), 403);
        $data = User::where('id','!=',1)->orderBy('created_at','desc')->whereHas("roles", function($q) use($id) {
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
        $permissions = Permission::orderBy('name','asc')->get();
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
            $role = Role::where('id', $request->table_id)->first();
            if ($role->name != 'super admin') {
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
