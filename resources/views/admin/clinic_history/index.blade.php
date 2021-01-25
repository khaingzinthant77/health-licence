@extends('adminlte::page')

@section('title', 'Clinic')

@section('content_header')
    <h5 style="color: blue;">လိုင်စင်မှတ်တမ်းများ</h5>
@stop
@section('content')
    <?php
        $name = isset($_GET['name'])?$_GET['name']:'';
        $tsh_id = isset($_GET['tsh_id'])?$_GET['tsh_id']:'';
        $check_valid = isset($_GET['check_valid'])?$_GET['check_valid']:'';
    ?>
        <form action="{{ route('history.index') }}" method="get" accept-charset="utf-8" class="form-horizontal">
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-2">
                            <p style="font-size: 12px;">Search by keyword</p>
                            <input type="text" name="name" id="name" value="{{ old('name',$name) }}" class="form-control" placeholder="Search...">
                        </div>
                        <div class="col-md-2">
                            <p style="font-size: 12px;">Select Township</p>
                            <select class="form-control" name="tsh_id" id="tsh_id">
                                <option value="">All</option>
                                @foreach($townships as $township)
                                <option value="{{$township->id}}" {{ ($tsh_id == $township->id)?'selected':'' }}>{{$township->tsh_name_mm}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <!-- <div class="col-md-3">
                            <p style="font-size: 12px;">Search by Licence Expire</p>
                       <select name="check_valid" class="form-control" id="check_valid">
                        
                           <option value="">All</option>
                           <option value="1" {{ ($check_valid=='1')?'selected':'' }} >သက်တမ်းရှိလိုင်စင်</option>
                           <option value="2" {{ ($check_valid=='2')?'selected':'' }} >သက်တမ်းကုန်မည့်လိုင်စင်</option>
                           <option value="3" {{ ($check_valid=='3')?'selected':'' }} >သက်တမ်းကုန်သည့်လိုင်စင်</option>
                           <option value="4" {{ ($check_valid=='4')?'selected':'' }} >စီစစ်နေဆဲယာဉ်</option>
                       </select>
                    </div> -->
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
                    <th>မြို့နယ်</th>
                     <th>ဆေးခန်းအမည်</th>
                     <th>လိုင်စင်အမည်</th> 
                     <!-- <th>လိုင်စင်ခွဲ</th> -->
                    <th>လိုင်စင်နံပါတ်</th>
                    <th>စတင်ထုတ်ပေးသည့်ရက်စွဲ</th>
                    <th>သက်တမ်းကာလ</th>
                    <th>သက်တမ်းကုန်ဆုံးသည့်ရက်စွဲ</th>
                    <th>ထည့်သွင်းသည့်နေ့စွဲ</th>
                    <th>Approved By</th>
                </tr>
                </thead>
            @if(count($histories)>0)
            @foreach($histories as $history)
            
                <tr class="table-tr" >
                    <td>{{++$i}}</td>
                    <td>{{$history->tsh_name_mm}}</td>
                    <td>{{$history->clinic_name}}</td>
                    <td>{{$history->lic_name}}</td>
                    <!-- <td>{{$history->sub_lic_name}}</td> -->
                    <td>{{$history->lic_no}}</td>
                    <td>
                        {{ en_to_mm(changeDateFormate($history->issue_date,'d-m-Y') )}}
                    </td>
                    <td>{{en_to_mm($history->duration)}}</td>
                    <td>{{ en_to_mm(changeDateFormate($history->expire_date,'d-m-Y') )}}</td>
                    <?php 

                        $created_at = date('Y-m-d',strtotime($history->created_at));
                     ?>
                    <td>{{ en_to_mm(changeDateFormate($created_at,'d-m-Y') )}}</td>
                    <td>{{$history->name}}</td>
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
        {!! $histories->links() !!}
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
                $("#tsh_id").on('change',function(e){
                    this.form.submit();
                });
                $("#check_valid").on('change',function(e){
                    this.form.submit();
                });
                // check_valid
        });
            // $(function() {
            //   $('table').on("click", "tr.table-tr", function() {
            //     window.location = $(this).data("url");
            //   });
            // });
        });
     </script>
@stop