@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.caseActionTaken.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.case-action-takens.update", [$caseActionTaken->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="case_id">{{ trans('cruds.caseActionTaken.fields.case') }}</label>
                <select class="form-control select2 {{ $errors->has('case') ? 'is-invalid' : '' }}" name="case_id" id="case_id" required>
                    @foreach($cases as $id => $case)
                        <option value="{{ $id }}" {{ (old('case_id') ? old('case_id') : $caseActionTaken->case->id ?? '') == $id ? 'selected' : '' }}>{{ $case }}</option>
                    @endforeach
                </select>
                @if($errors->has('case'))
                    <span class="text-danger">{{ $errors->first('case') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseActionTaken.fields.case_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="action_type_id">{{ trans('cruds.caseActionTaken.fields.action_type') }}</label>
                <select class="form-control select2 {{ $errors->has('action_type') ? 'is-invalid' : '' }}" name="action_type_id" id="action_type_id" required>
                    @foreach($action_types as $id => $action_type)
                        <option value="{{ $id }}" {{ (old('action_type_id') ? old('action_type_id') : $caseActionTaken->action_type->id ?? '') == $id ? 'selected' : '' }}>{{ $action_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('action_type'))
                    <span class="text-danger">{{ $errors->first('action_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseActionTaken.fields.action_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="action_desc">{{ trans('cruds.caseActionTaken.fields.action_desc') }}</label>
                <textarea class="form-control {{ $errors->has('action_desc') ? 'is-invalid' : '' }}" name="action_desc" id="action_desc">{{ old('action_desc', $caseActionTaken->action_desc) }}</textarea>
                @if($errors->has('action_desc'))
                    <span class="text-danger">{{ $errors->first('action_desc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseActionTaken.fields.action_desc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="action_date">{{ trans('cruds.caseActionTaken.fields.action_date') }}</label>
                <input class="form-control date {{ $errors->has('action_date') ? 'is-invalid' : '' }}" type="text" name="action_date" id="action_date" value="{{ old('action_date', $caseActionTaken->action_date) }}">
                @if($errors->has('action_date'))
                    <span class="text-danger">{{ $errors->first('action_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseActionTaken.fields.action_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="action_notes">{{ trans('cruds.caseActionTaken.fields.action_notes') }}</label>
                <input class="form-control {{ $errors->has('action_notes') ? 'is-invalid' : '' }}" type="text" name="action_notes" id="action_notes" value="{{ old('action_notes', $caseActionTaken->action_notes) }}">
                @if($errors->has('action_notes'))
                    <span class="text-danger">{{ $errors->first('action_notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseActionTaken.fields.action_notes_helper') }}</span>
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