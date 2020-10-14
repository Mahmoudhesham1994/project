<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocBorrowerRequest;
use App\Http\Requests\UpdateDocBorrowerRequest;
use App\Http\Resources\Admin\DocBorrowerResource;
use App\Models\DocBorrower;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocBorrowerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('doc_borrower_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocBorrowerResource(DocBorrower::all());
    }

    public function store(StoreDocBorrowerRequest $request)
    {
        $docBorrower = DocBorrower::create($request->all());

        return (new DocBorrowerResource($docBorrower))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DocBorrower $docBorrower)
    {
        abort_if(Gate::denies('doc_borrower_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocBorrowerResource($docBorrower);
    }

    public function update(UpdateDocBorrowerRequest $request, DocBorrower $docBorrower)
    {
        $docBorrower->update($request->all());

        return (new DocBorrowerResource($docBorrower))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DocBorrower $docBorrower)
    {
        abort_if(Gate::denies('doc_borrower_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $docBorrower->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
