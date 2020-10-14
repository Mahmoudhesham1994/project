<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartyTypeRequest;
use App\Http\Requests\UpdatePartyTypeRequest;
use App\Http\Resources\Admin\PartyTypeResource;
use App\Models\PartyType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PartyTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('party_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PartyTypeResource(PartyType::all());
    }

    public function store(StorePartyTypeRequest $request)
    {
        $partyType = PartyType::create($request->all());

        return (new PartyTypeResource($partyType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PartyType $partyType)
    {
        abort_if(Gate::denies('party_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PartyTypeResource($partyType);
    }

    public function update(UpdatePartyTypeRequest $request, PartyType $partyType)
    {
        $partyType->update($request->all());

        return (new PartyTypeResource($partyType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PartyType $partyType)
    {
        abort_if(Gate::denies('party_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partyType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
