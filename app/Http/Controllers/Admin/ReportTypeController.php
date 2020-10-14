<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportTypeRequest;
use App\Http\Requests\StoreReportTypeRequest;
use App\Http\Requests\UpdateReportTypeRequest;
use App\Models\ReportType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('report_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportTypes = ReportType::all();

        return view('admin.reportTypes.index', compact('reportTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('report_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportTypes.create');
    }

    public function store(StoreReportTypeRequest $request)
    {
        $reportType = ReportType::create($request->all());

        return redirect()->route('admin.report-types.index');
    }

    public function edit(ReportType $reportType)
    {
        abort_if(Gate::denies('report_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportTypes.edit', compact('reportType'));
    }

    public function update(UpdateReportTypeRequest $request, ReportType $reportType)
    {
        $reportType->update($request->all());

        return redirect()->route('admin.report-types.index');
    }

    public function show(ReportType $reportType)
    {
        abort_if(Gate::denies('report_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportTypes.show', compact('reportType'));
    }

    public function destroy(ReportType $reportType)
    {
        abort_if(Gate::denies('report_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportType->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportTypeRequest $request)
    {
        ReportType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
