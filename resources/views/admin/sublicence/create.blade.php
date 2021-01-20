@extends('adminlte::page')

@section('title', 'SubLicence')

@section('content_header')

@stop

@section('content')
 
   
  <form action="{{route('sublicence.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="row form-group">
            <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 style="font-weight:bold;font-size:15px;">ရောဂါရှာဖွေရေးအမည်</h6>
                                </div>

                                <div class="col-md-8 {{ $errors->first('sub_lic_name', 'has-error') }}">

                                       <input type="text" name="sub_lic_name" class="form-control unicode" id="sub_lic_name"  > 
                                     @if($errors->first('sub_lic_name'))
                                    <span class="help-block">
                                        <small>{{ $errors->first('sub_lic_name') }}</small>
                                    </span>
                                     @endif

                                </div>
                            </div>
              </div>
        </div>

        <div class="row form-group">
            <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 style="font-weight:bold;font-size:15px;">ရောဂါရှာဖွေရေးအမည်(အတိုကောက်)</h6>
                                </div>

                                <div class="col-md-8 {{ $errors->first('sub_lic_short', 'has-error') }}">

                                       <input type="text" name="sub_lic_short" class="form-control unicode" id="sub_lic_short" > 
                                        @if($errors->first('sub_lic_short'))
                                    <span class="help-block">
                                        <small>{{ $errors->first('sub_lic_short') }}</small>
                                    </span>
                                     @endif

                                </div>
                            </div>
              </div>
        </div>

        <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <a class="btn btn-primary unicode" href="{{route('sublicence.index')}}"> Back</a>
                        <button type="submit" class="btn btn-success unicode" onClick="javascript:p=true;" >Save</button>
                    </div>
            </div><br>
        	 
                        
        </div>
  </form>
@stop 



@section('css')
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"rel = "stylesheet">
    <style type="text/css" media="screen">
      .error_msg{
        color: #DD4B39;
      }
      .has-error input{
        border-color: #DD4B39;
      }
      .help-block{
        color: #DD4B39;
      }

  </style>
@stop



@section('js')
<script type="text/javascript" src="{{ asset('jquery-ui.js') }}"></script>
<script type="text/javascript">

</script>
@stop