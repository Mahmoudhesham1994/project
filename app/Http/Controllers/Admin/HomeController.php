<?php

namespace App\Http\Controllers\Admin;
use App\Models\CaseInfo;
use App\Models\CasePayment;

class HomeController
{
    public function index()
    {
//        dd("ss");
//        return view('home');
            $daily = date('Y-m-d');
//      // echo $daily."<br>";
      $casedaily =  CaseInfo::where('case_date', $daily)->get();
       $countcasedaily = count($casedaily);
    //  echo $countcasedaily;
        
         $paymentdaily =  CasePayment::where('payment_date', $daily)->get();
       $countpaymentdaily = count($paymentdaily);  
       return view('home', compact('countcasedaily','countpaymentdaily'));

    //   return view('home');
    }
}
