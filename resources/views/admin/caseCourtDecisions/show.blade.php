@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.caseCourtDecision.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="/admin/case-court-decisions-index/{{$caseCourtDecision->case_id}}">
<!--                <a class="btn btn-default" href="{{ route('admin.case-court-decisions.index') }}">-->
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.caseCourtDecision.fields.id') }}
                        </th>
                        <td>
                            {{ $caseCourtDecision->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseCourtDecision.fields.case') }}
                        </th>
                        <td>
                            {{ $caseCourtDecision->case->case_ref_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseCourtDecision.fields.court_name') }}
                        </th>
                        <td>
                            {{ $caseCourtDecision->court_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseCourtDecision.fields.court_reff_code') }}
                        </th>
                        <td>
                            {{ $caseCourtDecision->court_reff_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseCourtDecision.fields.court_date') }}
                        </th>
                        <td>
                            {{ $caseCourtDecision->court_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseCourtDecision.fields.court_decisions') }}
                        </th>
                        <td>
                            {{ $caseCourtDecision->court_decisions }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseCourtDecision.fields.court_notes') }}
                        </th>
                        <td>
                            {{ $caseCourtDecision->court_notes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                 <a class="btn btn-default" href="/admin/case-court-decisions-index/{{$caseCourtDecision->case_id}}">
<!--                <a class="btn btn-default" href="{{ route('admin.case-court-decisions.index') }}">-->
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection