<?php

namespace App\Http\Requests;

use App\Models\CaseStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCaseStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('case_status_create');
    }

    public function rules()
    {
        return [
            'status_desc' => [
                'string',
                'required',
            ],
        ];
    }
}
