<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCaseInfoRequest;
use App\Http\Requests\StoreCaseInfoRequest;
use App\Http\Requests\UpdateCaseInfoRequest;
use App\Models\CaseInfo;
use App\Models\CaseStatus;
use App\Models\CaseType;
use App\Models\ComDept;
use App\Models\ReportType;
use App\Models\Staff;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
//use DateTime;
use Carbon\Carbon;

class CaseInfoController extends Controller
{
    
    
        public function search(Request $request)
    {
       // dd($request);
       if($request->date_from==""&$request->date_to==""&$request->case_ref_code==""&$request->dept_id==""&$request->status_id==""&$request->staff_id==""&$request->case_type_id==""&$request->case_name=="")
       {
        $caseInfos = CaseInfo::all();
 $case_types = CaseType::all()->pluck('type_desc', 'id')->prepend(trans('global.pleaseSelect'), '');
     $depts = ComDept::all()->pluck('dept_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');
         $statuses = CaseStatus::all()->pluck('status_desc', 'id')->prepend(trans('global.pleaseSelect'), '');
         $staff = Staff::all()->pluck('staff_name', 'id')->prepend(trans('global.pleaseSelect'), '');     
         return view('admin.caseInfos.index', compact('caseInfos','case_types','depts','statuses','staff'));
        }
            
        else{
         $date_form = $request->date_from;
$date_to = $request->date_to;

 $case_ref_code = $request->case_ref_code;
 $dept_id = $request->dept_id;
$status_id = $request->status_id;
$staff_id = $request->staff_id;
$case_type_id = $request->case_type_id;
$case_name = $request->case_name;
//          $df =  date('Y-m-d', strtotime($request->date_from));
//          $dt =  date('Y-m-d', strtotime($request->date_to));
            
    //echo  date('Y-d-m', strtotime($request->date_from)) ;
//       $myDateTime = DateTime::createFromFormat('Y-d-m', $request->date_from);
//$formattedweddingdate = $myDateTime->format('Y-d-m');
//     echo $formattedweddingdate;
//            dd($request->date_from);
            // echo $request->date_from."<br>";
           // echo  date('Y-d-m', strtotime($request->date_from))."<br>" ;
  //echo Carbon::parse($request->date_from)->format('Y-d-m');
   // echo   Carbon::createFromFormat('d/m/Y', $request->date_from)->format('d-m-Y') ;
            
            
//     $df =  Carbon::createFromFormat('d/m/Y', $request->date_from)->format('Y-m-d') ;
//     $dt =  Carbon::createFromFormat('d/m/Y', $request->date_to)->format('Y-m-d') ;
//       echo $ee;
//     die();
            
            
     //  echo   date_format($request->date_from, 'Y-d-m');
           
          //  dd($ss);
   $caseInfos = CaseInfo::

when($request->case_ref_code, function($query) use ($request){
    $query->where('case_ref_code', '>=', $request->case_ref_code);
})
->when($request->case_name, function($query) use ($request){
    $query->where('case_name','like','%' .$request->case_name.'%');
})
    
// ->when(($request->date_from && $request->date_to), function($query) use ($request){
//    $query->whereBetween('case_date', [$request->date_from, $request->date_to]);
//}) 
  
//  ->when((Carbon::parse($request->date_from)->format('Y-d-m') && Carbon::parse($request->date_to)->format('Y-d-m')  ), function($query) use ($request){
//    $query->whereBetween('case_date', [Carbon::parse($request->date_from)->format('Y-d-m'),
//                                       Carbon::parse($request->date_to)->format('Y-d-m')  ]);
//})  
    //Carbon::createFromFormat('d/m/Y', $request->date_from)->format('Y-m-d')
//    ->when((  Carbon::createFromFormat('d/m/Y', $request->date_from)->format('Y-m-d') && Carbon::createFromFormat('d/m/Y', $request->date_to)->format('Y-m-d')   ),
//           function($query) use ($request){
//    $query->whereBetween('case_date', [  Carbon::createFromFormat('d/m/Y', $request->date_from)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $request->date_to)->format('Y-m-d')  ]);
//})    
 //new
//    ->when(( Carbon::createFromFormat('d/m/Y', $request->date_from)->format('Y-m-d')  && Carbon::createFromFormat('d/m/Y', $request->date_to)->format('Y-m-d')   ), function($query) use ($request){
//    $query->whereBetween('case_date', [Carbon::createFromFormat('d/m/Y', $request->date_from)->format('Y-m-d')
//         ,  Carbon::createFromFormat('d/m/Y', $request->date_to)->format('Y-m-d')
//    ]);
//})    
        ->when(($request->date_from &&  $request->date_to), function($query) use ($request){
    $query->whereBetween('case_date', [ $request->date_from,$request->date_to  ]);
})    

    
//    ->when((date('Y-d-m', strtotime($request->date_from)) && date('Y-d-m', strtotime($request->date_to))), function($query) use ($request){
//    $query->whereBetween('case_date', [date('Y-d-m', strtotime($request->date_from)), date('Y-d-m', strtotime($request->date_to))]);
//})    
    
  ->when($request->status_id, function($query) use ($request){
    $query->whereHas('status', function($q) use ($request) {
        
            $q->whereIn('status_id', [$request->status_id]);
        
    });
})
    
    ->when($request->dept_id, function($query) use ($request){
    $query->whereHas('dept', function($q) use ($request) {
        
            $q->whereIn('dept_id', [$request->dept_id]);
        
    });
})  
   
      ->when($request->case_type_id, function($query) use ($request){
    $query->whereHas('case_type', function($q) use ($request) {
        
            $q->whereIn('case_type_id', [$request->case_type_id]);
        
    });
})  
     
    


///    ->when(($request->date_from && $request->date_to), function($query) {
//    $query->whereBetween('case_date', [$request->date_from, $request->date_to]);
//})
//->when( $request->delivery_month_from, function($query) use ($request){
//    $query->where('delivery_month', '>=', $request->delivery_month_from);
//})
//->when( $request->delivery_month_to, function($query) use ($request){
//    $query->where('delivery_month', '<=', $request->delivery_month_to);
//})
//->when( $request->product_group, function($query) use ($request){
//    $query->whereHas('products', function($q) use ($request) {
//        $q->whereHas('group', function($qi) use ($request){
//            $qi->whereIn('id', $request->product_group);
//        });
//    });
//})
->get();
//            echo $request->date_from."<br>".$request->date_to;
//            die();
     // dd($caseInfos);    
// $caseInfos = CaseInfo::orWhereHas('dept', function ($query) use ($dept_id)  {
//$query->where("dept_id", $dept_id);
//}) 
//->orWhereHas('status', function ($query) use ($status_id)  {
//$query->where("status_id", $status_id);
//}) 
//->orWhereHas('staff', function ($query) use ($staff_id)  {
//$query->where("staff_id", $staff_id);
//}) 
//->orWhereHas('case_type', function ($query) use ($case_type_id)  {
//$query->where("case_type_id", $case_type_id);
//}) 
//->Orwhere('case_ref_code',$case_ref_code)
//->where('case_name','like','%' .$case_name.'%')
//->whereBetween('case_date', [$date_form, $date_to])
// ->get();
            
            
            
//            dd($case_ref_code);
//        dd($request->all);
      // dd($caseInfos);
 $case_types = CaseType::all()->pluck('type_desc', 'id')->prepend(trans('global.pleaseSelect'), '');
     $depts = ComDept::all()->pluck('dept_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');
         $statuses = CaseStatus::all()->pluck('status_desc', 'id')->prepend(trans('global.pleaseSelect'), '');
         $staff = Staff::all()->pluck('staff_name', 'id')->prepend(trans('global.pleaseSelect'), '');     
         return view('admin.caseInfos.index', compact('caseInfos','case_types','depts','statuses','staff'));
}
        
    }
    
    
    public function index()
    {
        abort_if(Gate::denies('case_info_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseInfos = CaseInfo::all();
 $case_types = CaseType::all()->pluck('type_desc', 'id')->prepend(trans('global.pleaseSelect'), '');
        
        
    $depts = ComDept::all()->pluck('dept_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');

 
        $statuses = CaseStatus::all()->pluck('status_desc', 'id')->prepend(trans('global.pleaseSelect'), '');

        $staff = Staff::all()->pluck('staff_name', 'id')->prepend(trans('global.pleaseSelect'), '');     
        
        
        return view('admin.caseInfos.index', compact('caseInfos','case_types','depts','statuses','staff'));
    }

    public function create()
    {
        abort_if(Gate::denies('case_info_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $case_types = CaseType::all()->pluck('type_desc', 'id')->prepend(trans('global.pleaseSelect'), '');

        $depts = ComDept::all()->pluck('dept_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');

        $report_types = ReportType::all()->pluck('rep_type_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = CaseStatus::all()->pluck('status_desc', 'id')->prepend(trans('global.pleaseSelect'), '');

        $staff = Staff::all()->pluck('staff_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.caseInfos.create', compact('case_types', 'depts', 'report_types', 'statuses', 'staff'));
    }

    public function store(StoreCaseInfoRequest $request)
    {
       // dd($request->all());
        $caseInfo = CaseInfo::create($request->all());

        return redirect()->route('admin.case-infos.index');
    }

    public function edit(CaseInfo $caseInfo)
    {
        abort_if(Gate::denies('case_info_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $case_types = CaseType::all()->pluck('type_desc', 'id')->prepend(trans('global.pleaseSelect'), '');

        $depts = ComDept::all()->pluck('dept_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');

        $report_types = ReportType::all()->pluck('rep_type_desc_a', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = CaseStatus::all()->pluck('status_desc', 'id')->prepend(trans('global.pleaseSelect'), '');

        $staff = Staff::all()->pluck('staff_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $caseInfo->load('case_type', 'dept', 'report_type', 'status', 'staff');
       // dd($caseInfo->id);
       $caseInfoid =  $caseInfo->id;
        return view('admin.caseInfos.edit', compact('caseInfoid','case_types', 'depts', 'report_types', 'statuses', 'staff', 'caseInfo'));
    }

    public function update(UpdateCaseInfoRequest $request, CaseInfo $caseInfo)
    {
        $caseInfo->update($request->all());

        return redirect()->route('admin.case-infos.index');
    }

    public function show(CaseInfo $caseInfo)
    {
        abort_if(Gate::denies('case_info_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseInfo->load('case_type', 'dept', 'report_type', 'status', 'staff');

        return view('admin.caseInfos.show', compact('caseInfo'));
    }

    public function destroy(CaseInfo $caseInfo)
    {
       
        abort_if(Gate::denies('case_info_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $caseInfo->delete();
  
        return back();
    }

    public function massDestroy(MassDestroyCaseInfoRequest $request)
    {
        CaseInfo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
