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
                <!-- <div class="col-md-2">
                    <a class="btn btn-success unicode" href="{{route('clinic.create')}}"><i class="fa fa-plus-square" /></i> Add New!</a>
                </div> -->
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
                     <th>လိုင်စင်အမည်</th> 
                     <th>လိုင်စင်ခွဲ</th>
                     <th>လိုင်စင်ခွဲ (အတိုကောက်)</th>
                    <th>လိုင်စင်နံပါတ်</th>
                    <th>မြို့နယ်</th>
                    <th>သက်တမ်းကာလ</th>
                    <!-- <th>ဓါတ်ပုံ</th> -->
                    <!-- <th class="unicode">Action</th> -->
                </tr>
                </thead>
            @if(count($histories)>0)
            @foreach($histories as $history)
                <tr class="table-tr" data-url="">
                    <td>{{++$i}}</td>
                    <td>{{$history->viewClinic->clinic_name}}</td>
                    <td>{{$history->viewLicenceType->lic_name}}</td>
                    <td>{{$history->viewSubLicence->sub_lic_name}}</td>
                    <td>{{$history->viewSubLicence->sub_lic_short}}</td>
                    <td>{{$history->lic_no}}</td>
                   <td>{{$history->viewTownship->tsh_name_mm}}</td>
                    <td>{{$history->duration}}</td>
                </tr>
           
            @endforeach
             @else
            <tr align="center">
                  <td colspan="7">No Data!</td>
            </tr>
            @endif
            </table>
            <div align="center">
                <p>Total - {{$count}}</p>
          </div>
       </div>
        {{ $histories->appends(request()->input())->links()}}
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