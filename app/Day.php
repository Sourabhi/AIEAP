<?php

namespace aieapV1;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Day extends Model
{
    use SoftDeletes;
    protected $table='days';
    protected $dates = ['deleted_at'];
     /*protected $guarded = [
        'id',
        'day_timeslot',
        
    ];*/
   
    protected $fillable = array('day_id','timeslot_id','day',);
    public function timeslots()
     {
        return $this->belongsToMany('aieapV1\Timeslot','day_timeslot');

     }

    
     
}

