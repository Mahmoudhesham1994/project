<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCaseNoteRequest;
use App\Http\Requests\StoreCaseNoteRequest;
use App\Http\Requests\UpdateCaseNoteRequest;
use App\Models\CaseInfo;
use App\Models\CaseNote;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseNotesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_note_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseNotes = CaseNote::all();

        return view('admin.caseNotes.index', compact('caseNotes'));
    }

    public function create($id)
    {
       // dd($id);
        abort_if(Gate::denies('case_note_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cases = CaseInfo::all()->pluck('case_ref_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.caseNotes.create', compact('id','cases'));
    }

    public function store(StoreCaseNoteRequest $request)
    {
        $caseNote = CaseNote::create($request->all());

       // return redirect()->route('admin.case-notes.index');
              return redirect()->route('admin.case-infos.edit',  $request->input('case_id'))->withInput(['tab'=>'secondtab']);  

    }

    public function edit(CaseNote $caseNote)
    {
        abort_if(Gate::denies('case_note_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cases = CaseInfo::all()->pluck('case_ref_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $caseNote->load('case');

        return view('admin.caseNotes.edit', compact('cases', 'caseNote'));
    }

    public function update(UpdateCaseNoteRequest $request, CaseNote $caseNote)
    {
        $caseNote->update($request->all());

        return redirect()->route('admin.case-notes.index');
    }

    public function show(CaseNote $caseNote)
    {
        abort_if(Gate::denies('case_note_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseNote->load('case');

        return view('admin.caseNotes.show', compact('caseNote'));
    }

    public function destroy(CaseNote $caseNote)
    {
        abort_if(Gate::denies('case_note_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseNote->delete();

        return back();
    }

    public function massDestroy(MassDestroyCaseNoteRequest $request)
    {
        CaseNote::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
