@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.partyType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.party-types.update", [$partyType->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="party_type_desc_a">{{ trans('cruds.partyType.fields.party_type_desc_a') }}</label>
                <input class="form-control {{ $errors->has('party_type_desc_a') ? 'is-invalid' : '' }}" type="text" name="party_type_desc_a" id="party_type_desc_a" value="{{ old('party_type_desc_a', $partyType->party_type_desc_a) }}" required>
                @if($errors->has('party_type_desc_a'))
                    <span class="text-danger">{{ $errors->first('party_type_desc_a') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.partyType.fields.party_type_desc_a_helper') }}</span>
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