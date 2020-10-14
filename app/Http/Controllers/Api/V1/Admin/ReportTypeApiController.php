<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportTypeRequest;
use App\Http\Requests\UpdateReportTypeRequest;
use App\Http\Resources\Admin\ReportTypeResource;
use App\Models\ReportType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('report_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportTypeResource(ReportType::all());
    }

    public function store(StoreReportTypeRequest $request)
    {
        $reportType = ReportType::create($request->all());

        return (new ReportTypeResource($reportType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReportType $reportType)
    {
        abort_if(Gate::denies('report_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportTypeResource($reportType);
    }

    public function update(UpdateReportTypeRequest $request, ReportType $reportType)
    {
        $reportType->update($request->all());

        return (new ReportTypeResource($reportType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReportType $reportType)
    {
        abort_if(Gate::denies('report_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
