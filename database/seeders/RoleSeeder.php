<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = Role::create(['name' => 'super admin','guard_name' => 'web']);
        // $admin = Role::create(['name' => 'admin','guard_name' => 'admin']);

        // $super_admin->givePermissionTo(Permission::where('guard_name', 'web')->get()->all());
        $role = Role::where('name', 'super admin')->first();

        $permissions = Permission::get();

        $role->syncPermissions($permissions);
        $super_admin = User::find(1);
        // dd($super_admin);
        $super_admin->assignRole('super admin');


        // $admin->givePermissionTo([
        //     'users',
        //     'users-create',
        //     'users-edit',
        //     'users-delete',
        // ]);

    }
}
