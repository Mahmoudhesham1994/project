@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.docBorrower.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.doc-borrowers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.docBorrower.fields.id') }}
                        </th>
                        <td>
                            {{ $docBorrower->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.docBorrower.fields.borrower_name') }}
                        </th>
                        <td>
                            {{ $docBorrower->borrower_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.docBorrower.fields.borrower_address') }}
                        </th>
                        <td>
                            {{ $docBorrower->borrower_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.docBorrower.fields.borrower_desc') }}
                        </th>
                        <td>
                            {{ $docBorrower->borrower_desc }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.doc-borrowers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection