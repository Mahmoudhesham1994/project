@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.caseDocument.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.case-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.caseDocument.fields.id') }}
                        </th>
                        <td>
                            {{ $caseDocument->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseDocument.fields.case') }}
                        </th>
                        <td>
                            {{ $caseDocument->case->case_ref_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseDocument.fields.doc_type') }}
                        </th>
                        <td>
                            {{ $caseDocument->doc_type->doc_type_desc_a ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseDocument.fields.doc_desc_a') }}
                        </th>
                        <td>
                            {{ $caseDocument->doc_desc_a }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseDocument.fields.doc_date') }}
                        </th>
                        <td>
                            {{ $caseDocument->doc_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseDocument.fields.doc_ref_code') }}
                        </th>
                        <td>
                            {{ $caseDocument->doc_ref_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseDocument.fields.doc_note') }}
                        </th>
                        <td>
                            {{ $caseDocument->doc_note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseDocument.fields.doc_file_name') }}
                        </th>
                        <td>
                            @if($caseDocument->doc_file_name)
                                <a href="{{ $caseDocument->doc_file_name->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.case-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#doc_out_documents" role="tab" data-toggle="tab">
                {{ trans('cruds.outDocument.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="doc_out_documents">
            @includeIf('admin.caseDocuments.relationships.docOutDocuments', ['outDocuments' => $caseDocument->docOutDocuments])
        </div>
    </div>
</div>

@endsection