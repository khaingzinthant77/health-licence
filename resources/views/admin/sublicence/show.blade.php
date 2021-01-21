@extends('adminlte::page')

@section('title', 'SubLicence')

@section('content_header')

@stop

@section('content')
 
    <div>
        <a class="btn btn-success unicode" href="{{route('sublicence.index')}}"> Back</a>
    </div><br>
        <div class="row form-group">
            <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 style="font-weight:bold;font-size:15px;">ရောဂါရှာဖွေရေးအမည်</h6>
                                </div>

                                <div class="col-md-8">

                                       <input type="text" name="sub_lic_name" class="form-control unicode" id="sub_lic_name" value="{{$sublicences->sub_lic_name}}" readonly > 

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

                                <div class="col-md-8">

                                       <input type="text" name="sub_lic_short" class="form-control unicode" id="sub_lic_short" value="{{$sublicences->sub_lic_short}}" readonly> 

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