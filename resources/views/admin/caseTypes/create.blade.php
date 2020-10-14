@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.caseType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.case-types.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="type_desc">{{ trans('cruds.caseType.fields.type_desc') }}</label>
                <input class="form-control {{ $errors->has('type_desc') ? 'is-invalid' : '' }}" type="text" name="type_desc" id="type_desc" value="{{ old('type_desc', '') }}" required>
                @if($errors->has('type_desc'))
                    <span class="text-danger">{{ $errors->first('type_desc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseType.fields.type_desc_helper') }}</span>
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