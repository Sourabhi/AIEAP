<?php

namespace aieapV1;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $table='courses';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'course', 'start_date', 'completion_date','description',
    ];

    
    
     
     public function students()
    {
        return $this->belongsToMany('aieapV1\Student','course_student');

    }
     public function day_timeslot()
    {
        return $this->belongsToMany('aieapV1\DayTimeslot','course_timetable')->withPivot('course_id','day_timeslot_id');

    }
}
