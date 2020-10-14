<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCaseDocumentRequest;
use App\Http\Requests\UpdateCaseDocumentRequest;
use App\Http\Resources\Admin\CaseDocumentResource;
use App\Models\CaseDocument;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseDocumentsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('case_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CaseDocumentResource(CaseDocument::with(['case', 'doc_type'])->get());
    }

    public function store(StoreCaseDocumentRequest $request)
    {
        $caseDocument = CaseDocument::create($request->all());

        if ($request->input('doc_file_name', false)) {
            $caseDocument->addMedia(storage_path('tmp/uploads/' . $request->input('doc_file_name')))->toMediaCollection('doc_file_name');
        }

        return (new CaseDocumentResource($caseDocument))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CaseDocument $caseDocument)
    {
        abort_if(Gate::denies('case_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CaseDocumentResource($caseDocument->load(['case', 'doc_type']));
    }

    public function update(UpdateCaseDocumentRequest $request, CaseDocument $caseDocument)
    {
        $caseDocument->update($request->all());

        if ($request->input('doc_file_name', false)) {
            if (!$caseDocument->doc_file_name || $request->input('doc_file_name') !== $caseDocument->doc_file_name->file_name) {
                if ($caseDocument->doc_file_name) {
                    $caseDocument->doc_file_name->delete();
                }

                $caseDocument->addMedia(storage_path('tmp/uploads/' . $request->input('doc_file_name')))->toMediaCollection('doc_file_name');
            }
        } elseif ($caseDocument->doc_file_name) {
            $caseDocument->doc_file_name->delete();
        }

        return (new CaseDocumentResource($caseDocument))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CaseDocument $caseDocument)
    {
        abort_if(Gate::denies('case_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseDocument->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
