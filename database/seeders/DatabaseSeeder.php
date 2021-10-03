<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(50)->create();
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(PartiesTableSeeder::class);
        $this->call(NationalAreaSeeder::class);
        $this->call(ProvinceAreaSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(NotificationSeeder::class);
         $user =\App\Models\User::create([
            'name' => 'Umar hayat', 
            'email' => 'superadmin@gmail.com',
            'password' => '$2y$10$TBe1lruRCjjs0iFDl4B9kOtcahpJZ.ZikqvTqa3dq806MzlNdEj1C',//12345678
            'image'=>'1630604659our-team4.png'
        ]);
        $role=Role::find(1);
        $user->attachRole($role);
        
    }
}
