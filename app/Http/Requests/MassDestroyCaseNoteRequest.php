<?php

namespace App\Http\Requests;

use App\Models\CaseNote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCaseNoteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('case_note_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:case_notes,id',
        ];
    }
}
