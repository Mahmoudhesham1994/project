<?php

namespace App\Http\Requests;

use App\Models\PartyType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPartyTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('party_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:party_types,id',
        ];
    }
}
