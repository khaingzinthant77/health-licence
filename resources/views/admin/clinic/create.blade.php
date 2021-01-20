 @extends('adminlte::page')

@section('title', 'Technician ')

@section('content_header')

@stop

@section('content')
<div class="container">
    <div class="panel-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <form action="{{route('clinic.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="row">
               <div class="col-md-6">
                   <div class="row">
                       <label class="col-md-4 unicode">ဆေးခန်းအမည်*</label>
                        <div class="col-md-7 {{ $errors->first('clinic_name', 'has-error') }}">
                            
                            <input type="text" name="clinic_name" id="clinic_name" value="{{ old('clinic_name') }}" class="form-control unicode" placeholder="အထွေထွေရောဂါကုဆေးခန်း">
                         
                        </div>    
                   </div>

               </div>
               <div class="col-md-6">
                   <div class="row">
                       <label class="col-md-3 unicode">ပိုင်ရှင်အမည်*</label>
                        <div class="col-md-7 {{ $errors->first('owner_name', 'has-error') }}">
                            
                            <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name') }}" class="form-control unicode" placeholder="ဦးမောင်မောင်">
                         
                        </div>    
                   </div>
               </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <label class="col-md-4 unicode">ဆေးခန်းတည်နေရာ*</label>
                        <div class="col-md-7 {{ $errors->first('clinic_address', 'has-error') }}">
                            
                            <textarea name="clinic_address" class="form-control" placeholder="ပျဉ်းမနား"></textarea>
                            {!! $errors->first('clinic_address', '<span class="error_msg unicode">:message</span> ') !!}
                         
                        </div> 
                    </div>
                    <br>
                   <div class="row">
                       <label class="col-md-4 unicode">ဆေးခန်းဓါတ်ပုံ*</label>
                        <div class="col-md-7 {{ $errors->first('clinic_photo', 'has-error') }}">
                            
                            <input type="file" name="clinic_photo[]" id="clinic_photo" value="{{ old('clinic_photo') }}" class="form-control unicode" multiple>
                         
                        </div>    
                   </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <label class="col-md-3 unicode">ဖုန်းနံပါတ်*</label>
                        <div class="col-md-7 {{ $errors->first('ph_no', 'has-error') }}">
                            
                            <input type="number" name="ph_no" id="ph_no" value="{{ old('ph_no') }}" class="form-control unicode" placeholder="09987656787">
                         
                        </div> 
                    </div><br>
                    <div class="row">
                        <label class="col-md-3 unicode">မှတ်ပုံတင်နံပါတ်*</label>
                        <div class="col-md-7 {{ $errors->first('nrc', 'has-error') }}">
                            
                            <input type="text" name="nrc" id="nrc" value="{{ old('nrc') }}" class="form-control unicode" placeholder="9/PAMANA(N)111111">
                         
                        </div>
                    </div><br>
                    <div class="row">
                        <label class="col-md-3 unicode">ပိုင်ရှင် ဓါတ်ပုံ*</label>
                        <div class="col-md-7 {{ $errors->first('owner_photo', 'has-error') }}">
                            
                            <input type="file" name="owner_photo" id="owner_photo" value="{{ old('owner_photo') }}" class="form-control unicode">
                         
                        </div>
                    </div><br>
                    <div class="row">
                        <label class="col-md-3 unicode">နေရပ်လိပ်စာ*</label>
                        <div class="col-md-7 {{ $errors->first('owner_address', 'has-error') }}">
                            
                            <textarea name="owner_address" class="form-control" placeholder="ပျဉ်းမနား"></textarea>
                            {!! $errors->first('owner_address', '<span class="error_msg unicode">:message</span> ') !!}
                         
                        </div> 
                    </div>
                </div>
            </div>
            
            <br>  <br> 
            <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-5">
                        <a class="btn btn-primary unicode" href="{{route('clinic.index')}}"> Back</a>
                        <button type="submit" class="btn btn-success unicode">Save</button>
                    </div>
            </div>

        </form>
        <input type="hidden" id="ctr_token" value="{{ csrf_token()}}">
    </div>
</div>
@stop



@section('css')
   <style type="text/css" media="screen">
      .error_msg{
        color: #DD4B39;
      }
      .has-error input{
        border-color: #DD4B39;
      }
  </style>
   
@stop



@section('js')

<script>
   
</script>
@stop