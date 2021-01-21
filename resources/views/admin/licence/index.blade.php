@extends('adminlte::page')

@section('title', 'Licence')

@section('content_header')
    <h5 style="color: blue;">လိုင်စင်များ</h5>
@stop
@section('content')
    <?php
        $name = isset($_GET['name'])?$_GET['name']:'';   
    ?>
        <form action="{{ route('licence.index') }}" method="get" accept-charset="utf-8" class="form-horizontal">
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" name="name" id="name" value="{{ old('name',$name) }}" class="form-control" placeholder="ရှာရန်">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-success unicode" href="{{route('licence.create')}}"><i class="fa fa-plus-square" /></i> Add New!</a>
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
                     <th>လိုင်စင်အမည်</th>
                     <th>လိုင်စင်အမည်(အတိုကောက်)</th>
                    <th>စည်းမျဉ်းနံပါတ်</th>
                    <th>လုပ်ဆောင်ချက်</th>
                    <!-- <th class="unicode">Action</th> -->
                </tr>
                </thead>
                @if($licences->count()>0)
                 @foreach($licences as $licence)
                <tr class="table-tr" data-url="">
                    <td class="unicode">{{++$i}}</td>
                    <td class="unicode">{{$licence->lic_name}}</td>
                    <td class="unicode">{{$licence->short_name}}</td>
                   <td>{{$licence->rule_no}}</td>
                     <td>
                  <form action="{{route('licence.destroy',$licence->id)}}" method="POST" onsubmit="return confirm('Do you really want to delete?');">
                    @csrf
                    @method('DELETE')
                      <a class="btn btn-sm btn-info" href="{{route('licence.show',$licence->id)}}"><i class="fa fa-fw fa-eye" /></i></a> 
                    <a class="btn btn-sm btn-primary" href="{{route('licence.edit',$licence->id)}}" ><i class="fa fa-fw fa-edit" /></i></a> 
                     <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash" /></i></button> 
                   </form>
                </td>
                </tr>
                 @endforeach
               @else
                <tr align="center">
                  <td colspan="10">No Data!</td>
                </tr>
              @endif
            </table>
            <div align="center">
                <p>Total - {{$count}}</p>
          </div>
       </div>
          {{ $licences->appends(request()->input())->links()}}
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