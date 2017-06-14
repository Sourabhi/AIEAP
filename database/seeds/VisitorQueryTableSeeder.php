<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class VisitorQueryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('queryvisitors')->insert([
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'phone'=> '00'.rand(111111111111, 999999999999),
            'email' => str_random(10).'@gmail.com',
            'nationality'=>str_random(10),
            'message'=>str_random(45),
            
            ]);
    }
}
