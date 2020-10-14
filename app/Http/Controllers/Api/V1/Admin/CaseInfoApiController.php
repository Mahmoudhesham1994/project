<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCaseInfoRequest;
use App\Http\Requests\UpdateCaseInfoRequest;
use App\Http\Resources\Admin\CaseInfoResource;
use App\Models\CaseInfo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseInfoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_info_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CaseInfoResource(CaseInfo::with(['case_type', 'dept', 'report_type', 'status', 'staff'])->get());
    }

    public function store(StoreCaseInfoRequest $request)
    {
        $caseInfo = CaseInfo::create($request->all());

        return (new CaseInfoResource($caseInfo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CaseInfo $caseInfo)
    {
        abort_if(Gate::denies('case_info_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CaseInfoResource($caseInfo->load(['case_type', 'dept', 'report_type', 'status', 'staff']));
    }

    public function update(UpdateCaseInfoRequest $request, CaseInfo $caseInfo)
    {
        $caseInfo->update($request->all());

        return (new CaseInfoResource($caseInfo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CaseInfo $caseInfo)
    {
        abort_if(Gate::denies('case_info_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseInfo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
