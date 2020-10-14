<?php

namespace App\Http\Requests;

use App\Models\CaseInfo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCaseInfoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('case_info_create');
    }

    public function rules()
    {
        return [
            'case_ref_code' => [
                'string',
                'required',
            ],
            'case_name'     => [
                'string',
                'required',
            ],
            'case_date'     => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'case_type_id'  => [
                'required',
                'integer',
            ],
            'report_num'    => [
                'string',
                'max:40',
                'nullable',
            ],
            'close_date'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
