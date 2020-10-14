<?php

namespace App\Http\Requests;

use App\Models\DocBorrower;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDocBorrowerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('doc_borrower_edit');
    }

    public function rules()
    {
        return [
            'borrower_name'    => [
                'string',
                'max:120',
                'required',
            ],
            'borrower_address' => [
                'string',
                'max:250',
                'nullable',
            ],
            'borrower_desc'    => [
                'string',
                'max:250',
                'nullable',
            ],
        ];
    }
}
