@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.outDocument.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.out-documents.update", [$outDocument->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="case_id">{{ trans('cruds.outDocument.fields.case') }}</label>
                <select class="form-control select2 {{ $errors->has('case') ? 'is-invalid' : '' }}" name="case_id" id="case_id" required>
                    @foreach($cases as $id => $case)
                        <option value="{{ $id }}" {{ (old('case_id') ? old('case_id') : $outDocument->case->id ?? '') == $id ? 'selected' : '' }}>{{ $case }}</option>
                    @endforeach
                </select>
                @if($errors->has('case'))
                    <span class="text-danger">{{ $errors->first('case') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.outDocument.fields.case_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="doc_id">{{ trans('cruds.outDocument.fields.doc') }}</label>
                <select class="form-control select2 {{ $errors->has('doc') ? 'is-invalid' : '' }}" name="doc_id" id="doc_id">
                    @foreach($docs as $id => $doc)
                        <option value="{{ $id }}" {{ (old('doc_id') ? old('doc_id') : $outDocument->doc->id ?? '') == $id ? 'selected' : '' }}>{{ $doc }}</option>
                    @endforeach
                </select>
                @if($errors->has('doc'))
                    <span class="text-danger">{{ $errors->first('doc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.outDocument.fields.doc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="out_date">{{ trans('cruds.outDocument.fields.out_date') }}</label>
                <input class="form-control date {{ $errors->has('out_date') ? 'is-invalid' : '' }}" type="text" name="out_date" id="out_date" value="{{ old('out_date', $outDocument->out_date) }}">
                @if($errors->has('out_date'))
                    <span class="text-danger">{{ $errors->first('out_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.outDocument.fields.out_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="return_date">{{ trans('cruds.outDocument.fields.return_date') }}</label>
                <input class="form-control date {{ $errors->has('return_date') ? 'is-invalid' : '' }}" type="text" name="return_date" id="return_date" value="{{ old('return_date', $outDocument->return_date) }}">
                @if($errors->has('return_date'))
                    <span class="text-danger">{{ $errors->first('return_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.outDocument.fields.return_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="borrower_id">{{ trans('cruds.outDocument.fields.borrower') }}</label>
                <select class="form-control select2 {{ $errors->has('borrower') ? 'is-invalid' : '' }}" name="borrower_id" id="borrower_id">
                    @foreach($borrowers as $id => $borrower)
                        <option value="{{ $id }}" {{ (old('borrower_id') ? old('borrower_id') : $outDocument->borrower->id ?? '') == $id ? 'selected' : '' }}>{{ $borrower }}</option>
                    @endforeach
                </select>
                @if($errors->has('borrower'))
                    <span class="text-danger">{{ $errors->first('borrower') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.outDocument.fields.borrower_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="receiver_name">{{ trans('cruds.outDocument.fields.receiver_name') }}</label>
                <input class="form-control {{ $errors->has('receiver_name') ? 'is-invalid' : '' }}" type="text" name="receiver_name" id="receiver_name" value="{{ old('receiver_name', $outDocument->receiver_name) }}">
                @if($errors->has('receiver_name'))
                    <span class="text-danger">{{ $errors->first('receiver_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.outDocument.fields.receiver_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="out_notes">{{ trans('cruds.outDocument.fields.out_notes') }}</label>
                <input class="form-control {{ $errors->has('out_notes') ? 'is-invalid' : '' }}" type="text" name="out_notes" id="out_notes" value="{{ old('out_notes', $outDocument->out_notes) }}">
                @if($errors->has('out_notes'))
                    <span class="text-danger">{{ $errors->first('out_notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.outDocument.fields.out_notes_helper') }}</span>
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