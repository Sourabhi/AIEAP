<?php

namespace aieapV1\Http\Requests;

use aieapV1\Http\Requests\Request;

class UpdateTimeslotRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        //'timeslot' => 'required|max:45|unique:timeslots,id,'.$this->id,
        'timeslot' => 'required|max:45',
        'starttime' => 'required',
        'endtime'=>'required',
        
            //
        ];
    }
}
