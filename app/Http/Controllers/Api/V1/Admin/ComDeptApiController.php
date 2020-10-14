<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComDeptRequest;
use App\Http\Requests\UpdateComDeptRequest;
use App\Http\Resources\Admin\ComDeptResource;
use App\Models\ComDept;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComDeptApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('com_dept_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ComDeptResource(ComDept::all());
    }

    public function store(StoreComDeptRequest $request)
    {
        $comDept = ComDept::create($request->all());

        return (new ComDeptResource($comDept))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ComDept $comDept)
    {
        abort_if(Gate::denies('com_dept_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ComDeptResource($comDept);
    }

    public function update(UpdateComDeptRequest $request, ComDept $comDept)
    {
        $comDept->update($request->all());

        return (new ComDeptResource($comDept))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ComDept $comDept)
    {
        abort_if(Gate::denies('com_dept_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comDept->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
