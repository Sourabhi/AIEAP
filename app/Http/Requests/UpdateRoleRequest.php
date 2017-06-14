<?php

namespace aieapV1\Http\Requests;

use aieapV1\Http\Requests\Request;

class UpdateRoleRequest extends Request
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
        'role' => 'required|max:45|unique:roles,role,'.$this->id,
        //'role' => 'required|max:45',
        'description' => 'required',
        ];
    }
}
