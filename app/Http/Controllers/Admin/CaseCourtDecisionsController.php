<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCaseCourtDecisionRequest;
use App\Http\Requests\StoreCaseCourtDecisionRequest;
use App\Http\Requests\UpdateCaseCourtDecisionRequest;
use App\Models\CaseCourtDecision;
use App\Models\CaseInfo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseCourtDecisionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_court_decision_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseCourtDecisions = CaseCourtDecision::all();

        return view('admin.caseCourtDecisions.index', compact('caseCourtDecisions'));
    }

    public function create($id)
    {
       // dd($id);
        abort_if(Gate::denies('case_court_decision_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cases = CaseInfo::all()->pluck('case_ref_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.caseCourtDecisions.create', compact('id','cases'));
    }

    public function store(StoreCaseCourtDecisionRequest $request)
    {
        $caseCourtDecision = CaseCourtDecision::create($request->all());
      return redirect()->route('admin.case-infos.edit',  $request->input('case_id'))->withInput(['tab'=>'secondtab']);  

       // return redirect()->route('admin.case-court-decisions.index');
    }

    public function edit(CaseCourtDecision $caseCourtDecision)
    {
        abort_if(Gate::denies('case_court_decision_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cases = CaseInfo::all()->pluck('case_ref_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $caseCourtDecision->load('case');

        return view('admin.caseCourtDecisions.edit', compact('cases', 'caseCourtDecision'));
    }

    public function update(UpdateCaseCourtDecisionRequest $request, CaseCourtDecision $caseCourtDecision)
    {
        $caseCourtDecision->update($request->all());

        return redirect()->route('admin.case-court-decisions.index');
    }

    public function show(CaseCourtDecision $caseCourtDecision)
    {
        abort_if(Gate::denies('case_court_decision_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseCourtDecision->load('case');

        return view('admin.caseCourtDecisions.show', compact('caseCourtDecision'));
    }

    public function destroy(CaseCourtDecision $caseCourtDecision)
    {
        abort_if(Gate::denies('case_court_decision_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseCourtDecision->delete();

        return back();
    }

    public function massDestroy(MassDestroyCaseCourtDecisionRequest $request)
    {
        CaseCourtDecision::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
