@extends('adminlte::page')

@section('title', 'Township')

@section('content_header')

@stop

@section('content')
 
   
  <form action="{{route('licence.update',$licences->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row form-group">
            <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 style="font-weight:bold;font-size:15px;">လိုင်စင်အမည်</h6>
                                </div>

                                <div class="col-md-8">

                                       <input type="text" name="lic_name" class="form-control unicode" id="lic_name" value="{{$licences->lic_name}}" > 

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

                                <div class="col-md-8">

                                       <input type="text" name="short_name" class="form-control unicode" id="short_name" value="{{$licences->short_name}}"> 

                                </div>
                            </div>
              </div>
        </div>

         <div class="row form-group">
        	<div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 style="font-weight:bold;font-size:15px;">နည်းဥပဒေအမှတ်</h6>
                                </div>

                                <div class="col-md-8">

                                    <input type="rule_no" name="rule_no" class="form-control unicode" value="{{$licences->rule_no}}" > 

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

@stop



@section('js')
<script type="text/javascript" src="{{ asset('jquery-ui.js') }}"></script>
<script type="text/javascript">

</script>
@stop