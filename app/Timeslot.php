<?php

namespace aieapV1;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Timeslot extends Model
{ 
    use SoftDeletes;
    protected $table='timeslots';
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'timeslot', 'starttime', 'endtime',
    ];
    
   /* protected $guarded = [
        'id',
        'day_timeslot'
    ];*/
    
     public function days()
    {
        return $this->belongsToMany('aieapV1\Day','day_timeslot');
    }
    
     public function hasDayTimeslot()
    {
        return $this->belongsTo('aieapV1\DayTimeslot','id','day_timeslot_id');
    }
    
   
}
