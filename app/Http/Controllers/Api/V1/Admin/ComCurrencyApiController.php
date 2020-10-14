<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComCurrencyRequest;
use App\Http\Requests\UpdateComCurrencyRequest;
use App\Http\Resources\Admin\ComCurrencyResource;
use App\Models\ComCurrency;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComCurrencyApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('com_currency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ComCurrencyResource(ComCurrency::all());
    }

    public function store(StoreComCurrencyRequest $request)
    {
        $comCurrency = ComCurrency::create($request->all());

        return (new ComCurrencyResource($comCurrency))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ComCurrency $comCurrency)
    {
        abort_if(Gate::denies('com_currency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ComCurrencyResource($comCurrency);
    }

    public function update(UpdateComCurrencyRequest $request, ComCurrency $comCurrency)
    {
        $comCurrency->update($request->all());

        return (new ComCurrencyResource($comCurrency))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ComCurrency $comCurrency)
    {
        abort_if(Gate::denies('com_currency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comCurrency->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
