<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TaskRequest extends Request
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
            'Other'=>'required',
            'Name'=>'required',
            'Platecar'=>'required',
            'IdCardT'=>'required',
            'IDCard'=>'required',
            'Telhome'=>'required',
            'Telhand'=>'required',
            'Carbrand1'=>'required',
            'CarColor1'=>'required',
            'CtID'=>'required',
            'Status'=>'required'
        ];
    }
}
