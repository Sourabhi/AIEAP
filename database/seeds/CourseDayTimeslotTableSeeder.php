<?php

use Illuminate\Database\Seeder;

class CourseDayTimeslotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses_days_timeslots')->insert([
            'courses_id' => rand(111111111111, 999999999999),
             'days_timeslots_id' => rand(111111111111, 999999999999),

            ]);
    }
}
