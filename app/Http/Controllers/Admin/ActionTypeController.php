<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyActionTypeRequest;
use App\Http\Requests\StoreActionTypeRequest;
use App\Http\Requests\UpdateActionTypeRequest;
use App\Models\ActionType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActionTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('action_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actionTypes = ActionType::all();

        return view('admin.actionTypes.index', compact('actionTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('action_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.actionTypes.create');
    }

    public function store(StoreActionTypeRequest $request)
    {
        $actionType = ActionType::create($request->all());

        return redirect()->route('admin.action-types.index');
    }

    public function edit(ActionType $actionType)
    {
        abort_if(Gate::denies('action_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.actionTypes.edit', compact('actionType'));
    }

    public function update(UpdateActionTypeRequest $request, ActionType $actionType)
    {
        $actionType->update($request->all());

        return redirect()->route('admin.action-types.index');
    }

    public function show(ActionType $actionType)
    {
        abort_if(Gate::denies('action_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.actionTypes.show', compact('actionType'));
    }

    public function destroy(ActionType $actionType)
    {
        abort_if(Gate::denies('action_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $actionType->delete();

        return back();
    }

    public function massDestroy(MassDestroyActionTypeRequest $request)
    {
        ActionType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
