<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOutDocumentRequest;
use App\Http\Requests\UpdateOutDocumentRequest;
use App\Http\Resources\Admin\OutDocumentResource;
use App\Models\OutDocument;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OutDocumentsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('out_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutDocumentResource(OutDocument::with(['case', 'doc', 'borrower'])->get());
    }

    public function store(StoreOutDocumentRequest $request)
    {
        $outDocument = OutDocument::create($request->all());

        return (new OutDocumentResource($outDocument))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OutDocument $outDocument)
    {
        abort_if(Gate::denies('out_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutDocumentResource($outDocument->load(['case', 'doc', 'borrower']));
    }

    public function update(UpdateOutDocumentRequest $request, OutDocument $outDocument)
    {
        $outDocument->update($request->all());

        return (new OutDocumentResource($outDocument))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OutDocument $outDocument)
    {
        abort_if(Gate::denies('out_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outDocument->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
