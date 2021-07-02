<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class ConnectRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roleSuperAdmin = Role::where('name', '=', 'super-admin')->first();
        $superAdminPermissions = Permission::all();
        foreach ($superAdminPermissions as $permission) {
            $roleSuperAdmin->attachPermission($permission);
        }
        $roleAdmin = Role::where('name', '=', 'admin')->first();
        $adminPermissions = Permission::where('name', 'can-view-users')
            ->orWhere('name', 'can-create-users')
            ->orWhere('name', 'can-edit-users')
            ->orWhere('name', 'can-delete-users')
            ->get();
        foreach ($adminPermissions as $permission) {
            $roleAdmin->attachPermission($permission);
        }
    }
}
