@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.caseActionTaken.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.case-action-takens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.caseActionTaken.fields.id') }}
                        </th>
                        <td>
                            {{ $caseActionTaken->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseActionTaken.fields.case') }}
                        </th>
                        <td>
                            {{ $caseActionTaken->case->case_ref_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseActionTaken.fields.action_type') }}
                        </th>
                        <td>
                            {{ $caseActionTaken->action_type->action_type_desc ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseActionTaken.fields.action_desc') }}
                        </th>
                        <td>
                            {{ $caseActionTaken->action_desc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseActionTaken.fields.action_date') }}
                        </th>
                        <td>
                            {{ $caseActionTaken->action_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseActionTaken.fields.action_notes') }}
                        </th>
                        <td>
                            {{ $caseActionTaken->action_notes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.case-action-takens.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection