@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.caseParty.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                 <a class="btn btn-default" href="/admin/case-parties-index/{{$caseParty->case_id}}">
<!--                <a class="btn btn-default" href="{{ route('admin.case-parties.index') }}">-->
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.caseParty.fields.id') }}
                        </th>
                        <td>
                            {{ $caseParty->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseParty.fields.case') }}
                        </th>
                        <td>
                            {{ $caseParty->case->case_ref_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_type') }}
                        </th>
                        <td>
                            {{ $caseParty->party_type->party_type_desc_a ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_id_num') }}
                        </th>
                        <td>
                            {{ $caseParty->party_id_num }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_name') }}
                        </th>
                        <td>
                            {{ $caseParty->party_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_address') }}
                        </th>
                        <td>
                            {{ $caseParty->party_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_phone') }}
                        </th>
                        <td>
                            {{ $caseParty->party_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_mobile') }}
                        </th>
                        <td>
                            {{ $caseParty->party_mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_email') }}
                        </th>
                        <td>
                            {{ $caseParty->party_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.caseParty.fields.party_notes') }}
                        </th>
                        <td>
                            {{ $caseParty->party_notes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                 <a class="btn btn-default" href="/admin/case-parties-index/{{$caseParty->case_id}}">
                    
<!--                <a class="btn btn-default" href="{{ route('admin.case-parties.index') }}">-->
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection