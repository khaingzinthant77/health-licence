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

                                <div class="col-md-8">

                                       <input type="text" name="lic_name" class="form-control unicode" id="lic_name"  > 

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

                                       <input type="text" name="short_name" class="form-control unicode" id="short_name" > 

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

                                    <input type="rule_no" name="rule_no" class="form-control unicode"  > 

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