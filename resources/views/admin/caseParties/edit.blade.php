@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.caseParty.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.case-parties.update", [$caseParty->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="case_id">{{ trans('cruds.caseParty.fields.case') }}</label>
                <select class="form-control select2 {{ $errors->has('case') ? 'is-invalid' : '' }}" name="case_id" id="case_id" required>
                    @foreach($cases as $id => $case)
                        <option value="{{ $id }}" {{ (old('case_id') ? old('case_id') : $caseParty->case->id ?? '') == $id ? 'selected' : '' }}>{{ $case }}</option>
                    @endforeach
                </select>
                @if($errors->has('case'))
                    <span class="text-danger">{{ $errors->first('case') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseParty.fields.case_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="party_type_id">{{ trans('cruds.caseParty.fields.party_type') }}</label>
                <select class="form-control select2 {{ $errors->has('party_type') ? 'is-invalid' : '' }}" name="party_type_id" id="party_type_id" required>
                    @foreach($party_types as $id => $party_type)
                        <option value="{{ $id }}" {{ (old('party_type_id') ? old('party_type_id') : $caseParty->party_type->id ?? '') == $id ? 'selected' : '' }}>{{ $party_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('party_type'))
                    <span class="text-danger">{{ $errors->first('party_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseParty.fields.party_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="party_id_num">{{ trans('cruds.caseParty.fields.party_id_num') }}</label>
                <input class="form-control {{ $errors->has('party_id_num') ? 'is-invalid' : '' }}" type="text" name="party_id_num" id="party_id_num" value="{{ old('party_id_num', $caseParty->party_id_num) }}">
                @if($errors->has('party_id_num'))
                    <span class="text-danger">{{ $errors->first('party_id_num') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseParty.fields.party_id_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="party_name">{{ trans('cruds.caseParty.fields.party_name') }}</label>
                <input class="form-control {{ $errors->has('party_name') ? 'is-invalid' : '' }}" type="text" name="party_name" id="party_name" value="{{ old('party_name', $caseParty->party_name) }}" required>
                @if($errors->has('party_name'))
                    <span class="text-danger">{{ $errors->first('party_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseParty.fields.party_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="party_address">{{ trans('cruds.caseParty.fields.party_address') }}</label>
                <input class="form-control {{ $errors->has('party_address') ? 'is-invalid' : '' }}" type="text" name="party_address" id="party_address" value="{{ old('party_address', $caseParty->party_address) }}">
                @if($errors->has('party_address'))
                    <span class="text-danger">{{ $errors->first('party_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseParty.fields.party_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="party_phone">{{ trans('cruds.caseParty.fields.party_phone') }}</label>
                <input class="form-control {{ $errors->has('party_phone') ? 'is-invalid' : '' }}" type="text" name="party_phone" id="party_phone" value="{{ old('party_phone', $caseParty->party_phone) }}">
                @if($errors->has('party_phone'))
                    <span class="text-danger">{{ $errors->first('party_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseParty.fields.party_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="party_mobile">{{ trans('cruds.caseParty.fields.party_mobile') }}</label>
                <input class="form-control {{ $errors->has('party_mobile') ? 'is-invalid' : '' }}" type="text" name="party_mobile" id="party_mobile" value="{{ old('party_mobile', $caseParty->party_mobile) }}">
                @if($errors->has('party_mobile'))
                    <span class="text-danger">{{ $errors->first('party_mobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseParty.fields.party_mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="party_email">{{ trans('cruds.caseParty.fields.party_email') }}</label>
                <input class="form-control {{ $errors->has('party_email') ? 'is-invalid' : '' }}" type="email" name="party_email" id="party_email" value="{{ old('party_email', $caseParty->party_email) }}">
                @if($errors->has('party_email'))
                    <span class="text-danger">{{ $errors->first('party_email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseParty.fields.party_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="party_notes">{{ trans('cruds.caseParty.fields.party_notes') }}</label>
                <input class="form-control {{ $errors->has('party_notes') ? 'is-invalid' : '' }}" type="text" name="party_notes" id="party_notes" value="{{ old('party_notes', $caseParty->party_notes) }}">
                @if($errors->has('party_notes'))
                    <span class="text-danger">{{ $errors->first('party_notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseParty.fields.party_notes_helper') }}</span>
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