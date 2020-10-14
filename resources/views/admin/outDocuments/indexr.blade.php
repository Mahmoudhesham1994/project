{{--@extends('layouts.admin')
@section('content')--}}
@can('out_document_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.out-documents.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.outDocument.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.outDocument.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-OutDocument">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.outDocument.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.outDocument.fields.case') }}
                        </th>
                        <th>
                            {{ trans('cruds.outDocument.fields.doc') }}
                        </th>
                        <th>
                            {{ trans('cruds.outDocument.fields.out_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.outDocument.fields.return_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.outDocument.fields.borrower') }}
                        </th>
                        <th>
                            {{ trans('cruds.outDocument.fields.receiver_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.outDocument.fields.out_notes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outDocuments as $key => $outDocument)
                        <tr data-entry-id="{{ $outDocument->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $outDocument->id ?? '' }}
                            </td>
                            <td>
                                {{ $outDocument->case->case_ref_code ?? '' }}
                            </td>
                            <td>
                                {{ $outDocument->doc->doc_desc_a ?? '' }}
                            </td>
                            <td>
                                {{ $outDocument->out_date ?? '' }}
                            </td>
                            <td>
                                {{ $outDocument->return_date ?? '' }}
                            </td>
                            <td>
                                {{ $outDocument->borrower->borrower_name ?? '' }}
                            </td>
                            <td>
                                {{ $outDocument->receiver_name ?? '' }}
                            </td>
                            <td>
                                {{ $outDocument->out_notes ?? '' }}
                            </td>
                            <td>
                                @can('out_document_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.out-documents.show', $outDocument->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('out_document_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.out-documents.edit', $outDocument->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('out_document_delete')
                                    <form action="{{ route('admin.out-documents.destroy', $outDocument->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('out_document_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.out-documents.massDestroy') }}",
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
  let table = $('.datatable-OutDocument:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection