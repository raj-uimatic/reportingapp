<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateReportRequest extends Request
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
            'title'=>'required|between:3,100',
            'content'=>'required',
            'worked_on'=>'required|date',
            'work_type_id'=>'required'
        ];
    }
}
