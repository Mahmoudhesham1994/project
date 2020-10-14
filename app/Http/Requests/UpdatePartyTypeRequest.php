<?php

namespace App\Http\Requests;

use App\Models\PartyType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePartyTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('party_type_edit');
    }

    public function rules()
    {
        return [
            'party_type_desc_a' => [
                'string',
                'max:120',
                'required',
            ],
        ];
    }
}
