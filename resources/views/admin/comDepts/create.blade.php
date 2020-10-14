@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.comDept.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.com-depts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="dept_desc_a">{{ trans('cruds.comDept.fields.dept_desc_a') }}</label>
                <input class="form-control {{ $errors->has('dept_desc_a') ? 'is-invalid' : '' }}" type="text" name="dept_desc_a" id="dept_desc_a" value="{{ old('dept_desc_a', '') }}" required>
                @if($errors->has('dept_desc_a'))
                    <span class="text-danger">{{ $errors->first('dept_desc_a') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.comDept.fields.dept_desc_a_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dept_desc_l">{{ trans('cruds.comDept.fields.dept_desc_l') }}</label>
                <input class="form-control {{ $errors->has('dept_desc_l') ? 'is-invalid' : '' }}" type="text" name="dept_desc_l" id="dept_desc_l" value="{{ old('dept_desc_l', '') }}">
                @if($errors->has('dept_desc_l'))
                    <span class="text-danger">{{ $errors->first('dept_desc_l') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.comDept.fields.dept_desc_l_helper') }}</span>
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