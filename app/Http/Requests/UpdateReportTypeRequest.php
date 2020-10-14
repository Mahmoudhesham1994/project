<?php

namespace App\Http\Requests;

use App\Models\ReportType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReportTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('report_type_edit');
    }

    public function rules()
    {
        return [
            'rep_type_desc_a' => [
                'string',
                'max:40',
                'required',
            ],
            'rep_type_desc_l' => [
                'string',
                'max:40',
                'nullable',
            ],
        ];
    }
}
