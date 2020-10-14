@extends('layouts.admin')
@section('content')
@can('case_payment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.case-payments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.casePayment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.casePayment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CasePayment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.casePayment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.casePayment.fields.case') }}
                        </th>
                        <th>
                            {{ trans('cruds.casePayment.fields.payment_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.casePayment.fields.payment_amt') }}
                        </th>
                        <th>
                            {{ trans('cruds.casePayment.fields.crncy') }}
                        </th>
                        <th>
                            {{ trans('cruds.casePayment.fields.payment_ref_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.casePayment.fields.payment_notes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($casePayments as $key => $casePayment)
                        <tr data-entry-id="{{ $casePayment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $casePayment->id ?? '' }}
                            </td>
                            <td>
                                {{ $casePayment->case->case_ref_code ?? '' }}
                            </td>
                            <td>
                                {{ $casePayment->payment_date ?? '' }}
                            </td>
                            <td>
                                {{ $casePayment->payment_amt ?? '' }}
                            </td>
                            <td>
                                {{ $casePayment->crncy->crncy_desc_a ?? '' }}
                            </td>
                            <td>
                                {{ $casePayment->payment_ref_code ?? '' }}
                            </td>
                            <td>
                                {{ $casePayment->payment_notes ?? '' }}
                            </td>
                            <td>
                                @can('case_payment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.case-payments.show', $casePayment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('case_payment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.case-payments.edit', $casePayment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('case_payment_delete')
                                    <form action="{{ route('admin.case-payments.destroy', $casePayment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('case_payment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.case-payments.massDestroy') }}",
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
  let table = $('.datatable-CasePayment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection