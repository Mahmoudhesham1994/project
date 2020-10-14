@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.caseCourtDecision.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.case-court-decisions.update", [$caseCourtDecision->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="case_id">{{ trans('cruds.caseCourtDecision.fields.case') }}</label>
                <select class="form-control select2 {{ $errors->has('case') ? 'is-invalid' : '' }}" name="case_id" id="case_id" required>
                    @foreach($cases as $id => $case)
                        <option value="{{ $id }}" {{ (old('case_id') ? old('case_id') : $caseCourtDecision->case->id ?? '') == $id ? 'selected' : '' }}>{{ $case }}</option>
                    @endforeach
                </select>
                @if($errors->has('case'))
                    <span class="text-danger">{{ $errors->first('case') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseCourtDecision.fields.case_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="court_name">{{ trans('cruds.caseCourtDecision.fields.court_name') }}</label>
                <input class="form-control {{ $errors->has('court_name') ? 'is-invalid' : '' }}" type="text" name="court_name" id="court_name" value="{{ old('court_name', $caseCourtDecision->court_name) }}">
                @if($errors->has('court_name'))
                    <span class="text-danger">{{ $errors->first('court_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseCourtDecision.fields.court_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="court_reff_code">{{ trans('cruds.caseCourtDecision.fields.court_reff_code') }}</label>
                <input class="form-control {{ $errors->has('court_reff_code') ? 'is-invalid' : '' }}" type="text" name="court_reff_code" id="court_reff_code" value="{{ old('court_reff_code', $caseCourtDecision->court_reff_code) }}">
                @if($errors->has('court_reff_code'))
                    <span class="text-danger">{{ $errors->first('court_reff_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseCourtDecision.fields.court_reff_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="court_date">{{ trans('cruds.caseCourtDecision.fields.court_date') }}</label>
                <input class="form-control date {{ $errors->has('court_date') ? 'is-invalid' : '' }}" type="text" name="court_date" id="court_date" value="{{ old('court_date', $caseCourtDecision->court_date) }}">
                @if($errors->has('court_date'))
                    <span class="text-danger">{{ $errors->first('court_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseCourtDecision.fields.court_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="court_decisions">{{ trans('cruds.caseCourtDecision.fields.court_decisions') }}</label>
                <textarea class="form-control {{ $errors->has('court_decisions') ? 'is-invalid' : '' }}" name="court_decisions" id="court_decisions">{{ old('court_decisions', $caseCourtDecision->court_decisions) }}</textarea>
                @if($errors->has('court_decisions'))
                    <span class="text-danger">{{ $errors->first('court_decisions') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseCourtDecision.fields.court_decisions_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="court_notes">{{ trans('cruds.caseCourtDecision.fields.court_notes') }}</label>
                <input class="form-control {{ $errors->has('court_notes') ? 'is-invalid' : '' }}" type="text" name="court_notes" id="court_notes" value="{{ old('court_notes', $caseCourtDecision->court_notes) }}">
                @if($errors->has('court_notes'))
                    <span class="text-danger">{{ $errors->first('court_notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseCourtDecision.fields.court_notes_helper') }}</span>
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