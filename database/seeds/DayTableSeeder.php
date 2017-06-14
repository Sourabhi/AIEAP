<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
            'day' => str_random(10),
           
            
            ]);
    }
}
