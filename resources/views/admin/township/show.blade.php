@extends('adminlte::page')

@section('title', 'Township')

@section('content_header')

@stop

@section('content')
 

      <div>
            <a class="btn btn-success unicode" href="{{route('township.index')}}"> Back</a>
        </div><br>
        <div class="row form-group">
            <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 style="font-weight:bold;font-size:15px;">မြို့အမည်(မြန်မာ)</h6>
                                </div>

                                <div class="col-md-8">

                                       <input type="text" name="tsh_name_mm" class="form-control unicode" id="tsh_name_mm" placeholder="ပျဉ်းမနား" value="{{$townships->tsh_name_mm}}" readonly > 

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

                                <div class="col-md-8">

                                       <input type="text" name="tsh_name_en" class="form-control unicode" id="tsh_name_en" placeholder="pyinmana" value="{{$townships->tsh_name_en}}" readonly> 

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

                                <div class="col-md-8">

                                    <input type="tsh_short_code" name="tsh_short_code" class="form-control unicode" placeholder="pma" value="{{$townships->tsh_short_code}}" readonly> 

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