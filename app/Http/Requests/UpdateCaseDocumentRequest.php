<?php

namespace App\Http\Requests;

use App\Models\CaseDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCaseDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('case_document_edit');
    }

    public function rules()
    {
        return [
            'doc_type_id'  => [
                'required',
                'integer',
            ],
            'doc_desc_a'   => [
                'string',
                'required',
            ],
            'doc_date'     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'doc_ref_code' => [
                'string',
                'max:15',
                'nullable',
            ],
            'doc_note'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
