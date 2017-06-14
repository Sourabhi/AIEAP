<?php

namespace aieapV1\Http\Requests;

use aieapV1\Http\Requests\Request;

class UpdateStudentEnrolmentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
         'first_name' => 'required|regex:/^[\pL\s\-]+$/u|max:45',
         'last_name' => 'required|regex:/^[\pL\s\-]+$/u|max:45',
         'date_of_birth'=>'required|date_format:Y-m-d',
         'gender'=>'required|max:45',
         'house_no'=>'required|max:45',
         'town'=>'required|max:45',
         'state'=>'required|max:45',
         'postcode'=>'required|max:20',
         'country'=>'required|max:45',
         'nationality'=>'required|alpha|max:30',
         'email' => 'required|email',
         //'email' => 'required|email|unique:users,email,'.$this->email,
         'phone' => 'required|regex:/^[0]{2,}[0-9]{3,15}$/|min:12|max:15',
         'courses'=>'required|max:45',
         'image'=>'image|mimes:jpeg,png,tiff|between:10,500',
        
        ];
    }
}
