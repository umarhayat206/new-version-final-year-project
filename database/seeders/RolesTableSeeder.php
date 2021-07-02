<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Role::where('name', '=', 'super-admin')->first() === null) {
            $adminRole = Role::create([
                'name'        => 'super-admin',
                'display_name'        => 'super-admin',
                'description' => 'Super Admin Role',
            ]);
        }
        if (Role::where('name', '=', 'admin')->first() === null) {
            $adminRole = Role::create([
                'name'        => 'admin',
                'display_name'        => 'admin',
                'description' => 'Admin Role',
            ]);
        }
        if (Role::where('name', '=', 'candidate')->first() === null) {
            $adminRole = Role::create([
                'name'        => 'candidate',
                'display_name'        => 'candidate',
                'description' => 'Candidate Role',
            ]);
        }
        if (Role::where('name', '=', 'voter')->first() === null) {
            $adminRole = Role::create([
                'name'        => 'voter',
                'display_name'        => 'voter',
                'description' => 'Voter Role',
            ]);
        }
    }
}
