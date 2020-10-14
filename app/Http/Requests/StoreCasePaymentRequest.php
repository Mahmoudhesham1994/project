<?php

namespace App\Http\Requests;

use App\Models\CasePayment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCasePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('case_payment_create');
    }

    public function rules()
    {
        return [
            'case_id'          => [
                'required',
                'integer',
            ],
            'payment_date'     => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'payment_amt'      => [
                'required',
            ],
            'crncy_id'         => [
                'required',
                'integer',
            ],
            'payment_ref_code' => [
                'string',
                'max:15',
                'nullable',
            ],
            'payment_notes'    => [
                'string',
                'max:250',
                'nullable',
            ],
        ];
    }
}
