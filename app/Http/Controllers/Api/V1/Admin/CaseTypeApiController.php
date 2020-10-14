<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCaseTypeRequest;
use App\Http\Requests\UpdateCaseTypeRequest;
use App\Http\Resources\Admin\CaseTypeResource;
use App\Models\CaseType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CaseTypeResource(CaseType::all());
    }

    public function store(StoreCaseTypeRequest $request)
    {
        $caseType = CaseType::create($request->all());

        return (new CaseTypeResource($caseType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CaseType $caseType)
    {
        abort_if(Gate::denies('case_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CaseTypeResource($caseType);
    }

    public function update(UpdateCaseTypeRequest $request, CaseType $caseType)
    {
        $caseType->update($request->all());

        return (new CaseTypeResource($caseType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CaseType $caseType)
    {
        abort_if(Gate::denies('case_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
