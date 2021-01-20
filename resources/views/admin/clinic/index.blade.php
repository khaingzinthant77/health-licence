@extends('adminlte::page')

@section('title', 'Clinic')

@section('content_header')
    <h5 style="color: blue;">ဆေးခန်းများ</h5>
@stop
@section('content')
    <?php
        $name = isset($_GET['name'])?$_GET['name']:'';   
    ?>
        <form action="{{ route('clinic.index') }}" method="get" accept-charset="utf-8" class="form-horizontal">
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" name="name" id="name" value="{{ old('name',$name) }}" class="form-control" placeholder="Name">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-success unicode" href="{{route('clinic.create')}}"><i class="fa fa-plus-square" /></i> Add New!</a>
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
                     <th>ဆေးခန်းအမည်</th>
                     <th>ဆေးခန်း တည်နေရာ</th> 
                     <th>ပိုင်ရှင်အမည်</th>
                    <th>ဖုန်းနံပါတ်</th>
                    <!-- <th>ဓါတ်ပုံ</th> -->
                    <!-- <th class="unicode">Action</th> -->
                </tr>
                </thead>
            @if(count($clinics)>0)
            @foreach($clinics as $clinic)
                <tr class="table-tr" data-url="{{ route('clinic.show',$clinic->id) }}">
                    <td class="unicode">1</td>
                    <td class="unicode">{{$clinic->clinic_name}}</td>
                    <td>{{$clinic->clinic_address}}</td>
                    <td class="unicode">{{$clinic->owner}}</td>
                   <td>{{$clinic->phone}}</td>
                   <!-- <td>
                       <img src="{{ asset($clinic->path.$clinic->owner_photo) }}" alt="photo" width="100px">
                   </td> -->
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
        {{ $clinics->appends(request()->input())->links()}}
    </div>
@stop 

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style type="text/css">
        tr:hover td {
        background: #c7d4dd !important;
   }
     tr {
        cursor: pointer;
    }
    .styled-table {
    border-collapse: collapse;
    /*margin: 25px 0;*/
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }
    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }
/*
    .styled-table tbody tr:nth-of-type(even) {
        background-color: #c7d4dd;
    }*/

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }
    </style>
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