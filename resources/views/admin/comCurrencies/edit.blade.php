@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.comCurrency.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.com-currencies.update", [$comCurrency->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="crncy_desc_a">{{ trans('cruds.comCurrency.fields.crncy_desc_a') }}</label>
                <input class="form-control {{ $errors->has('crncy_desc_a') ? 'is-invalid' : '' }}" type="text" name="crncy_desc_a" id="crncy_desc_a" value="{{ old('crncy_desc_a', $comCurrency->crncy_desc_a) }}" required>
                @if($errors->has('crncy_desc_a'))
                    <span class="text-danger">{{ $errors->first('crncy_desc_a') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.comCurrency.fields.crncy_desc_a_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="crncy_desc_l">{{ trans('cruds.comCurrency.fields.crncy_desc_l') }}</label>
                <input class="form-control {{ $errors->has('crncy_desc_l') ? 'is-invalid' : '' }}" type="text" name="crncy_desc_l" id="crncy_desc_l" value="{{ old('crncy_desc_l', $comCurrency->crncy_desc_l) }}">
                @if($errors->has('crncy_desc_l'))
                    <span class="text-danger">{{ $errors->first('crncy_desc_l') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.comCurrency.fields.crncy_desc_l_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="crncy_symbol">{{ trans('cruds.comCurrency.fields.crncy_symbol') }}</label>
                <input class="form-control {{ $errors->has('crncy_symbol') ? 'is-invalid' : '' }}" type="text" name="crncy_symbol" id="crncy_symbol" value="{{ old('crncy_symbol', $comCurrency->crncy_symbol) }}">
                @if($errors->has('crncy_symbol'))
                    <span class="text-danger">{{ $errors->first('crncy_symbol') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.comCurrency.fields.crncy_symbol_helper') }}</span>
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