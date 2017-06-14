<?php

use Illuminate\Database\Seeder;

class StudentCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students_courses')->insert([
            'students_id' => 1,
            'courses_id' => 1,
            ]);
    }
}
