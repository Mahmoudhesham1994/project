@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.docBorrower.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.doc-borrowers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="borrower_name">{{ trans('cruds.docBorrower.fields.borrower_name') }}</label>
                <input class="form-control {{ $errors->has('borrower_name') ? 'is-invalid' : '' }}" type="text" name="borrower_name" id="borrower_name" value="{{ old('borrower_name', '') }}" required>
                @if($errors->has('borrower_name'))
                    <span class="text-danger">{{ $errors->first('borrower_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.docBorrower.fields.borrower_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="borrower_address">{{ trans('cruds.docBorrower.fields.borrower_address') }}</label>
                <input class="form-control {{ $errors->has('borrower_address') ? 'is-invalid' : '' }}" type="text" name="borrower_address" id="borrower_address" value="{{ old('borrower_address', '') }}">
                @if($errors->has('borrower_address'))
                    <span class="text-danger">{{ $errors->first('borrower_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.docBorrower.fields.borrower_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="borrower_desc">{{ trans('cruds.docBorrower.fields.borrower_desc') }}</label>
                <input class="form-control {{ $errors->has('borrower_desc') ? 'is-invalid' : '' }}" type="text" name="borrower_desc" id="borrower_desc" value="{{ old('borrower_desc', '') }}">
                @if($errors->has('borrower_desc'))
                    <span class="text-danger">{{ $errors->first('borrower_desc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.docBorrower.fields.borrower_desc_helper') }}</span>
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