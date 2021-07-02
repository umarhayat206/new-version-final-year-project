<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Permission::where('name', '=', 'can-view-users')->first() === null) {
            Permission::create([
                'name'        => 'can-view-users',
                'display_name'        => 'users.view',
                'description' => 'Can view users',

            ]);
        }
        if (Permission::where('name', '=', 'can-create-uers')->first() === null) {
            Permission::create([
                'name'        => 'can-create-users',
                'display_name'        => 'users.create',
                'description' => 'Can create new users',
            ]);
        }

        if (Permission::where('name', '=', 'can-edit-users')->first() === null) {
            Permission::create([
                'name'        => 'can-edit-users',
                'display_name'        => 'users.edit',
                'description' => 'Can edit users',
            ]);
        }

        if (Permission::where('name', '=', 'can-delete-users')->first() === null) {
            Permission::create([
                'name'        => 'can-delete-users',
                'display_name'        => 'users.delete',
                'description' => 'Can delete users',
            ]);
        }
    }
}
