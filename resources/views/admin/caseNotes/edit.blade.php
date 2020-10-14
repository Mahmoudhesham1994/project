@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.caseNote.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.case-notes.update", [$caseNote->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="case_id">{{ trans('cruds.caseNote.fields.case') }}</label>
                <select class="form-control select2 {{ $errors->has('case') ? 'is-invalid' : '' }}" name="case_id" id="case_id" required>
                    @foreach($cases as $id => $case)
                        <option value="{{ $id }}" {{ (old('case_id') ? old('case_id') : $caseNote->case->id ?? '') == $id ? 'selected' : '' }}>{{ $case }}</option>
                    @endforeach
                </select>
                @if($errors->has('case'))
                    <span class="text-danger">{{ $errors->first('case') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseNote.fields.case_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="note_desc">{{ trans('cruds.caseNote.fields.note_desc') }}</label>
                <textarea class="form-control {{ $errors->has('note_desc') ? 'is-invalid' : '' }}" name="note_desc" id="note_desc" required>{{ old('note_desc', $caseNote->note_desc) }}</textarea>
                @if($errors->has('note_desc'))
                    <span class="text-danger">{{ $errors->first('note_desc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseNote.fields.note_desc_helper') }}</span>
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