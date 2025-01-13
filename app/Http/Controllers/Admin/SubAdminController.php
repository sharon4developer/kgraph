<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Gate;

use DB;
use Validator;
use App\Models\Cms;
use App\Models\User;
use App\Models\Admin;
use App\Models\SubAdmin;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\StoreSubAdminRequest;
use App\Http\Requests\Admin\UpdateSubAdminRequest;


class SubAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_unless(Gate::allows('sub-admin'), 403);
        $sub_title = 'role';
        $title = 'Sub-Admin';
        return view('admin.sub-admins.index', compact('title','sub_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(Gate::allows('sub-admin-create'), 403);
        $title = 'Role';
        $sub_title = 'role';
        return view('admin.sub-admins.create', [
            'title' =>$title,
            'sub_title' =>$sub_title,
            'roles' => Role::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubAdminRequest $request)
    {

        abort_unless(Gate::allows('sub-admin-create'), 403);

            DB::beginTransaction();
            try {
                $admin           = new User();
                $admin->name     = $request->name;
                $admin->email    = $request->email;
                $admin->address  = $request->address;
                $admin->password = Hash::make($request->password);
                $admin->phone    = $request->phone;
                if ($request->image) {
                    $admin->image = Cms::storeImage($request->image, $request->name);
                    // $intervention_image = $admin->image;
                    // // $intervention_image = Cms::makeInterventionImage($data->image);
                    // $admin->intervention_image = $intervention_image;
                };
                $res           = $admin->save();
                DB::commit();
                if ($admin) {
                    // Assign admin role
                    $role = Role::find($request->role_id);
// dd($admin,$role);
                    $admin->assignRole([$role->name]);

                    $response=[
                        'status'=>true,
                        'message'=>'User created successfully...',
                        'return_url'=>'/admin/sub-admin',
                    ];
                } else {
                    $response=[
                        'status'=>false,
                        'message'=>'Something wrong please try again.',
                    ];
                }
            } catch (\Exception $e) {
                DB::rollback();
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
        abort_unless(Gate::allows('sub-admin'), 403);

        $data = User::where('id','!=',1)->orderBy('created_at','desc');

        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('role', function (User $data) {
            $d = $data->roles->pluck('name');
            return $d[0] ?? '';
        })

        ->rawColumns(['action','permissions'])
        ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort_unless(Gate::allows('sub-admin-edit'), 403);

        $roles = Role::get();

        $data = User::where('id',$id)->first();

        if(!$data){
            abort(404);
        }
        $title = 'Sub-Admin';
        $sub_title = 'Sub-Admin';
        return view('admin.sub-admins.edit',compact('data','title','roles','sub_title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubAdminRequest $request, string $id)
    {

        abort_unless(Gate::allows('sub-admin-edit'), 403);
        try {
            DB::beginTransaction();
            $admin           = User::find($id);
            $admin->name     = $request->name;
            $admin->email    = $request->email;
            $admin->address  = $request->address;

            if ($request->password !=null) {
                $admin->password = Hash::make($request->password);
            }

            $admin->phone    = $request->phone;
            if ($request->image) {
                $admin->image = Cms::storeImage($request->image, $request->name);}
            $res             = $admin->save();
            DB::table('model_has_roles')->where('model_id', $admin->id)->delete(); // delete current role
            $role = Role::find($request->role_id);

            $admin->assignRole([$role->name]); // Assign role to employee
            DB::commit();
            $response=[
                'status'=>true,
                'message'=>'User Updated successfully...',
                'return_url'=>'/admin/sub-admin',
            ];
        } catch (\Exception $e) {
            DB::rollBack();
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

        abort_unless(Gate::allows('sub-admin-delete'), 403);
        $value = Admin::find($id);
         if($value){
             $value->forceDelete();
             $delete = true;
         }
         else
            $delete =false;

        return response()->json($delete);
    }

    public function permissions($id)
    {
        $title = 'Role Permissions';
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
        ->where("role_has_permissions.role_id", $id)
        ->pluck('permission_id')
        ->toArray();
        return view('admin.role-permissions.index', compact('role', 'rolePermissions', 'permissions'));

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
