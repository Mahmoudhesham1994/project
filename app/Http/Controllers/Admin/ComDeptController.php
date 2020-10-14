<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyComDeptRequest;
use App\Http\Requests\StoreComDeptRequest;
use App\Http\Requests\UpdateComDeptRequest;
use App\Models\ComDept;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComDeptController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('com_dept_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comDepts = ComDept::all();

        return view('admin.comDepts.index', compact('comDepts'));
    }

    public function create()
    {
        abort_if(Gate::denies('com_dept_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.comDepts.create');
    }

    public function store(StoreComDeptRequest $request)
    {
        $comDept = ComDept::create($request->all());

        return redirect()->route('admin.com-depts.index');
    }

    public function edit(ComDept $comDept)
    {
        abort_if(Gate::denies('com_dept_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.comDepts.edit', compact('comDept'));
    }

    public function update(UpdateComDeptRequest $request, ComDept $comDept)
    {
        $comDept->update($request->all());

        return redirect()->route('admin.com-depts.index');
    }

    public function show(ComDept $comDept)
    {
        abort_if(Gate::denies('com_dept_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.comDepts.show', compact('comDept'));
    }

    public function destroy(ComDept $comDept)
    {
        abort_if(Gate::denies('com_dept_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comDept->delete();

        return back();
    }

    public function massDestroy(MassDestroyComDeptRequest $request)
    {
        ComDept::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
