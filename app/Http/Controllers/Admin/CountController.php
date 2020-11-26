<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCaseNoteRequest;
use App\Http\Requests\StoreCaseNoteRequest;
use App\Http\Requests\UpdateCaseNoteRequest;
use App\Models\CaseInfo;
use App\Models\CasePayment;
use App\Models\CaseNote;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class CountController extends Controller
{
     

   public function dailyCase()
      {
       
      $daily = date('Y-m-d');
      // echo $daily."<br>";
      $casedaily =  CaseInfo::where('case_date', $daily)->get();
       $countcasedaily = count($casedaily);
       
       
       $paymentdaily =  CasePayment::where('payment_date', $daily)->get();
       $countpaymentdaily = count($paymentdaily);  
       
    //  echo $countcasedaily;
       return view('home', compact('countcasedaily','countpaymentdaily'));
        
      }
    
    public function weeklyCase()
      {
       
         
        
        
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
Carbon::setWeekEndsAt(Carbon::SATURDAY);

      $caseweekly =  CaseInfo::whereBetween('case_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();

       $countcaseweekly = count($caseweekly);
        
        
       $casePayment =  CasePayment::whereBetween('payment_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();

       $countPaymentweekly = count($casePayment);
       
     //  echo $countcasedaily;
//       $ss = CaseInfo::all();
//       // echo $ss;
//        echo $casedaily;
       // dd($countcaseweekly);
        
        
        
      return view('home', compact('countcaseweekly','countPaymentweekly'));
        
      }

 
    public function monthlyCase()
      {
       
         
        
        
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
Carbon::setWeekEndsAt(Carbon::SATURDAY);

      $casemonthly =  CaseInfo::whereBetween('case_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();

       $countcasemonthly = count($casemonthly);
        
        
        
           $paymentmonthly =  CasePayment::whereBetween('payment_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();

       $countpaymentmonthly = count($paymentmonthly);
   
        
     //  echo $countcasedaily;
//       $ss = CaseInfo::all();
//       // echo $ss;
//        echo $casedaily;
        // dd($countcasemonthly);
        
        
        
      return view('home', compact('countcasemonthly','countpaymentmonthly'));
        
      }
 

 

  

 
}
