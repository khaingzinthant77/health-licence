 @extends('adminlte::page')

@section('title', 'Technician ')

@section('content_header')

@stop

@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-md-11"></div>
    <div class="col-md-1">
        <div class="row">
                    <form action="{{route('clinic.destroy',$clinic->id)}}" method="POST" onsubmit="return confirm('Do you really want to delete?');">
                        @csrf
                        @method('DELETE')
                     
                        <a class="btn btn-sm btn-primary" href="{{route('clinic.edit',$clinic->id)}}"><i class="fa fa-fw fa-edit" /></i></a>

                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash" /></i></button> 
                    </form> 
        </div>
    </div>
    </div>
    
</div><br>
<div class="container">
    <div class="panel-body">
        
        <form action="{{route('clinic.update',$clinic->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="row">
               <div class="col-md-6">
                   <div class="row">
                       <label class="col-md-4 unicode">ဆေးခန်းအမည်*</label>
                        <div class="col-md-7 {{ $errors->first('clinic_name', 'has-error') }}">
                            
                            <input type="text" name="clinic_name" id="clinic_name" value="{{ old('clinic_name',$clinic->clinic_name) }}" class="form-control unicode" placeholder="အထွေထွေရောဂါကုဆေးခန်း" readonly="readonly">
                         
                        </div>    
                   </div>
               </div>
               <div class="col-md-6">
                   <div class="row">
                       <label class="col-md-3 unicode">ပိုင်ရှင်အမည်*</label>
                        <div class="col-md-7 {{ $errors->first('owner_name', 'has-error') }}">
                            
                            <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name',$clinic->owner) }}" class="form-control unicode" placeholder="ဦးမောင်မောင်" readonly="readonly">
                         
                        </div>    
                   </div>
               </div>
            </div><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <label class="col-md-4 unicode">ဆေးခန်းတည်နေရာ*</label>
                        <div class="col-md-7 {{ $errors->first('clinic_address', 'has-error') }}">
                            
                            <textarea name="clinic_address" class="form-control" placeholder="ပျဉ်းမနား" readonly="readonly">{{$clinic->clinic_address}}</textarea>
                            {!! $errors->first('clinic_address', '<span class="error_msg unicode">:message</span> ') !!}
                         
                        </div> 
                    </div><br>
                    <div class="row">
                        @foreach ($clinic_photos as $image)
                                <div class="col-md-4">
                                    <img src="{{ asset( $image->path .'/' . $image->clinic_photo) }}" alt="image"
                                                width="100px">
                                </div>

                                <br>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <label class="col-md-3 unicode">ဖုန်းနံပါတ်*</label>
                        <div class="col-md-7 {{ $errors->first('ph_no', 'has-error') }}">
                            
                            <input type="number" name="ph_no" id="ph_no" value="{{ old('ph_no',$clinic->phone) }}" class="form-control unicode" placeholder="09987656787" readonly="readonly">
                         
                        </div> 
                    </div><br>
                    <div class="row">
                        <label class="col-md-3 unicode">မှတ်ပုံတင်နံပါတ်*</label>
                        <div class="col-md-7 {{ $errors->first('nrc', 'has-error') }}">
                            
                            <input type="text" name="nrc" id="nrc" value="{{ old('nrc',$clinic->nrc) }}" class="form-control unicode" placeholder="9/PAMANA(N)111111" readonly="readonly">
                         
                        </div>
                    </div><br>
                    <div class="row">
                        <label class="col-md-3 unicode">နေရပ်လိပ်စာ*</label>
                        <div class="col-md-7 {{ $errors->first('owner_address', 'has-error') }}">
                            
                            <textarea name="owner_address" class="form-control" placeholder="ပျဉ်းမနား" readonly="readonly">{{$clinic->address}}</textarea>
                            {!! $errors->first('owner_address', '<span class="error_msg unicode">:message</span> ') !!}
                         
                        </div> 
                    </div>
                    <br>
                    <div class="row">
                        <label class="col-md-3 unicode">ပိုင်ရှင် ဓါတ်ပုံ*</label>
                        <div class="col-md-7 {{ $errors->first('owner_photo', 'has-error') }}">
                            
                            <!-- <input type="file" name="owner_photo" id="owner_photo" value="{{ old('owner_photo') }}" class="form-control unicode"> -->
                         <img src="{{ asset($clinic->path.$clinic->owner_photo) }}" alt="photo" width="200px">
                        </div>
                    </div>
                    
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