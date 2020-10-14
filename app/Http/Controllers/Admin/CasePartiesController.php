<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCasePartyRequest;
use App\Http\Requests\StoreCasePartyRequest;
use App\Http\Requests\UpdateCasePartyRequest;
use App\Models\CaseInfo;
use App\Models\CaseParty;
use App\Models\PartyType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CasePartiesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_party_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseParties = CaseParty::all();

        return view('admin.caseParties.index', compact('caseParties'));
    }

    public function create($id)
    {
        //dd($id);
       
        abort_if(Gate::denies('case_party_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cases = CaseInfo::all()->pluck('case_ref_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $party_types = PartyType::all()->pluck('party_type_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.caseParties.create', compact('id','cases', 'party_types'));
    }

    public function store(StoreCasePartyRequest $request)
    {
        $caseParty = CaseParty::create($request->all());
       //  dd($caseParty);
      //  return redirect()->route('admin.case-parties.index');
      return redirect()->route('admin.case-infos.edit',  $request->input('case_id'))->withInput(['tab'=>'secondtab']);  
    }

    public function edit(CaseParty $caseParty)
    {
        abort_if(Gate::denies('case_party_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cases = CaseInfo::all()->pluck('case_ref_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $party_types = PartyType::all()->pluck('party_type_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');

        $caseParty->load('case', 'party_type');

        return view('admin.caseParties.edit', compact('cases', 'party_types', 'caseParty'));
    }

    public function update(UpdateCasePartyRequest $request, CaseParty $caseParty)
    {
        $caseParty->update($request->all());

        return redirect()->route('admin.case-parties.index');
    }

    public function show(CaseParty $caseParty)
    {
        
        abort_if(Gate::denies('case_party_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseParty->load('case', 'party_type');

        return view('admin.caseParties.show', compact('caseParty'));
    }

    public function destroy(CaseParty $caseParty)
    {
        abort_if(Gate::denies('case_party_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseParty->delete();

        return back();
    }

    public function massDestroy(MassDestroyCasePartyRequest $request)
    {
        CaseParty::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
