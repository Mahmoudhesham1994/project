<?php

namespace App\Http\Requests;

use App\Models\OutDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOutDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('out_document_edit');
    }

    public function rules()
    {
        return [
            'case_id'       => [
                'required',
                'integer',
            ],
            'out_date'      => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'return_date'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'receiver_name' => [
                'string',
                'max:120',
                'nullable',
            ],
            'out_notes'     => [
                'string',
                'max:250',
                'nullable',
            ],
        ];
    }
}
