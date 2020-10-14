<?php

namespace App\Http\Requests;

use App\Models\Staff;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStaffRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('staff_create');
    }

    public function rules()
    {
        return [
            'staff_no'   => [
                'string',
                'max:15',
                'required',
            ],
            'staff_name' => [
                'string',
                'max:40',
                'required',
            ],
            'notes'      => [
                'string',
                'max:250',
                'nullable',
            ],
        ];
    }
}
