<?php

namespace App\Http\Requests;

use App\Models\ComDept;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateComDeptRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('com_dept_edit');
    }

    public function rules()
    {
        return [
            'dept_desc_a' => [
                'string',
                'max:250',
                'required',
            ],
            'dept_desc_l' => [
                'string',
                'nullable',
            ],
        ];
    }
}
