<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class CourseInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'name' => str_random(10),
            
            ]);
    }
}
