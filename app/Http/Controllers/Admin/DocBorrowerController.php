<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDocBorrowerRequest;
use App\Http\Requests\StoreDocBorrowerRequest;
use App\Http\Requests\UpdateDocBorrowerRequest;
use App\Models\DocBorrower;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocBorrowerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('doc_borrower_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $docBorrowers = DocBorrower::all();

        return view('admin.docBorrowers.index', compact('docBorrowers'));
    }

    public function create()
    {
        abort_if(Gate::denies('doc_borrower_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.docBorrowers.create');
    }

    public function store(StoreDocBorrowerRequest $request)
    {
        $docBorrower = DocBorrower::create($request->all());

        return redirect()->route('admin.doc-borrowers.index');
    }

    public function edit(DocBorrower $docBorrower)
    {
        abort_if(Gate::denies('doc_borrower_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.docBorrowers.edit', compact('docBorrower'));
    }

    public function update(UpdateDocBorrowerRequest $request, DocBorrower $docBorrower)
    {
        $docBorrower->update($request->all());

        return redirect()->route('admin.doc-borrowers.index');
    }

    public function show(DocBorrower $docBorrower)
    {
        abort_if(Gate::denies('doc_borrower_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.docBorrowers.show', compact('docBorrower'));
    }

    public function destroy(DocBorrower $docBorrower)
    {
        abort_if(Gate::denies('doc_borrower_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $docBorrower->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocBorrowerRequest $request)
    {
        DocBorrower::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
