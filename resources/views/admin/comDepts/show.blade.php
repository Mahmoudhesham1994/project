@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.comDept.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.com-depts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.comDept.fields.id') }}
                        </th>
                        <td>
                            {{ $comDept->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comDept.fields.dept_desc_a') }}
                        </th>
                        <td>
                            {{ $comDept->dept_desc_a }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comDept.fields.dept_desc_l') }}
                        </th>
                        <td>
                            {{ $comDept->dept_desc_l }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.com-depts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection