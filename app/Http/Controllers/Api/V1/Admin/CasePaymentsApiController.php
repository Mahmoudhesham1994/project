<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCasePaymentRequest;
use App\Http\Requests\UpdateCasePaymentRequest;
use App\Http\Resources\Admin\CasePaymentResource;
use App\Models\CasePayment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CasePaymentsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CasePaymentResource(CasePayment::with(['case', 'crncy'])->get());
    }

    public function store(StoreCasePaymentRequest $request)
    {
        $casePayment = CasePayment::create($request->all());

        return (new CasePaymentResource($casePayment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CasePayment $casePayment)
    {
        abort_if(Gate::denies('case_payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CasePaymentResource($casePayment->load(['case', 'crncy']));
    }

    public function update(UpdateCasePaymentRequest $request, CasePayment $casePayment)
    {
        $casePayment->update($request->all());

        return (new CasePaymentResource($casePayment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CasePayment $casePayment)
    {
        abort_if(Gate::denies('case_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casePayment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
