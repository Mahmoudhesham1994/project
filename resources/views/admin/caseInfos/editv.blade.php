{{-- @extends('layouts.admin')
@section('content') --}}

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.caseInfo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.case-infos.update", [$caseInfo->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="case_ref_code">{{ trans('cruds.caseInfo.fields.case_ref_code') }}</label>
                <input class="form-control {{ $errors->has('case_ref_code') ? 'is-invalid' : '' }}" type="text" name="case_ref_code" id="case_ref_code" value="{{ old('case_ref_code', $caseInfo->case_ref_code) }}" required>
                @if($errors->has('case_ref_code'))
                    <span class="text-danger">{{ $errors->first('case_ref_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.case_ref_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="case_name">{{ trans('cruds.caseInfo.fields.case_name') }}</label>
                <input class="form-control {{ $errors->has('case_name') ? 'is-invalid' : '' }}" type="text" name="case_name" id="case_name" value="{{ old('case_name', $caseInfo->case_name) }}" required>
                @if($errors->has('case_name'))
                    <span class="text-danger">{{ $errors->first('case_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.case_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="case_date">{{ trans('cruds.caseInfo.fields.case_date') }}</label>
                <input class="form-control date {{ $errors->has('case_date') ? 'is-invalid' : '' }}" type="text" name="case_date" id="case_date" value="{{ old('case_date', $caseInfo->case_date) }}" required>
                @if($errors->has('case_date'))
                    <span class="text-danger">{{ $errors->first('case_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.case_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="case_type_id">{{ trans('cruds.caseInfo.fields.case_type') }}</label>
                <select class="form-control select2 {{ $errors->has('case_type') ? 'is-invalid' : '' }}" name="case_type_id" id="case_type_id" required>
                    @foreach($case_types as $id => $case_type)
                        <option value="{{ $id }}" {{ (old('case_type_id') ? old('case_type_id') : $caseInfo->case_type->id ?? '') == $id ? 'selected' : '' }}>{{ $case_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('case_type'))
                    <span class="text-danger">{{ $errors->first('case_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.case_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dept_id">{{ trans('cruds.caseInfo.fields.dept') }}</label>
                <select class="form-control select2 {{ $errors->has('dept') ? 'is-invalid' : '' }}" name="dept_id" id="dept_id">
                    @foreach($depts as $id => $dept)
                        <option value="{{ $id }}" {{ (old('dept_id') ? old('dept_id') : $caseInfo->dept->id ?? '') == $id ? 'selected' : '' }}>{{ $dept }}</option>
                    @endforeach
                </select>
                @if($errors->has('dept'))
                    <span class="text-danger">{{ $errors->first('dept') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.dept_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="report_type_id">{{ trans('cruds.caseInfo.fields.report_type') }}</label>
                <select class="form-control select2 {{ $errors->has('report_type') ? 'is-invalid' : '' }}" name="report_type_id" id="report_type_id">
                    @foreach($report_types as $id => $report_type)
                        <option value="{{ $id }}" {{ (old('report_type_id') ? old('report_type_id') : $caseInfo->report_type->id ?? '') == $id ? 'selected' : '' }}>{{ $report_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('report_type'))
                    <span class="text-danger">{{ $errors->first('report_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.report_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="report_num">{{ trans('cruds.caseInfo.fields.report_num') }}</label>
                <input class="form-control {{ $errors->has('report_num') ? 'is-invalid' : '' }}" type="text" name="report_num" id="report_num" value="{{ old('report_num', $caseInfo->report_num) }}">
                @if($errors->has('report_num'))
                    <span class="text-danger">{{ $errors->first('report_num') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.report_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status_id">{{ trans('cruds.caseInfo.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id">
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $caseInfo->status->id ?? '') == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="staff_id">{{ trans('cruds.caseInfo.fields.staff') }}</label>
                <select class="form-control select2 {{ $errors->has('staff') ? 'is-invalid' : '' }}" name="staff_id" id="staff_id">
                    @foreach($staff as $id => $staff)
                        <option value="{{ $id }}" {{ (old('staff_id') ? old('staff_id') : $caseInfo->staff->id ?? '') == $id ? 'selected' : '' }}>{{ $staff }}</option>
                    @endforeach
                </select>
                @if($errors->has('staff'))
                    <span class="text-danger">{{ $errors->first('staff') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.staff_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="case_desc">{{ trans('cruds.caseInfo.fields.case_desc') }}</label>
                <textarea class="form-control {{ $errors->has('case_desc') ? 'is-invalid' : '' }}" name="case_desc" id="case_desc">{{ old('case_desc', $caseInfo->case_desc) }}</textarea>
                @if($errors->has('case_desc'))
                    <span class="text-danger">{{ $errors->first('case_desc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.case_desc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="close_date">{{ trans('cruds.caseInfo.fields.close_date') }}</label>
                <input class="form-control date {{ $errors->has('close_date') ? 'is-invalid' : '' }}" type="text" name="close_date" id="close_date" value="{{ old('close_date', $caseInfo->close_date) }}">
                @if($errors->has('close_date'))
                    <span class="text-danger">{{ $errors->first('close_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.close_date_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>


{{-- 
@endsection --}}