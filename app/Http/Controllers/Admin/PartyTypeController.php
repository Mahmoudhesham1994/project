<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPartyTypeRequest;
use App\Http\Requests\StorePartyTypeRequest;
use App\Http\Requests\UpdatePartyTypeRequest;
use App\Models\PartyType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartyTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('party_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partyTypes = PartyType::all();

        return view('admin.partyTypes.index', compact('partyTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('party_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partyTypes.create');
    }

    public function store(StorePartyTypeRequest $request)
    {
        $partyType = PartyType::create($request->all());

        return redirect()->route('admin.party-types.index');
    }

    public function edit(PartyType $partyType)
    {
        abort_if(Gate::denies('party_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partyTypes.edit', compact('partyType'));
    }

    public function update(UpdatePartyTypeRequest $request, PartyType $partyType)
    {
        $partyType->update($request->all());

        return redirect()->route('admin.party-types.index');
    }

    public function show(PartyType $partyType)
    {
        abort_if(Gate::denies('party_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.partyTypes.show', compact('partyType'));
    }

    public function destroy(PartyType $partyType)
    {
        abort_if(Gate::denies('party_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partyType->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartyTypeRequest $request)
    {
        PartyType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
