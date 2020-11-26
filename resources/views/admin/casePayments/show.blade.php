@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.casePayment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                 <a class="btn btn-default" href="/admin/case-payments-index/{{$casePayment->case_id}}">
<!--                <a class="btn btn-default" href="{{ route('admin.case-payments.index') }}">-->
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.casePayment.fields.id') }}
                        </th>
                        <td>
                            {{ $casePayment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.casePayment.fields.case') }}
                        </th>
                        <td>
                            {{ $casePayment->case->case_ref_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.casePayment.fields.payment_date') }}
                        </th>
                        <td>
                            {{ $casePayment->payment_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.casePayment.fields.payment_amt') }}
                        </th>
                        <td>
                            {{ $casePayment->payment_amt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.casePayment.fields.crncy') }}
                        </th>
                        <td>
                            {{ $casePayment->crncy->crncy_desc_a ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.casePayment.fields.payment_ref_code') }}
                        </th>
                        <td>
                            {{ $casePayment->payment_ref_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.casePayment.fields.payment_notes') }}
                        </th>
                        <td>
                            {{ $casePayment->payment_notes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                 <a class="btn btn-default" href="/admin/case-payments-index/{{$casePayment->case_id}}">
<!--                <a class="btn btn-default" href="{{ route('admin.case-payments.index') }}">-->
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection