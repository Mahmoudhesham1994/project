<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyComCurrencyRequest;
use App\Http\Requests\StoreComCurrencyRequest;
use App\Http\Requests\UpdateComCurrencyRequest;
use App\Models\ComCurrency;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComCurrencyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('com_currency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comCurrencies = ComCurrency::all();

        return view('admin.comCurrencies.index', compact('comCurrencies'));
    }

    public function create()
    {
        abort_if(Gate::denies('com_currency_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.comCurrencies.create');
    }

    public function store(StoreComCurrencyRequest $request)
    {
        $comCurrency = ComCurrency::create($request->all());

        return redirect()->route('admin.com-currencies.index');
    }

    public function edit(ComCurrency $comCurrency)
    {
        abort_if(Gate::denies('com_currency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.comCurrencies.edit', compact('comCurrency'));
    }

    public function update(UpdateComCurrencyRequest $request, ComCurrency $comCurrency)
    {
        $comCurrency->update($request->all());

        return redirect()->route('admin.com-currencies.index');
    }

    public function show(ComCurrency $comCurrency)
    {
        abort_if(Gate::denies('com_currency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.comCurrencies.show', compact('comCurrency'));
    }

    public function destroy(ComCurrency $comCurrency)
    {
        abort_if(Gate::denies('com_currency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comCurrency->delete();

        return back();
    }

    public function massDestroy(MassDestroyComCurrencyRequest $request)
    {
        ComCurrency::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
