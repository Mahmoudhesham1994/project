{{--@extends('layouts.admin')
@section('content')--}}
@can('case_action_taken_create')

 
 
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            
            {{--<a class="btn btn-success" href="{{ route('admin.case-action-takens.create') }}">--}}
            <a class="btn btn-success" href="/admin/case-action-takens-create/{{$caseInfo_id}}">
            {{ trans('global.add') }} {{ trans('cruds.caseActionTaken.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.caseActionTaken.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CaseActionTaken">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.caseActionTaken.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseActionTaken.fields.case') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseActionTaken.fields.action_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseActionTaken.fields.action_desc') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseActionTaken.fields.action_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseActionTaken.fields.action_notes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($caseActionTakens as $key => $caseActionTaken)
                        <tr data-entry-id="{{ $caseActionTaken->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $caseActionTaken->id ?? '' }}
                            </td>
                            <td>
                                {{ $caseActionTaken->case->case_ref_code ?? '' }}
                            </td>
                            <td>
                                {{ $caseActionTaken->action_type->action_type_desc ?? '' }}
                            </td>
                            <td>
                                {{ $caseActionTaken->action_desc ?? '' }}
                            </td>
                            <td>
                                {{ $caseActionTaken->action_date ?? '' }}
                            </td>
                            <td>
                                {{ $caseActionTaken->action_notes ?? '' }}
                            </td>
                            <td>
                                @can('case_action_taken_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.case-action-takens.show', $caseActionTaken->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('case_action_taken_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.case-action-takens.edit', $caseActionTaken->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('case_action_taken_delete')
                                    <form action="{{ route('admin.case-action-takens.destroy', $caseActionTaken->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



{{--@endsection--}}
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('case_action_taken_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.case-action-takens.massDestroy') }}",
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
  let table = $('.datatable-CaseActionTaken:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection