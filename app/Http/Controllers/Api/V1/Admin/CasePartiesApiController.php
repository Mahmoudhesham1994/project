<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCasePartyRequest;
use App\Http\Requests\UpdateCasePartyRequest;
use App\Http\Resources\Admin\CasePartyResource;
use App\Models\CaseParty;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CasePartiesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_party_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CasePartyResource(CaseParty::with(['case', 'party_type'])->get());
    }

    public function store(StoreCasePartyRequest $request)
    {
        $caseParty = CaseParty::create($request->all());

        return (new CasePartyResource($caseParty))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CaseParty $caseParty)
    {
        abort_if(Gate::denies('case_party_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CasePartyResource($caseParty->load(['case', 'party_type']));
    }

    public function update(UpdateCasePartyRequest $request, CaseParty $caseParty)
    {
        $caseParty->update($request->all());

        return (new CasePartyResource($caseParty))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CaseParty $caseParty)
    {
        abort_if(Gate::denies('case_party_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseParty->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
