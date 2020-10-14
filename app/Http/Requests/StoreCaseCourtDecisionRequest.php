<?php

namespace App\Http\Requests;

use App\Models\CaseCourtDecision;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCaseCourtDecisionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('case_court_decision_create');
    }

    public function rules()
    {
        return [
            'case_id'         => [
                'required',
                'integer',
            ],
            'court_name'      => [
                'string',
                'max:200',
                'nullable',
            ],
            'court_reff_code' => [
                'string',
                'nullable',
            ],
            'court_date'      => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'court_notes'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
