<?php

namespace App\Http\Requests;

use App\Models\DocType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDocTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('doc_type_edit');
    }

    public function rules()
    {
        return [
            'doc_type_desc_a' => [
                'string',
                'max:250',
                'required',
            ],
            'doc_type_desc_l' => [
                'string',
                'max:250',
                'nullable',
            ],
        ];
    }
}
