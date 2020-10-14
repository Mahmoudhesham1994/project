<?php

namespace App\Http\Requests;

use App\Models\CaseNote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCaseNoteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('case_note_edit');
    }

    public function rules()
    {
        return [
            'case_id'   => [
                'required',
                'integer',
            ],
            'note_desc' => [
                'required',
            ],
        ];
    }
}
