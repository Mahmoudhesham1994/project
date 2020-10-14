@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.outDocument.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.out-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.outDocument.fields.id') }}
                        </th>
                        <td>
                            {{ $outDocument->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outDocument.fields.case') }}
                        </th>
                        <td>
                            {{ $outDocument->case->case_ref_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outDocument.fields.doc') }}
                        </th>
                        <td>
                            {{ $outDocument->doc->doc_desc_a ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outDocument.fields.out_date') }}
                        </th>
                        <td>
                            {{ $outDocument->out_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outDocument.fields.return_date') }}
                        </th>
                        <td>
                            {{ $outDocument->return_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outDocument.fields.borrower') }}
                        </th>
                        <td>
                            {{ $outDocument->borrower->borrower_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outDocument.fields.receiver_name') }}
                        </th>
                        <td>
                            {{ $outDocument->receiver_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outDocument.fields.out_notes') }}
                        </th>
                        <td>
                            {{ $outDocument->out_notes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.out-documents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection