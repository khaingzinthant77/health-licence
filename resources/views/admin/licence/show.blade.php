@extends('adminlte::page')

@section('title', 'Township')

@section('content_header')

@stop

@section('content')
 

    <div>
        <a class="btn btn-success unicode" href="{{route('licence.index')}}"> Back</a>
    </div><br>
        <div class="row form-group">
            <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 style="font-weight:bold;font-size:15px;">လိုင်စင်အမည်</h6>
                                </div>

                                <div class="col-md-8">

                                       <input type="text" name="lic_name" class="form-control unicode" id="lic_name" value="{{$licences->lic_name}}" readonly> 

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

                                       <input type="text" name="short_name" class="form-control unicode" id="short_name" value="{{$licences->short_name}}" readonly> 

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

                                <div class="col-md-8">

                                    <input type="rule_no" name="rule_no" class="form-control unicode" value="{{$licences->rule_no}}" readonly > 

                                </div>
                            </div>
              </div>
        </div>

@stop 



@section('css')

@stop



@section('js')
<script type="text/javascript" src="{{ asset('jquery-ui.js') }}"></script>
<script type="text/javascript">

</script>
@stop