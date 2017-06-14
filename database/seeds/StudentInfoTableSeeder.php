<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class StudentInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('students')->insert([
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'phone'=> '00'.rand(111111111111, 999999999999),
            'email' => str_random(10).'@gmail.com',
            'nationality'=>str_random(10),
            'comments'=>str_random(45),
            
            ]);
    
    }
}
