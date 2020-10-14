<?php

namespace App\Http\Requests;

use App\Models\ActionType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreActionTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('action_type_create');
    }

    public function rules()
    {
        return [
            'action_type_desc' => [
                'string',
                'required',
            ],
        ];
    }
}
