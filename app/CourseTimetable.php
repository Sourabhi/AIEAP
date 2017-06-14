<?php

namespace aieapV1;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseTimetable extends Model
{
    //
    use SoftDeletes;
    protected $table='course_timetable';
    protected $dates = ['deleted_at'];



    public function day_timeslot()
    {
        return $this->belongsToMany('aieapV1\DayTimeslot');
    }
}
