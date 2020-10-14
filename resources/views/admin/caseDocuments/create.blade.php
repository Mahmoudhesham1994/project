@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.caseDocument.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.case-documents.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                
                 <input name="case_id" id="case_id" type="hidden" value="{{$id}}">
               {{-- <label for="case_id">{{ trans('cruds.caseDocument.fields.case') }}</label>
                {{--<select class="form-control select2 {{ $errors->has('case') ? 'is-invalid' : '' }}" name="case_id" id="case_id">
                    @foreach($cases as $id => $case)
                        <option value="{{ $id }}" {{ old('case_id') == $id ? 'selected' : '' }}>{{ $case }}</option>
                    @endforeach
                </select>--}}
                @if($errors->has('case'))
                    <span class="text-danger">{{ $errors->first('case') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseDocument.fields.case_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="doc_type_id">{{ trans('cruds.caseDocument.fields.doc_type') }}</label>
                <select class="form-control select2 {{ $errors->has('doc_type') ? 'is-invalid' : '' }}" name="doc_type_id" id="doc_type_id" required>
                    @foreach($doc_types as $id => $doc_type)
                        <option value="{{ $id }}" {{ old('doc_type_id') == $id ? 'selected' : '' }}>{{ $doc_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('doc_type'))
                    <span class="text-danger">{{ $errors->first('doc_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseDocument.fields.doc_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="doc_desc_a">{{ trans('cruds.caseDocument.fields.doc_desc_a') }}</label>
                <input class="form-control {{ $errors->has('doc_desc_a') ? 'is-invalid' : '' }}" type="text" name="doc_desc_a" id="doc_desc_a" value="{{ old('doc_desc_a', '') }}" required>
                @if($errors->has('doc_desc_a'))
                    <span class="text-danger">{{ $errors->first('doc_desc_a') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseDocument.fields.doc_desc_a_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="doc_date">{{ trans('cruds.caseDocument.fields.doc_date') }}</label>
                <input class="form-control date {{ $errors->has('doc_date') ? 'is-invalid' : '' }}" type="text" name="doc_date" id="doc_date" value="{{ old('doc_date') }}">
                @if($errors->has('doc_date'))
                    <span class="text-danger">{{ $errors->first('doc_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseDocument.fields.doc_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="doc_ref_code">{{ trans('cruds.caseDocument.fields.doc_ref_code') }}</label>
                <input class="form-control {{ $errors->has('doc_ref_code') ? 'is-invalid' : '' }}" type="text" name="doc_ref_code" id="doc_ref_code" value="{{ old('doc_ref_code', '') }}">
                @if($errors->has('doc_ref_code'))
                    <span class="text-danger">{{ $errors->first('doc_ref_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseDocument.fields.doc_ref_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="doc_note">{{ trans('cruds.caseDocument.fields.doc_note') }}</label>
                <input class="form-control {{ $errors->has('doc_note') ? 'is-invalid' : '' }}" type="text" name="doc_note" id="doc_note" value="{{ old('doc_note', '') }}">
                @if($errors->has('doc_note'))
                    <span class="text-danger">{{ $errors->first('doc_note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseDocument.fields.doc_note_helper') }}</span>
            </div>
<!--
            <div class="form-group">
                <label for="doc_file_name">{{ trans('cruds.caseDocument.fields.doc_file_name') }}</label>
                <div class="needsclick dropzone {{ $errors->has('doc_file_name') ? 'is-invalid' : '' }}" id="doc_file_name-dropzone">
                </div>
                @if($errors->has('doc_file_name'))
                    <span class="text-danger">{{ $errors->first('doc_file_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.caseDocument.fields.doc_file_name_helper') }}</span>
            </div>
-->
            
             <div class="form-group">
                <label for="message_doc">{{ trans('cruds.caseDocument.fields.doc_file_name') }}</label>
          <div class="input-group control-group increment" >
          <input type="file" name="message_doc[]" class="form-control">
<!--
          <div class="input-group-btn"> 
            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div>
-->
        </div>
        <div class="clone hide">
          <div class="control-group input-group" style="margin-top:10px">
            <input type="file" name="message_doc[]" class="form-control">
            <div class="input-group-btn"> 
              <!--<button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>-->
              <button class="btn btn-danger" type="button"><i class=""></i> Remove</button>
            </div>
          </div>
        </div>           
             </div>
            
            
            
            
            
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>



<!-- Include Date Range Picker -->
 <script>
      	$(document).ready(function(){
		var date_input=$('input[name="doc_date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd/mm/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})

     
     
     
  $(document).ready(function() {
 
      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });
 
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });
 
    });
    </script>
<script>
    Dropzone.options.docFileNameDropzone = {
    url: '{{ route('admin.case-documents.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="doc_file_name"]').remove()
      $('form').append('<input type="hidden" name="doc_file_name" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="doc_file_name"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($caseDocument) && $caseDocument->doc_file_name)
      var file = {!! json_encode($caseDocument->doc_file_name) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="doc_file_name" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection