@extends('layouts.admin')
@section('content')
@can('case_info_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.case-infos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.caseInfo.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.caseInfo.title_singular') }} {{ trans('global.list') }}
    </div>


        <form method="POST" action="/admin/cases/case-infos">
        @csrf
     <div class="container-fluid ">
        <div class="row">
            <div class="col-4">
            <div class="form-group">
                <label   for="date_to">{{ trans('cruds.caseInfo.fields.case_date') }}</label>
<!--                <input dir="ltr" class="form-control date {{ $errors->has('case_date') ? 'is-invalid' : '' }}" type="date" name="date_from" id="date_from"  value=" "  >-->
                <input dir="ltr" class="form-control   {{ $errors->has('case_date') ? 'is-invalid' : '' }}" type="date" name="date_from" id="date_from"  value=" "  >
                @if($errors->has('date_to'))
                    <span class="text-danger">{{ $errors->first('arc_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.case_date_helper') }}</span>
            </div>
                
            </div>

            <div class="col-4">
       
                <div class="form-group">
                <label   for="date_to">{{ trans('cruds.caseInfo.fields.case_date') }}</label>
<!--                <input    class="form-control date {{ $errors->has('case_date') ? 'is-invalid' : '' }}" type="date" name="date_to" id="date_to"  value=" "  >-->
                <input    class="form-control   {{ $errors->has('case_date') ? 'is-invalid' : '' }}" type="date" name="date_to" id="date_to"  value=" "  >
                @if($errors->has('date_to'))
                    <span class="text-danger">{{ $errors->first('arc_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.case_date_helper') }}</span>
            </div>
          

            </div>
            <div class="col-4"> 
              <div class="form-group">
                <label   for="case_ref_code">{{ trans('cruds.caseInfo.fields.case_ref_code') }}</label>
                <input class="form-control {{ $errors->has('case_ref_code') ? 'is-invalid' : '' }}" type="text" name="case_ref_code" id="case_ref_code" value="{{ old('case_ref_code', '') }}"  >
                @if($errors->has('case_ref_code'))
                    <span class="text-danger">{{ $errors->first('case_ref_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.case_ref_code_helper') }}</span>
            </div>
          
</div>
        </div>
         
         
         
               <div class="row">
            <div class="col-4">
           <div class="form-group">
                <label for="dept_id">{{ trans('cruds.caseInfo.fields.dept') }}</label>
                <select class="form-control select2 {{ $errors->has('dept') ? 'is-invalid' : '' }}" name="dept_id" id="dept_id">
                    @foreach($depts as $id => $dept)
                        <option value="{{ $id }}" {{ old('dept_id') == $id ? 'selected' : '' }}>{{ $dept }}</option>
                    @endforeach
                </select>
                @if($errors->has('dept'))
                    <span class="text-danger">{{ $errors->first('dept') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.dept_helper') }}</span>
            </div>
                
            </div>

            <div class="col-4">
       
              <div class="form-group">
                <label for="status_id">{{ trans('cruds.caseInfo.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id">
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.status_helper') }}</span>
            </div>
          

            </div>
            <div class="col-4"> 
                <div class="form-group">
                <label for="staff_id">{{ trans('cruds.caseInfo.fields.staff') }}</label>
                <select class="form-control select2 {{ $errors->has('staff') ? 'is-invalid' : '' }}" name="staff_id" id="staff_id">
                    @foreach($staff as $id => $staff)
                        <option value="{{ $id }}" {{ old('staff_id') == $id ? 'selected' : '' }}>{{ $staff }}</option>
                    @endforeach
                </select>
                @if($errors->has('staff'))
                    <span class="text-danger">{{ $errors->first('staff') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.staff_helper') }}</span>
            </div>
          
</div>
        </div> 
         
         
         
         
         
    
        <div class="row">
            <div class="col-4"> 
                <div class="form-group">
                <label   for="case_type_id">{{ trans('cruds.caseInfo.fields.case_type') }}</label>
                <select class="form-control select2 {{ $errors->has('case_type') ? 'is-invalid' : '' }}" name="case_type_id" id="case_type_id"  >
                    @foreach($case_types as $id => $case_type)
                        <option value="{{ $id }}" {{ old('case_type_id') == $id ? 'selected' : '' }}>{{ $case_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('case_type'))
                    <span class="text-danger">{{ $errors->first('case_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.case_type_helper') }}</span>
            </div>
            </div>
  
            <div class="col-4"> 
             <div class="form-group">
                <label   for="case_name">{{ trans('cruds.caseInfo.fields.case_name') }}</label>
                <input class="form-control {{ $errors->has('case_name') ? 'is-invalid' : '' }}" type="text" name="case_name" id="case_name" value="{{ old('case_name', '') }}"  >
                @if($errors->has('case_name'))
                    <span class="text-danger">{{ $errors->first('case_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseInfo.fields.case_name_helper') }}</span>
            </div>

            </div>

            
         
       
             
           
            <div class="col-4"> 
                <div class="form-group">
               <label   for="date_from"> </label>
                    <br>   

                    <button class="btn-lg btn-primary" type="submit">
                        {{ trans('global.search') }}
                    </button>
                </div>
            </div>
              </div>
          </div>
   
        </form>
    
    
    
    
    
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CaseInfo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.caseInfo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseInfo.fields.case_ref_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseInfo.fields.case_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseInfo.fields.case_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseInfo.fields.case_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseInfo.fields.dept') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseInfo.fields.report_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseInfo.fields.report_num') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseInfo.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseInfo.fields.staff') }}
                        </th>
                        <th>
                            {{ trans('cruds.staff.fields.staff_name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($caseInfos as $key => $caseInfo)
                        <tr data-entry-id="{{ $caseInfo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $caseInfo->id ?? '' }}
                            </td>
                            <td>
                                {{ $caseInfo->case_ref_code ?? '' }}
                            </td>
                            <td>
                                {{ $caseInfo->case_name ?? '' }}
                            </td>
                            <td>
                                {{ $caseInfo->case_date ?? '' }}
                            </td>
                            <td>
                                {{ $caseInfo->case_type->type_desc ?? '' }}
                            </td>
                            <td>
                                {{ $caseInfo->dept->dept_desc_a ?? '' }}
                            </td>
                            <td>
                                {{ $caseInfo->report_type->rep_type_desc_a ?? '' }}
                            </td>
                            <td>
                                {{ $caseInfo->report_num ?? '' }}
                            </td>
                            <td>
                                {{ $caseInfo->status->status_desc ?? '' }}
                            </td>
                            <td>
                                {{ $caseInfo->staff->staff_name ?? '' }}
                            </td>
                            <td>
                                {{ $caseInfo->staff->staff_name ?? '' }}
                            </td>
                            <td>
                                @can('case_info_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.case-infos.show', $caseInfo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('case_info_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.case-infos.edit', $caseInfo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('case_info_delete')
                                    <form action="{{ route('admin.case-infos.destroy', $caseInfo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('case_info_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.case-infos.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-CaseInfo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection