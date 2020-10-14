@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.caseInfo.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.case-infos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.caseInfo.fields.id') }}
                        </th>
                        <td>
                            {{ $caseInfo->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseInfo.fields.case_ref_code') }}
                        </th>
                        <td>
                            {{ $caseInfo->case_ref_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseInfo.fields.case_name') }}
                        </th>
                        <td>
                            {{ $caseInfo->case_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseInfo.fields.case_date') }}
                        </th>
                        <td>
                            {{ $caseInfo->case_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseInfo.fields.case_type') }}
                        </th>
                        <td>
                            {{ $caseInfo->case_type->type_desc ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseInfo.fields.dept') }}
                        </th>
                        <td>
                            {{ $caseInfo->dept->dept_desc_a ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseInfo.fields.report_type') }}
                        </th>
                        <td>
                            {{ $caseInfo->report_type->rep_type_desc_a ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseInfo.fields.report_num') }}
                        </th>
                        <td>
                            {{ $caseInfo->report_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseInfo.fields.status') }}
                        </th>
                        <td>
                            {{ $caseInfo->status->status_desc ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseInfo.fields.staff') }}
                        </th>
                        <td>
                            {{ $caseInfo->staff->staff_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseInfo.fields.case_desc') }}
                        </th>
                        <td>
                            {{ $caseInfo->case_desc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseInfo.fields.close_date') }}
                        </th>
                        <td>
                            {{ $caseInfo->close_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.case-infos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection