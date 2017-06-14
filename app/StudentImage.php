<?php

namespace aieapV1;

use Illuminate\Database\Eloquent\Model;

class StudentImage extends Model
{
    protected $table="student_images";
    protected $fillable = [
        'student_id', 'filename', 'path',
    ];

    public function students(){
       return $this->belongsTo('aieapV1\Student','student_id');
    }
}
