@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reportType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.report-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reportType.fields.id') }}
                        </th>
                        <td>
                            {{ $reportType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportType.fields.rep_type_desc_a') }}
                        </th>
                        <td>
                            {{ $reportType->rep_type_desc_a }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportType.fields.rep_type_desc_l') }}
                        </th>
                        <td>
                            {{ $reportType->rep_type_desc_l }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.report-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection