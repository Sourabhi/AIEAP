<?php

use Illuminate\Database\Seeder;

class TimeslotInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timeslots')->insert([
            'title' => str_random(10),
            
            ]);
    }
}
