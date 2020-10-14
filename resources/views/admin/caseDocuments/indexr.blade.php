{{--@extends('layouts.admin')
@section('content')--}}
@can('case_document_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            {{--<a class="btn btn-success" href="{{ route('admin.case-documents.create') }}">--}}
            <a class="btn btn-success" href="/admin/case-documents-create/{{$caseInfo_id}}">
                {{ trans('global.add') }} {{ trans('cruds.caseDocument.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.caseDocument.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CaseDocument">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
<!--
                        <th>
                            {{ trans('cruds.caseDocument.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseDocument.fields.case') }}
                        </th>
-->
                        <th>
                            {{ trans('cruds.caseDocument.fields.doc_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseDocument.fields.doc_desc_a') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseDocument.fields.doc_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseDocument.fields.doc_ref_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseDocument.fields.doc_note') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseDocument.fields.doc_file_name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($caseDocuments as $key => $caseDocument)
                        <tr data-entry-id="{{ $caseDocument->id }}">
                            <td>

                            </td>
<!--
                            <td>
                                {{ $caseDocument->id ?? '' }}
                            </td>
                            <td>
                                {{ $caseDocument->case->case_ref_code ?? '' }}
                            </td>
-->
                            <td>
                                {{ $caseDocument->doc_type->doc_type_desc_a ?? '' }}
                            </td>
                            <td>
                                {{ $caseDocument->doc_desc_a ?? '' }}
                            </td>
                            <td>
                                {{ $caseDocument->doc_date ?? '' }}
                            </td>
                            <td>
                                {{ $caseDocument->doc_ref_code ?? '' }}
                            </td>
                            <td>
                                {{ $caseDocument->doc_note ?? '' }}
                            </td>
                            <td>
                                @if($caseDocument->doc_file_name)
                                    <a href="{{ $caseDocument->doc_file_name->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('case_document_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.case-documents.show', $caseDocument->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('case_document_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.case-documents.edit', $caseDocument->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('case_document_delete')
                                    <form action="{{ route('admin.case-documents.destroy', $caseDocument->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('case_document_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.case-documents.massDestroy') }}",
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
  let table = $('.datatable-CaseDocument:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection