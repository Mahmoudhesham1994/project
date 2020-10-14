@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.staff.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.staff.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="staff_no">{{ trans('cruds.staff.fields.staff_no') }}</label>
                <input class="form-control {{ $errors->has('staff_no') ? 'is-invalid' : '' }}" type="text" name="staff_no" id="staff_no" value="{{ old('staff_no', '') }}" required>
                @if($errors->has('staff_no'))
                    <span class="text-danger">{{ $errors->first('staff_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.staff_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="staff_name">{{ trans('cruds.staff.fields.staff_name') }}</label>
                <input class="form-control {{ $errors->has('staff_name') ? 'is-invalid' : '' }}" type="text" name="staff_name" id="staff_name" value="{{ old('staff_name', '') }}" required>
                @if($errors->has('staff_name'))
                    <span class="text-danger">{{ $errors->first('staff_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.staff_name_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_active" value="0">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', 0) == 1 || old('is_active') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">{{ trans('cruds.staff.fields.is_active') }}</label>
                </div>
                @if($errors->has('is_active'))
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.is_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.staff.fields.notes') }}</label>
                <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text" name="notes" id="notes" value="{{ old('notes', '') }}">
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.staff.fields.notes_helper') }}</span>
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