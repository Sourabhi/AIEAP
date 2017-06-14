<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_timetable', function (Blueprint $table) {
            $table->increments('id')->primary;
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            
            $table->integer('day_timeslot_id')->unsigned();
            $table->foreign('day_timeslot_id')->references('id')->on('day_timeslot');
            $table->timestampTz('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestampTz('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('course_timetable');
    }
}
