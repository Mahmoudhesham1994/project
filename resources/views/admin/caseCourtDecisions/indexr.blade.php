{{--@extends('layouts.admin')
@section('content')--}}
@can('case_court_decision_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
           {{--  <a class="btn btn-success" href="{{ route('admin.case-court-decisions.create') }}">--}}
         <a class="btn btn-success" href="/admin/case-court-decisions-create/{{$caseInfo_id}}">
               {{ trans('global.add') }} {{ trans('cruds.caseCourtDecision.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.caseCourtDecision.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CaseCourtDecision">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.caseCourtDecision.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseCourtDecision.fields.case') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseCourtDecision.fields.court_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseCourtDecision.fields.court_reff_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseCourtDecision.fields.court_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseCourtDecision.fields.court_decisions') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseCourtDecision.fields.court_notes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($caseCourtDecisions as $key => $caseCourtDecision)
                        <tr data-entry-id="{{ $caseCourtDecision->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $caseCourtDecision->id ?? '' }}
                            </td>
                            <td>
                                {{ $caseCourtDecision->case->case_ref_code ?? '' }}
                            </td>
                            <td>
                                {{ $caseCourtDecision->court_name ?? '' }}
                            </td>
                            <td>
                                {{ $caseCourtDecision->court_reff_code ?? '' }}
                            </td>
                            <td>
                                {{ $caseCourtDecision->court_date ?? '' }}
                            </td>
                            <td>
                                {{ $caseCourtDecision->court_decisions ?? '' }}
                            </td>
                            <td>
                                {{ $caseCourtDecision->court_notes ?? '' }}
                            </td>
                            <td>
                                @can('case_court_decision_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.case-court-decisions.show', $caseCourtDecision->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('case_court_decision_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.case-court-decisions.edit', $caseCourtDecision->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('case_court_decision_delete')
                                    <form action="{{ route('admin.case-court-decisions.destroy', $caseCourtDecision->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('case_court_decision_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.case-court-decisions.massDestroy') }}",
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
  let table = $('.datatable-CaseCourtDecision:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection