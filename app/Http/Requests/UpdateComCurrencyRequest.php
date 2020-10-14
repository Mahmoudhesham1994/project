<?php

namespace App\Http\Requests;

use App\Models\ComCurrency;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateComCurrencyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('com_currency_edit');
    }

    public function rules()
    {
        return [
            'crncy_desc_a' => [
                'string',
                'max:40',
                'required',
            ],
            'crncy_desc_l' => [
                'string',
                'max:40',
                'nullable',
            ],
            'crncy_symbol' => [
                'string',
                'max:3',
                'nullable',
            ],
        ];
    }
}
