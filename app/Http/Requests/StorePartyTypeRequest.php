<?php

namespace App\Http\Requests;

use App\Models\PartyType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePartyTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('party_type_create');
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
