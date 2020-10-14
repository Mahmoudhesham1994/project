<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCaseActionTakenRequest;
use App\Http\Requests\UpdateCaseActionTakenRequest;
use App\Http\Resources\Admin\CaseActionTakenResource;
use App\Models\CaseActionTaken;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseActionTakenApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_action_taken_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CaseActionTakenResource(CaseActionTaken::with(['case', 'action_type'])->get());
    }

    public function store(StoreCaseActionTakenRequest $request)
    {
        $caseActionTaken = CaseActionTaken::create($request->all());

        return (new CaseActionTakenResource($caseActionTaken))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CaseActionTaken $caseActionTaken)
    {
        abort_if(Gate::denies('case_action_taken_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CaseActionTakenResource($caseActionTaken->load(['case', 'action_type']));
    }

    public function update(UpdateCaseActionTakenRequest $request, CaseActionTaken $caseActionTaken)
    {
        $caseActionTaken->update($request->all());

        return (new CaseActionTakenResource($caseActionTaken))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CaseActionTaken $caseActionTaken)
    {
        abort_if(Gate::denies('case_action_taken_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseActionTaken->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
