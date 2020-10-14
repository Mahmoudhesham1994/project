@extends('layouts.admin')
@section('content')

<ul class="nav nav-stacked nav-pills" id="tabMenu">
       
        <li>
      
            <a class="nav-link  " href="{{url('#firsttab')}}" data-toggle="tab"  role="tab">البيانات الاساسية    </a>
        </li>
       
        <li>
       
            <a class="nav-link  " href="{{url('#secondtab')}}" data-toggle="tab"  role="tab">{{ trans('cruds.caseParty.title') }}    </a>
        </li>
        
        <li>
            <a class="nav-link  " href="{{url('#thirdtab')}}" data-toggle="tab"  role="tab"> {{ trans('cruds.caseActionTaken.title') }}  </a>
        </li>
    
        <li>
          <a class="nav-link  " href="{{url('#fourth')}}" data-toggle="tab"  role="tab">{{ trans('cruds.caseNote.title_singular') }}   </a>
        </li>
    
        <li>
          <a class="nav-link  " href="{{url('#Fifth')}}" data-toggle="tab"  role="tab">{{ trans('cruds.caseDocument.title_singular') }}   </a>
        </li>
    <li>
          <a class="nav-link  " href="{{url('#six')}}" data-toggle="tab"  role="tab">
             {{ trans('cruds.caseCourtDecision.title_singular') }}  </a>
        </li>
      <li>
          <a class="nav-link  " href="{{url('#siven')}}" data-toggle="tab"  role="tab">
            {{ trans('cruds.casePayment.title_singular') }}  </a>
        </li>
     
    
      </ul>



      <div class="tab-content">
        <div class="tab-pane active" id="firsttab">
<!--          <h1>I'm in first tab</h1>--> 
               @includeIf('admin.caseInfos.editv',  [$caseInfo->id])  
        </div>
        <div class="tab-pane" id="secondtab">
<!--          <h1>I'm in second tab</h1>-->
           
  @includeIf('admin.caseParties.indexr' , ['caseParties' => $caseInfo->caseInfoCaseParty,
            'caseInfo_id' =>$caseInfo->id]) 
       
        </div>
        <div class="tab-pane " id="thirdtab">
<!--          <h1>I'm in third tab</h1>--> 
           
    @includeIf('admin.caseActionTakens.indexr' , ['caseActionTakens' => $caseInfo->caseInfoCaseActionTaken,
            'caseInfo_id' =>$caseInfo->id ])   
        </div>
        {{-- <div class="tab-pane " id="fourth"> --}}
          <div class="tab-pane{{old('tab') == 'fourth' ? ' active' : null}}" id="fourth" role="tabpanel">
<!--          <h1>I'm in fourth tab</h1>-->
          
                       @includeIf('admin.caseNotes.indexr' , ['caseNotes' => $caseInfo->caseInfoCaseNote,
            'caseInfo_id' =>$caseInfo->id])   
        </div>
        {{-- <div class="tab-pane " id="Fifth"> --}}
          <div class="tab-pane{{old('tab') == 'Fifth' ? ' active' : null}}" id="Fifth" role="tabpanel">
<!--          <h1>I'm in Fifth tab</h1>-->
         
               @includeIf('admin.caseDocuments.indexr' , ['caseDocuments' => $caseInfo->caseInfoCaseDocument,
            'caseInfo_id' =>$caseInfo->id])    
        </div>
          
          <div class="tab-pane{{old('tab') == 'six' ? ' active' : null}}" id="six" role="tabpanel">
          
   @includeIf('admin.caseCourtDecisions.indexr' , ['caseCourtDecisions' => $caseInfo->caseInfoCaseCourtDecision,
            'caseInfo_id' =>$caseInfo->id])    
        </div>
        <div class="tab-pane{{old('tab') == 'siven' ? ' active' : null}}" id="siven" role="tabpanel">
          
   @includeIf('admin.casePayments.indexr' , ['casePayments' => $caseInfo->caseInfoCasePayment,
            'caseInfo_id' =>$caseInfo->id])    
        </div>  
      
      </div>
    
       
    
    @endsection   

