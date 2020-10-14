<?php

namespace App\Http\Requests;

use App\Models\OutDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOutDocumentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('out_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:out_documents,id',
        ];
    }
}
