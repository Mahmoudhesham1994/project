<?php

namespace App\Http\Requests;

use App\Models\CaseActionTaken;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCaseActionTakenRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('case_action_taken_edit');
    }

    public function rules()
    {
        return [
            'case_id'        => [
                'required',
                'integer',
            ],
            'action_type_id' => [
                'required',
                'integer',
            ],
            'action_date'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'action_notes'   => [
                'string',
                'max:100',
                'nullable',
            ],
        ];
    }
}
