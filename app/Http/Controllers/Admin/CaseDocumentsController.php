<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCaseDocumentRequest;
use App\Http\Requests\StoreCaseDocumentRequest;
use App\Http\Requests\UpdateCaseDocumentRequest;
use App\Models\CaseDocument;
use App\Models\CaseInfo;
use App\Models\DocType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CaseDocumentsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('case_document_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseDocuments = CaseDocument::all();

        return view('admin.caseDocuments.index', compact('caseDocuments'));
    }

    public function create($id)
    {
        abort_if(Gate::denies('case_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cases = CaseInfo::all()->pluck('case_ref_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doc_types = DocType::all()->pluck('doc_type_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.caseDocuments.create', compact('id','cases', 'doc_types'));
    }

    public function store(StoreCaseDocumentRequest $request)
    {
        $caseDocument = CaseDocument::create($request->all());

        if ($request->input('doc_file_name', false)) {
            $caseDocument->addMedia(storage_path('tmp/uploads/' . $request->input('doc_file_name')))->toMediaCollection('doc_file_name');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $caseDocument->id]);
        }

     //   return redirect()->route('admin.case-documents.index');
              return redirect()->route('admin.case-infos.edit',  $request->input('case_id'))->withInput(['tab'=>'secondtab']);  

    }

    public function edit(CaseDocument $caseDocument)
    {
        abort_if(Gate::denies('case_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cases = CaseInfo::all()->pluck('case_ref_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doc_types = DocType::all()->pluck('doc_type_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');

        $caseDocument->load('case', 'doc_type');

        return view('admin.caseDocuments.edit', compact('cases', 'doc_types', 'caseDocument'));
    }

    public function update(UpdateCaseDocumentRequest $request, CaseDocument $caseDocument)
    {
        $caseDocument->update($request->all());

        if ($request->input('doc_file_name', false)) {
            if (!$caseDocument->doc_file_name || $request->input('doc_file_name') !== $caseDocument->doc_file_name->file_name) {
                if ($caseDocument->doc_file_name) {
                    $caseDocument->doc_file_name->delete();
                }

                $caseDocument->addMedia(storage_path('tmp/uploads/' . $request->input('doc_file_name')))->toMediaCollection('doc_file_name');
            }
        } elseif ($caseDocument->doc_file_name) {
            $caseDocument->doc_file_name->delete();
        }

        return redirect()->route('admin.case-documents.index');
    }

    public function show(CaseDocument $caseDocument)
    {
        abort_if(Gate::denies('case_document_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseDocument->load('case', 'doc_type', 'docOutDocuments');

        return view('admin.caseDocuments.show', compact('caseDocument'));
    }

    public function destroy(CaseDocument $caseDocument)
    {
        abort_if(Gate::denies('case_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseDocument->delete();

        return back();
    }

    public function massDestroy(MassDestroyCaseDocumentRequest $request)
    {
        CaseDocument::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('case_document_create') && Gate::denies('case_document_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CaseDocument();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
