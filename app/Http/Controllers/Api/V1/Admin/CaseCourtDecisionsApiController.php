<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCaseCourtDecisionRequest;
use App\Http\Requests\UpdateCaseCourtDecisionRequest;
use App\Http\Resources\Admin\CaseCourtDecisionResource;
use App\Models\CaseCourtDecision;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseCourtDecisionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_court_decision_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CaseCourtDecisionResource(CaseCourtDecision::with(['case'])->get());
    }

    public function store(StoreCaseCourtDecisionRequest $request)
    {
        $caseCourtDecision = CaseCourtDecision::create($request->all());

        return (new CaseCourtDecisionResource($caseCourtDecision))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CaseCourtDecision $caseCourtDecision)
    {
        abort_if(Gate::denies('case_court_decision_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CaseCourtDecisionResource($caseCourtDecision->load(['case']));
    }

    public function update(UpdateCaseCourtDecisionRequest $request, CaseCourtDecision $caseCourtDecision)
    {
        $caseCourtDecision->update($request->all());

        return (new CaseCourtDecisionResource($caseCourtDecision))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CaseCourtDecision $caseCourtDecision)
    {
        abort_if(Gate::denies('case_court_decision_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseCourtDecision->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
