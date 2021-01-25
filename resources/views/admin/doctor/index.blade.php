@extends('adminlte::page')

@section('title', 'Doctors')

@section('content_header')
    <h5 style="color: blue;">ဆရာဝန်များ</h5>
    <script src=" {{ asset('toasterjquery.js') }}" ></script>
    <link rel="stylesheet" type="text/css" href="{{asset('toasterbootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('toastermin.css')}}">
    <script type="text/javascript" src="{{asset('toastermin.js')}}"></script>
@stop
@section('content')
    <?php
        $name = isset($_GET['name'])?$_GET['name']:'';   
    ?>
        <form action="{{ route('doctor.index') }}" method="get" accept-charset="utf-8" class="form-horizontal">
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" name="name" id="name" value="{{ old('name',$name) }}" class="form-control" placeholder="Search Keyword...">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-success unicode" href="{{route('doctor.create')}}"><i class="fa fa-plus-square" /></i> Add New!</a>
                </div>
            </div>
        </form>
        <br>
    <div class="page_body">
       
        <div class="table-responsive">
            <table class="table table-bordered styled-table">
                <thead>
                <tr>
                    <th>စဉ်</th>
                     <th>ဆရာဝန်အမည်</th>
                     <th>ဘွဲ့အမည်</th> 
                     <th>ဆေးခန်းအမည်</th>
                    <th>ဖုန်းနံပါတ်</th>
                    <!-- <th>ဓါတ်ပုံ</th> -->
                    <!-- <th class="unicode">Action</th> -->
                </tr>
                </thead>
            @if(count($doctors)>0)
            @foreach($doctors as $doctor)
                <tr class="table-tr" data-url="{{ route('doctor.show',$doctor->id) }}">
                    <td>1</td>
                    <td>{{$doctor->doc_name}}</td>
                    <td>{{$doctor->doc_degree}}</td>
                    <td>{{$doctor->viewClinic->clinic_name}}</td>
                   <td>{{$doctor->doc_phone}}</td>
                   
                </tr>
           
            @endforeach
             @else
            <tr align="center">
                  <td colspan="5">No Data!</td>
            </tr>
            @endif
            </table>
            <div align="center">
                <p>Total - {{$count}}</p>
          </div>
       </div>
        {!! $doctors->links() !!}
    </div>
@stop 

@section('css')
 
@stop

@section('js')
    <script> 
         @if(Session::has('success'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('success') }}");
        @endif
        $(document).ready(function(){
            setTimeout(function(){
            $("div.alert").remove();
            }, 1000 ); 
            $(function() {
                $('#name').on('change',function(e) {
                this.form.submit();
               // $( "#form_id" )[0].submit();   
            }); 
        });
            $(function() {
              $('table').on("click", "tr.table-tr", function() {
                window.location = $(this).data("url");
              });
            });
        });
     </script>
@stop