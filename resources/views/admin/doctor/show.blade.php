 @extends('adminlte::page')

@section('title', 'Doctors ')

@section('content_header')

@stop

@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-md-11">
          <a class="btn btn-success unicode" href="{{route('doctor.index')}}"><i class="fas fa-arrow-left"></i></a>
        </div>
    <div class="col-md-1">
        <div class="row">
                    <form action="{{route('doctor.destroy',$doctor->id)}}" method="POST" onsubmit="return confirm('Do you really want to delete?');">
                        @csrf
                        @method('DELETE')
                     
                        <a class="btn btn-sm btn-primary" href="{{route('doctor.edit',$doctor->id)}}"><i class="fa fa-fw fa-edit" /></i></a>

                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash" /></i></button> 
                    </form> 
        </div>
    </div>
    </div>
    
    </div><br>
    <div class="container">
        <div class="panel-body">
        
        <form action="{{route('doctor.update',$doctor->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="row">
               <div class="col-md-6">
                   <div class="row">
                       <label class="col-md-4 unicode">ဆရာဝန်အမည်*</label>
                        <div class="col-md-7 {{ $errors->first('doc_name', 'has-error') }}">
                            
                            <input type="text" name="doc_name" id="doc_name" value="{{ old('doc_name',$doctor->doc_name) }}" class="form-control unicode" placeholder="Dr.Myo Myint" readonly="readonly">
                         
                        </div>    
                   </div>
                   <br>
                   <div class="row">
                       <label class="col-md-4 unicode">ဆေးခန်း အမည်*</label>
                        <div class="col-md-7 {{ $errors->first('clinic_id', 'has-error') }}">
                            
                          

                            <input type="text" name="clinic_id" id="clinic_id" value="{{ old('clinic_id',$doctor->viewClinic->clinic_name) }}" class="form-control unicode" placeholder="ဆေးခန်း" readonly="readonly">
                         
                        </div>    
                   </div><br>
                   <div class="row">
                       <label class="col-md-4 unicode">ဘွဲ့အမည်*</label>
                        <div class="col-md-7 {{ $errors->first('doc_degree', 'has-error') }}">
                            
                            <input type="text" name="doc_degree" id="doc_degree" value="{{ old('doc_degree',$doctor->doc_degree) }}" class="form-control unicode" placeholder="D.H.S" readonly="readonly">
                         
                        </div>    
                   </div><br>
                   <div class="row">
                       <label class="col-md-4 unicode">ဖုန်းနံပါတ်*</label>
                        <div class="col-md-7 {{ $errors->first('doc_phone', 'has-error') }}">
                            
                            <input type="number" name="doc_phone" id="doc_phone" value="{{ old('doc_phone',$doctor->doc_phone) }}" class="form-control unicode" placeholder="0986787687" readonly="readonly">
                         
                        </div>    
                   </div><br>
                   <div class="row">
                        <label class="col-md-4 unicode">နေရပ်လိပ်စာ*</label>
                        <div class="col-md-7 {{ $errors->first('doc_address', 'has-error') }}">
                            
                            <textarea name="doc_address" class="form-control" placeholder="ပျဉ်းမနား" readonly="readonly">{{$doctor->doc_address}}</textarea>
                            {!! $errors->first('doc_address', '<span class="error_msg unicode">:message</span> ') !!}
                         
                        </div> 
                    </div>
               </div>
               
            </div>
           <!--  <br>  <br> 
            <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-5">
                        <a class="btn btn-primary unicode" href="{{route('doctor.index')}}"> Back</a>
                        <button type="submit" class="btn btn-success unicode">Save</button>
                    </div>
            </div> -->
            
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