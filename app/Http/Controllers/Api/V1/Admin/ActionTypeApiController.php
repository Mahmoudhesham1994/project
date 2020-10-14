<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActionTypeRequest;
use App\Http\Requests\UpdateActionTypeRequest;
use App\Http\Resources\Admin\ActionTypeResource;
use App\Models\ActionType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActionTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('action_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActionTypeResource(ActionType::all());
    }

    public function store(StoreActionTypeRequest $request)
    {
        $actionType = ActionType::create($request->all());

        return (new ActionTypeResource($actionType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ActionType $actionType)
    {
        abort_if(Gate::denies('action_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ActionTypeResource($actionType);
    }

    public function update(UpdateActionTypeRequest $request, ActionType $actionType)
    {
        $actionType->update($request->all());

        return (new ActionTypeResource($actionType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ActionType $actionType)
    {
        abort_if(Gate::denies('action_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actionType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
