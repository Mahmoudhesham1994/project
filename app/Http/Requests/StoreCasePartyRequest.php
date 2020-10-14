<?php

namespace App\Http\Requests;

use App\Models\CaseParty;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCasePartyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('case_party_create');
    }

    public function rules()
    {
        return [
            'case_id'       => [
                'required',
                'integer',
            ],
            'party_type_id' => [
                'required',
                'integer',
            ],
            'party_id_num'  => [
                'string',
                'nullable',
            ],
            'party_name'    => [
                'string',
                'required',
            ],
            'party_address' => [
                'string',
                'nullable',
            ],
            'party_phone'   => [
                'string',
                'max:15',
                'nullable',
            ],
            'party_mobile'  => [
                'string',
                'max:15',
                'nullable',
            ],
            'party_notes'   => [
                'string',
                'max:250',
                'nullable',
            ],
        ];
    }
}
