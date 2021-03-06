@extends('adminlte::page')

@section('title', 'Township')

@section('content_header')
    <h5 style="color: blue;">မြို့နယ်များ</h5>
@stop
@section('content')
    <?php
        $name = isset($_GET['name'])?$_GET['name']:'';   
    ?>
        <form action="{{ route('township.index') }}" method="get" accept-charset="utf-8" class="form-horizontal">
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" name="name" id="name" value="{{ old('name',$name) }}" class="form-control" placeholder="ရှာရန်">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-success unicode" href="{{route('township.create')}}"><i class="fa fa-plus-square" /></i> Add New!</a>
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
                     <th>မြို့အမည်(မြန်မာ)</th>
                     <th>မြို့အမည်(အဂ်လိပ်)</th>
                    <th>မြို့အမည်(အတိုကောက်)</th>
                    <th>လုပ်ဆောင်ချက်</th>
                    <!-- <th class="unicode">Action</th> -->
                </tr>
                </thead>
                 @if($townships->count()>0)
                 @foreach($townships as $township)
                <tr class="table-tr" data-url="">
                    <td class="unicode">{{++$i}}</td>
                    <td class="unicode">{{$township->tsh_name_mm}}</td>
                    <td class="unicode">{{$township->tsh_name_en}}</td>
                   <td>{{$township->tsh_short_code}}</td>
                     <td>
                  <form action="{{route('township.destroy',$township->id)}}" method="POST" onsubmit="return confirm('Do you really want to delete?');">
                    @csrf
                    @method('DELETE')
                     <a class="btn btn-sm btn-info" href="{{route('township.show',$township->id)}}"><i class="fa fa-fw fa-eye" /></i></a> 
                    <a class="btn btn-sm btn-primary" href="{{route('township.edit',$township->id)}}" ><i class="fa fa-fw fa-edit" /></i></a> 
                     <button type="submit" class="btn btn-sm btn-danger" ><i class="fa fa-fw fa-trash" /></i></button> 
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
         {{ $townships->appends(request()->input())->links()}}
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