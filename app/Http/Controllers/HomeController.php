<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseInfo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        dd('aaa');

        
//              $daily = date('Y-m-d');
//      // echo $daily."<br>";
//      $casedaily =  CaseInfo::where('case_date', $daily)->get();
//       $countcasedaily = count($casedaily);
//    //  echo $countcasedaily;
//       return view('home', compact('countcasedaily'));

    //   return view('home');
    }
}
