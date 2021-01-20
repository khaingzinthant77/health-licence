@extends('adminlte::page')

@section('title', 'Township')

@section('content_header')

@stop

@section('content')
 
   
  <form action="{{route('township.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="row form-group">
            <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 style="font-weight:bold;font-size:15px;">မြို့အမည်(မြန်မာ)</h6>
                                </div>

                                <div class="col-md-8 {{ $errors->first('tsh_name_mm', 'has-error') }}">

                                       <input type="text" name="tsh_name_mm" class="form-control unicode" id="tsh_name_mm" placeholder="ပျဉ်းမနား" > 
                                     @if($errors->first('tsh_name_mm'))
                                    <span class="help-block">
                                        <small>{{ $errors->first('tsh_name_mm') }}</small>
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
                                    <h6 style="font-weight:bold;font-size:15px;">မြို့အမည်(အဂ်လိပ်)</h6>
                                </div>

                                <div class="col-md-8 {{ $errors->first('tsh_name_en', 'has-error') }}">

                                       <input type="text" name="tsh_name_en" class="form-control unicode" id="tsh_name_en" placeholder="pyinmana" > 
                                     @if($errors->first('tsh_name_en'))
                                    <span class="help-block">
                                        <small>{{ $errors->first('tsh_name_en') }}</small>
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
                                    <h6 style="font-weight:bold;font-size:15px;">မြို့အမည်(အတိုကောက်)</h6>
                                </div>

                                <div class="col-md-8 {{ $errors->first('tsh_short_code', 'has-error') }}">

                                    <input type="tsh_short_code" name="tsh_short_code" class="form-control unicode" placeholder="pma" > 
                                     @if($errors->first('tsh_short_code'))
                                    <span class="help-block">
                                        <small>{{ $errors->first('tsh_short_code') }}</small>
                                    </span>
                                     @endif
                                </div>
                            </div>
              </div>
        </div>

       

        <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <a class="btn btn-primary unicode" href="{{route('township.index')}}"> Back</a>
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