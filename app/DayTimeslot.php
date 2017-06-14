<?php

namespace aieapV1;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DayTimeslot extends Model
{
    use SoftDeletes;
    protected $table='day_timeslot';
    protected $dates = ['deleted_at'];
    protected $fillable = ['day_id','timeslot_id',];
    
    // protected $guarded = [
    //     'id',
    //     'course_timetable'
    // ];
    
    public function courses()
    {
      return $this->belongsToMany('aieapV1\Course','course_timetable')->withPivot('day_timeslot_id','course_id');
    }

    public function hasDays()
    {
      return $this->hasMany('aieapV1\Day','id', 'day_id');
    }

    public function hasTimeslots()
    {
        return $this->hasMany('aieapV1\Timeslot','id', 'timeslot_id');
    }   
}
