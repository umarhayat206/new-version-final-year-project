<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NationalArea;

class NationalAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i < 200; $i++) { 
            NationalArea::create(['name'=>'NA-'.$i,
            'notes' => 'this is the NA '.$i,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')]);
       }
    }
}
