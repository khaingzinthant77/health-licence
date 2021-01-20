@extends('adminlte::page')

@section('title', 'Licence')

@section('content_header')

@stop

@section('content')
 
   
  <form action="{{route('licence.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="row form-group">
            <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 style="font-weight:bold;font-size:15px;">လိုင်စင်အမည်</h6>
                                </div>

                                <div class="col-md-8 {{ $errors->first('lic_name', 'has-error') }}">

                                       <input type="text" name="lic_name" class="form-control unicode" id="lic_name"  >
                                    @if($errors->first('lic_name'))
                                    <span class="help-block">
                                        <small>{{ $errors->first('lic_name') }}</small>
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
                                    <h6 style="font-weight:bold;font-size:15px;">လိုင်စင်အမည်(အတိုကောက်)</h6>
                                </div>

                                <div class="col-md-8 {{ $errors->first('short_name', 'has-error') }}">

                                       <input type="text" name="short_name" class="form-control unicode" id="short_name" > 
                                     @if($errors->first('short_name'))
                                    <span class="help-block">
                                        <small>{{ $errors->first('short_name') }}</small>
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
                                    <h6 style="font-weight:bold;font-size:15px;">စည်းမျဉ်းနံပါတ်</h6>
                                </div>

                                <div class="col-md-8 {{ $errors->first('rule_no', 'has-error') }}">

                                    <input type="rule_no" name="rule_no" class="form-control unicode"  > 
                                     @if($errors->first('rule_no'))
                                    <span class="help-block">
                                        <small>{{ $errors->first('rule_no') }}</small>
                                    </span>
                                     @endif

                                </div>
                            </div>
              </div>
        </div>

       

        <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <a class="btn btn-primary unicode" href="{{route('licence.index')}}"> Back</a>
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