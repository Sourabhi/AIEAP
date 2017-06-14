<?php

use Illuminate\Database\Seeder;

class DayTimeslotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('days_timeslots')->insert([
            'days_id' => rand(111111111111, 999999999999),
             'timeslots_id' => rand(111111111111, 999999999999),

            ]);
    }
}
