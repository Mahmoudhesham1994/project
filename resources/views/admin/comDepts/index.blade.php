@extends('layouts.admin')
@section('content')
@can('com_dept_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.com-depts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.comDept.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.comDept.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ComDept">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.comDept.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.comDept.fields.dept_desc_a') }}
                        </th>
                        <th>
                            {{ trans('cruds.comDept.fields.dept_desc_l') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comDepts as $key => $comDept)
                        <tr data-entry-id="{{ $comDept->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $comDept->id ?? '' }}
                            </td>
                            <td>
                                {{ $comDept->dept_desc_a ?? '' }}
                            </td>
                            <td>
                                {{ $comDept->dept_desc_l ?? '' }}
                            </td>
                            <td>
                                @can('com_dept_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.com-depts.show', $comDept->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('com_dept_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.com-depts.edit', $comDept->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('com_dept_delete')
                                    <form action="{{ route('admin.com-depts.destroy', $comDept->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('com_dept_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.com-depts.massDestroy') }}",
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
  let table = $('.datatable-ComDept:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection