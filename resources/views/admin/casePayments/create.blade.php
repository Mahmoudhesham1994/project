@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.casePayment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.case-payments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                 <input name="case_id" id="case_id" type="hidden" value="{{$id}}" >
                {{--<label class="required" for="case_id">{{ trans('cruds.casePayment.fields.case') }}</label>
                <select class="form-control select2 {{ $errors->has('case') ? 'is-invalid' : '' }}" name="case_id" id="case_id" required>
                    @foreach($cases as $id => $case)
                        <option value="{{ $id }}" {{ old('case_id') == $id ? 'selected' : '' }}>{{ $case }}</option>
                    @endforeach
                </select>--}}
                @if($errors->has('case'))
                    <span class="text-danger">{{ $errors->first('case') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.casePayment.fields.case_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_date">{{ trans('cruds.casePayment.fields.payment_date') }}</label>
                <input class="form-control date {{ $errors->has('payment_date') ? 'is-invalid' : '' }}" type="text" name="payment_date" id="payment_date" value="{{ old('payment_date') }}" required>
                @if($errors->has('payment_date'))
                    <span class="text-danger">{{ $errors->first('payment_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.casePayment.fields.payment_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_amt">{{ trans('cruds.casePayment.fields.payment_amt') }}</label>
                <input class="form-control {{ $errors->has('payment_amt') ? 'is-invalid' : '' }}" type="number" name="payment_amt" id="payment_amt" value="{{ old('payment_amt', '') }}" step="0.01" required>
                @if($errors->has('payment_amt'))
                    <span class="text-danger">{{ $errors->first('payment_amt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.casePayment.fields.payment_amt_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="crncy_id">{{ trans('cruds.casePayment.fields.crncy') }}</label>
                <select class="form-control select2 {{ $errors->has('crncy') ? 'is-invalid' : '' }}" name="crncy_id" id="crncy_id" required>
                    @foreach($crncies as $id => $crncy)
                        <option value="{{ $id }}" {{ old('crncy_id') == $id ? 'selected' : '' }}>{{ $crncy }}</option>
                    @endforeach
                </select>
                @if($errors->has('crncy'))
                    <span class="text-danger">{{ $errors->first('crncy') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.casePayment.fields.crncy_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_ref_code">{{ trans('cruds.casePayment.fields.payment_ref_code') }}</label>
                <input class="form-control {{ $errors->has('payment_ref_code') ? 'is-invalid' : '' }}" type="text" name="payment_ref_code" id="payment_ref_code" value="{{ old('payment_ref_code', '') }}">
                @if($errors->has('payment_ref_code'))
                    <span class="text-danger">{{ $errors->first('payment_ref_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.casePayment.fields.payment_ref_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_notes">{{ trans('cruds.casePayment.fields.payment_notes') }}</label>
                <input class="form-control {{ $errors->has('payment_notes') ? 'is-invalid' : '' }}" type="text" name="payment_notes" id="payment_notes" value="{{ old('payment_notes', '') }}">
                @if($errors->has('payment_notes'))
                    <span class="text-danger">{{ $errors->first('payment_notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.casePayment.fields.payment_notes_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection