@extends('adminlte::page')

@section('title', 'Township')

@section('content_header')

@stop

@section('content')
 
   
  <form action="{{route('township.update',$townships->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row form-group">
            <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 style="font-weight:bold;font-size:15px;">မြို့အမည်(မြန်မာ)</h6>
                                </div>

                                <div class="col-md-8">

                                       <input type="text" name="tsh_name_mm" class="form-control unicode" id="tsh_name_mm" placeholder="ပျဉ်းမနား" value="{{$townships->tsh_name_mm}}" > 

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

                                       <input type="text" name="tsh_name_en" class="form-control unicode" id="tsh_name_en" placeholder="pyinmana" value="{{$townships->tsh_name_en}}"> 

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

                                    <input type="tsh_short_code" name="tsh_short_code" class="form-control unicode" placeholder="pma" value="{{$townships->tsh_short_code}}"> 

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

@stop



@section('js')
<script type="text/javascript" src="{{ asset('jquery-ui.js') }}"></script>
<script type="text/javascript">

</script>
@stop