<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCaseActionTakenRequest;
use App\Http\Requests\StoreCaseActionTakenRequest;
use App\Http\Requests\UpdateCaseActionTakenRequest;
use App\Models\ActionType;
use App\Models\CaseActionTaken;
use App\Models\CaseInfo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseActionTakenController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_action_taken_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseActionTakens = CaseActionTaken::all();

        return view('admin.caseActionTakens.index', compact('caseActionTakens'));
    }

    public function create($id)
    {
       //  dd($id);
        abort_if(Gate::denies('case_action_taken_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cases = CaseInfo::all()->pluck('case_ref_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $action_types = ActionType::all()->pluck('action_type_desc', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.caseActionTakens.create', compact('id','cases', 'action_types'));
    }

    public function store(StoreCaseActionTakenRequest $request)
    {
        $caseActionTaken = CaseActionTaken::create($request->all());

      //  return redirect()->route('admin.case-action-takens.index');
              return redirect()->route('admin.case-infos.edit',  $request->input('case_id'))->withInput(['tab'=>'secondtab']);  

    }

    public function edit(CaseActionTaken $caseActionTaken)
    {
        abort_if(Gate::denies('case_action_taken_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cases = CaseInfo::all()->pluck('case_ref_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $action_types = ActionType::all()->pluck('action_type_desc', 'id')->prepend(trans('global.pleaseSelect'), '');

        $caseActionTaken->load('case', 'action_type');

        return view('admin.caseActionTakens.edit', compact('cases', 'action_types', 'caseActionTaken'));
    }

    public function update(UpdateCaseActionTakenRequest $request, CaseActionTaken $caseActionTaken)
    {
        $caseActionTaken->update($request->all());

        return redirect()->route('admin.case-action-takens.index');
    }

    public function show(CaseActionTaken $caseActionTaken)
    {
        abort_if(Gate::denies('case_action_taken_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseActionTaken->load('case', 'action_type');

        return view('admin.caseActionTakens.show', compact('caseActionTaken'));
    }

    public function destroy(CaseActionTaken $caseActionTaken)
    {
        abort_if(Gate::denies('case_action_taken_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseActionTaken->delete();

        return back();
    }

    public function massDestroy(MassDestroyCaseActionTakenRequest $request)
    {
        CaseActionTaken::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
