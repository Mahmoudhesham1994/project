<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOutDocumentRequest;
use App\Http\Requests\StoreOutDocumentRequest;
use App\Http\Requests\UpdateOutDocumentRequest;
use App\Models\CaseDocument;
use App\Models\CaseInfo;
use App\Models\DocBorrower;
use App\Models\OutDocument;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OutDocumentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('out_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outDocuments = OutDocument::all();

        return view('admin.outDocuments.index', compact('outDocuments'));
    }

    public function create()
    {
        abort_if(Gate::denies('out_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cases = CaseInfo::all()->pluck('case_ref_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $docs = CaseDocument::all()->pluck('doc_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');

        $borrowers = DocBorrower::all()->pluck('borrower_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.outDocuments.create', compact('cases', 'docs', 'borrowers'));
    }

    public function store(StoreOutDocumentRequest $request)
    {
        $outDocument = OutDocument::create($request->all());

        return redirect()->route('admin.out-documents.index');
    }

    public function edit(OutDocument $outDocument)
    {
        abort_if(Gate::denies('out_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cases = CaseInfo::all()->pluck('case_ref_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $docs = CaseDocument::all()->pluck('doc_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');

        $borrowers = DocBorrower::all()->pluck('borrower_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $outDocument->load('case', 'doc', 'borrower');

        return view('admin.outDocuments.edit', compact('cases', 'docs', 'borrowers', 'outDocument'));
    }

    public function update(UpdateOutDocumentRequest $request, OutDocument $outDocument)
    {
        $outDocument->update($request->all());

        return redirect()->route('admin.out-documents.index');
    }

    public function show(OutDocument $outDocument)
    {
        abort_if(Gate::denies('out_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outDocument->load('case', 'doc', 'borrower');

        return view('admin.outDocuments.show', compact('outDocument'));
    }

    public function destroy(OutDocument $outDocument)
    {
        abort_if(Gate::denies('out_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outDocument->delete();

        return back();
    }

    public function massDestroy(MassDestroyOutDocumentRequest $request)
    {
        OutDocument::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
