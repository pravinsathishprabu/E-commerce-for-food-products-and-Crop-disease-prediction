<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class FarmerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $farmer=[
              [
                'id'=>'1',
                'name'=>'Pravin',
                'email'=>'pravin@gmail.com',
                'password'=>bcrypt('pravin123'),
                'mobile'=>'9361345372',
                'latitude'=>'10.81',
                'longitude'=>'78.6932'
              ],
          ];
          DB::table('farmers')->insert($farmer);
    }
}
