@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.actionType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.action-types.update", [$actionType->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="action_type_desc">{{ trans('cruds.actionType.fields.action_type_desc') }}</label>
                <input class="form-control {{ $errors->has('action_type_desc') ? 'is-invalid' : '' }}" type="text" name="action_type_desc" id="action_type_desc" value="{{ old('action_type_desc', $actionType->action_type_desc) }}" required>
                @if($errors->has('action_type_desc'))
                    <span class="text-danger">{{ $errors->first('action_type_desc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.actionType.fields.action_type_desc_helper') }}</span>
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