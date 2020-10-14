<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCaseNoteRequest;
use App\Http\Requests\UpdateCaseNoteRequest;
use App\Http\Resources\Admin\CaseNoteResource;
use App\Models\CaseNote;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseNotesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_note_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CaseNoteResource(CaseNote::with(['case'])->get());
    }

    public function store(StoreCaseNoteRequest $request)
    {
        $caseNote = CaseNote::create($request->all());

        return (new CaseNoteResource($caseNote))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CaseNote $caseNote)
    {
        abort_if(Gate::denies('case_note_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CaseNoteResource($caseNote->load(['case']));
    }

    public function update(UpdateCaseNoteRequest $request, CaseNote $caseNote)
    {
        $caseNote->update($request->all());

        return (new CaseNoteResource($caseNote))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CaseNote $caseNote)
    {
        abort_if(Gate::denies('case_note_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseNote->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
