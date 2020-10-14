<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCasePaymentRequest;
use App\Http\Requests\StoreCasePaymentRequest;
use App\Http\Requests\UpdateCasePaymentRequest;
use App\Models\CaseInfo;
use App\Models\CasePayment;
use App\Models\ComCurrency;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CasePaymentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('case_payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casePayments = CasePayment::all();

        return view('admin.casePayments.index', compact('casePayments'));
    }

    public function create($id)
    {
      //  dd($id);
        abort_if(Gate::denies('case_payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cases = CaseInfo::all()->pluck('case_ref_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crncies = ComCurrency::all()->pluck('crncy_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.casePayments.create', compact('id','cases', 'crncies'));
    }

    public function store(StoreCasePaymentRequest $request)
    {
        $casePayment = CasePayment::create($request->all());

       // return redirect()->route('admin.case-payments.index');
              return redirect()->route('admin.case-infos.edit',  $request->input('case_id'))->withInput(['tab'=>'secondtab']);  

    }

    public function edit(CasePayment $casePayment)
    {
        abort_if(Gate::denies('case_payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cases = CaseInfo::all()->pluck('case_ref_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crncies = ComCurrency::all()->pluck('crncy_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');

        $casePayment->load('case', 'crncy');

        return view('admin.casePayments.edit', compact('cases', 'crncies', 'casePayment'));
    }

    public function update(UpdateCasePaymentRequest $request, CasePayment $casePayment)
    {
        $casePayment->update($request->all());

        return redirect()->route('admin.case-payments.index');
    }

    public function show(CasePayment $casePayment)
    {
        abort_if(Gate::denies('case_payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casePayment->load('case', 'crncy');

        return view('admin.casePayments.show', compact('casePayment'));
    }

    public function destroy(CasePayment $casePayment)
    {
        abort_if(Gate::denies('case_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casePayment->delete();

        return back();
    }

    public function massDestroy(MassDestroyCasePaymentRequest $request)
    {
        CasePayment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
