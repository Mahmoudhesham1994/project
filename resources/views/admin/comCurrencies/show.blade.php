@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.comCurrency.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.com-currencies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.comCurrency.fields.id') }}
                        </th>
                        <td>
                            {{ $comCurrency->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comCurrency.fields.crncy_desc_a') }}
                        </th>
                        <td>
                            {{ $comCurrency->crncy_desc_a }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comCurrency.fields.crncy_desc_l') }}
                        </th>
                        <td>
                            {{ $comCurrency->crncy_desc_l }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.comCurrency.fields.crncy_symbol') }}
                        </th>
                        <td>
                            {{ $comCurrency->crncy_symbol }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.com-currencies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection