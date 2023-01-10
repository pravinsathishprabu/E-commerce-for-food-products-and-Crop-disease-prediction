<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $customer=[
              [
                'id'=>'1',
                'name'=>'Rama',
                'email'=>'rama@gmail.com',
                'password'=>bcrypt('rama@123'),
                'mobile'=>'7865432109',
                'latitude'=>'10.81',
                'longitude'=>'78.6932'
              ],
          ];
          DB::table('users')->insert($customer);
    }
}
