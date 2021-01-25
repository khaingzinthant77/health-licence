@extends('adminlte::page')

@section('title', 'ကျန်းမာရေးလုပ်ငန်းများ')

@section('content_header')
    <h5 style="color: blue;">ကျန်းမာရေးလုပ်ငန်းများ</h5>
    <script src=" {{ asset('toasterjquery.js') }}" ></script>
    <link rel="stylesheet" type="text/css" href="{{asset('toasterbootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('toastermin.css')}}">
    <script type="text/javascript" src="{{asset('toastermin.js')}}"></script>
@stop
@section('content')
    <?php
        $name = isset($_GET['name'])?$_GET['name']:'';
        $tsh_id = isset($_GET['tsh_id'])?$_GET['tsh_id']:''; 
        $check_valid = isset($_GET['check_valid'])?$_GET['check_valid']:'';    
    ?>
        <form action="{{ route('clinic.index') }}" method="get" accept-charset="utf-8" class="form-horizontal">
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-2">
                            <p style="font-size: 12px;">Search by keyword</p>
                            <input type="text" name="name" id="name" value="{{ old('name',$name) }}" class="form-control" placeholder="Search Keyword...">
                        </div>
                        @if(auth()->user()->tsh_id == null)
                        <div class="col-md-2">
                            <p style="font-size: 12px;">Select Township</p>
                            <select class="form-control" name="tsh_id" id="tsh_id">
                                <option value="">All</option>
                                @foreach($townships as $township)
                                <option value="{{$township->id}}" {{ ($tsh_id == $township->id)?'selected':'' }}>{{$township->tsh_name_mm}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="col-md-3">
                            <p style="font-size: 12px;">Search by Licence Expire</p>
                       <select name="check_valid" class="form-control" id="check_valid">
                        
                           <option value="">All</option>
                           <option value="1" {{ ($check_valid=='1')?'selected':'' }} >သက်တမ်းရှိလိုင်စင်</option>
                           <option value="2" {{ ($check_valid=='2')?'selected':'' }} >သက်တမ်းကုန်မည့်လိုင်စင်</option>
                           <option value="3" {{ ($check_valid=='3')?'selected':'' }} >သက်တမ်းကုန်သည့်လိုင်စင်</option>
                           <!-- <option value="4" {{ ($check_valid=='4')?'selected':'' }} >စီစစ်နေဆဲယာဉ်</option> -->
                       </select>
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
                    <th>မြို့နယ်များ</th>  
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
            <?php 
                        $now = time(); // or your date as well
                        // @foreach($employee->viewSalary as $salary)
                        // foreach ($clinic->viewHistory as $key => $history) {
                        //    $expdate = strtotime($history->expire_date);
                        // }
                        $expdate = strtotime($clinic->expire_date);
                        $datediff = $expdate - $now;
                        $days = round($datediff / (60 * 60 * 24));

                        $expired = $now - $expdate;
                        $expireddate = round($datediff / (60 * 60 * 24));
                ?>

                <tr class="table-tr" data-url="{{ route('clinic.show',$clinic->id) }}" @if($days<60 && $days>0) style="color:#f39c13;" @elseif($expireddate<0) style="color:red;"  @endif>
                    <td>{{++$i}}</td>
                   
                    <td>{{$clinic->viewTownship ? $clinic->viewTownship->tsh_name_mm : ''}}</td>
                    
                    <td>{{$clinic->clinic_name}}</td>
                    <td>{{$clinic->clinic_address}}</td>
                    <td>{{$clinic->owner}}</td>
                   <td>{{$clinic->phone}}</td>
                   <!-- <td>
                       <img src="{{ asset($clinic->path.$clinic->owner_photo) }}" alt="photo" width="100px">
                   </td> -->
                </tr>
           
            @endforeach
             @else
            <tr align="center">
                  <td colspan="6">No Data!</td>
            </tr>
            @endif
            </table>
            <div align="center">
                <p>Total - {{$count}}</p>
          </div>
          {!! $clinics->links() !!}
       </div>
       
        
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
        
        @if(Session::has('error'))
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
                toastr.error("{{ session('error') }}");
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
            $("#check_valid").on('change',function(e){
                    this.form.submit();
                });
        });
     </script>
@stop