{{-- @extends('layouts.admin')
@section('content') --}}
@can('case_party_create')


 @foreach($caseParties as $key => $caseParty)
 <?php  $id = $caseParty->case_id;  ?>
@endforeach
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
  {{--    <a class="btn btn-success" href="{{ route('admin.case-parties.create',['id' => $caseParty->case_id]) }}"> --}}

           
      {{-- <a class="btn btn-success" href="/admin/case-parties-create/{{$id}}"> --}}
       <a class="btn btn-success" href="/admin/case-parties-create/{{$caseInfo_id}}">
                 
             {{ trans('global.add') }} {{ trans('cruds.caseParty.title_singular') }}
        </a>
             
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.caseParty.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CaseParty">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.caseParty.fields.id') }}
                        </th>
                        {{--<th>
                            {{ trans('cruds.caseParty.fields.case') }}
                        </th>--}}
                        <th>
                            {{ trans('cruds.caseParty.fields.party_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_id_num') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_notes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($caseParties as $key => $caseParty)
                        <tr data-entry-id="{{ $caseParty->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $caseParty->id ?? '' }}
                            </td>
                            {{--<td>
                                {{ $caseParty->case->case_ref_code ?? '' }}
                            </td>--}}
                            <td>
                                {{ $caseParty->party_type->party_type_desc_a ?? '' }}
                            </td>
                            <td>
                                {{ $caseParty->party_id_num ?? '' }}
                            </td>
                            <td>
                                {{ $caseParty->party_name ?? '' }}
                            </td>
                            <td>
                                {{ $caseParty->party_address ?? '' }}
                            </td>
                            <td>
                                {{ $caseParty->party_phone ?? '' }}
                            </td>
                            <td>
                                {{ $caseParty->party_mobile ?? '' }}
                            </td>
                            <td>
                                {{ $caseParty->party_email ?? '' }}
                            </td>
                            <td>
                                {{ $caseParty->party_notes ?? '' }}
                            </td>
                            <td>
                                @can('case_party_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.case-parties.show', $caseParty->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('case_party_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.case-parties.edit', $caseParty->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('case_party_delete')
                                    <form action="{{ route('admin.case-parties.destroy', $caseParty->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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


{{-- 
@endsection --}}
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('case_party_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.case-parties.massDestroy') }}",
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
  let table = $('.datatable-CaseParty:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection