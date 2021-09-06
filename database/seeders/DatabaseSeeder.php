<?php

namespace Database\Seeders;

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
    }
}
