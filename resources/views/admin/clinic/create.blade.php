@extends('adminlte::page')

@section('title', 'Customer')

@section('content_header')
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

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #c7d4dd;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }
</style>
@stop

@section('content')
<div class="container">
    <div class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-lg-10">
             <a class="btn btn-success unicode" href="{{route('clinic.index')}}"><i class="fas fa-arrow-left"></i></a>
        </div>

    </div>
<br>
<form action="{{route('clinic.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="tabs">
        <div class="tabby-tab" style="margin-right: 5px;">
            <input type="radio" id="tab-1" name="tabby-tabs" checked >
            <label for="tab-1">လုပ်ငန်းအမည်</label>
            <div class="tabby-content">
                 <div class="row">
                   <div class="col-md-6">
                     <div class="row">
                       <div class="col-md-3">
                            <h6 style="font-size:15px;">လုပ်ငန်းအမည်*</h6>
                        </div>
                        <div class="col-md-7 {{ $errors->first('clinic_name', 'has-error') }}">
                            <input type="text" name="clinic_name" id="clinic_name" value="{{ old('clinic_name') }}" class="form-control unicode" placeholder="အထွေထွေရောဂါကုဆေးခန်း">
                         
                        </div>    
                    </div><br>

                    @if(auth()->user()->tsh_id == null)
                    <div class="row">
                      <div class="col-md-3">
                            <h6 style="font-size:15px;">မြို့နယ်*</h6>
                        </div>
                        <div class="col-md-7 {{ $errors->first('tsh_id', 'has-error') }}">
                            <select class="form-control" name="tsh_id" id="tsh_id">
                                  <option value="">မြို့နယ်</option>
                                  @foreach($townships as $township)
                                    <option value="{{$township->id}}">{{$township->tsh_name_mm}}</option>
                                  @endforeach
                            </select>
                          </div>
                    </div><br>
                    @else
                    <div class="row">
                      <div class="col-md-3">
                            <h6 style="font-size:15px;">မြို့နယ်*</h6>
                        </div>
                        <div class="col-md-7 {{ $errors->first('tsh_name', 'has-error') }}">
                            <input type="text" name="tsh_name" id="tsh_name" value="{{ old('tsh_name',$township->tsh_name_mm) }}" class="form-control unicode" readonly="readonly">
                            <input type="hidden" name="tsh_id" value="{{$township->id}}">
                          </div>
                    </div><br>
                    @endif
                    <div class="row">
                      <div class="col-md-3">
                            <h6 style="font-size:15px;">လုပ်ငန်းတည်နေရာ*</h6>
                        </div>
                        <div class="col-md-7 {{ $errors->first('clinic_address', 'has-error') }}">
                             <textarea name="clinic_address" class="form-control" placeholder="ပျဉ်းမနား" id="clinic_address"></textarea>
                            {!! $errors->first('clinic_address', '<span class="error_msg unicode">:message</span> ') !!}
                          </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-3">
                            <h6 style="font-size:15px;">လုပ်ငန်းဓါတ်ပုံ*</h6>
                        </div>
                        <div class="col-md-7 {{ $errors->first('tsh_id', 'has-error') }}">
                            <input type="file" name="clinic_photo[]" id="clinic_photo" value="{{ old('clinic_photo') }}" class="form-control unicode" multiple>
                          </div>
                    </div>

                   </div>
                   <div class="col-md-6">
                     <div class="row">
                      <div class="col-md-3">
                            <h6 style="font-size:15px;">လိုင်စင်အမျိုးအစား*</h6>
                        </div>
                        <div class="col-md-7 {{ $errors->first('licence_id', 'has-error') }}">
                            <select class="form-control" name="licence_id" id="licence_id">
                                  <option value="">လိုင်စင်အမျိုးအစား</option>
                                  @foreach($licence_types as $licence_type)
                                    <option value="{{$licence_type->id}}">{{$licence_type->lic_name}}</option>
                                  @endforeach
                            </select>
                          </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-3">
                            <h6 style="font-size:15px;">လိုင်စင်ခွဲ*</h6>
                        </div>
                        <div class="col-md-7 {{ $errors->first('sub_licences_id', 'has-error') }}">
                            <select class="form-control" name="sub_licences_id" id="sub_licences_id">
                                  <option value="">လိုင်စင်ခွဲ</option>
                                  @foreach($sub_licences as $sub_licence)
                                    <option value="{{$sub_licence->id}}">{{$sub_licence->sub_lic_name}}</option>
                                  @endforeach
                            </select>
                          </div>
                    </div><br>
                    <div class="row">
                       <div class="col-md-3">
                            <h6 style="font-size:15px;">လိုင်စင်နံပါတ်*</h6>
                        </div>
                        <div class="col-md-7 {{ $errors->first('licence_no', 'has-error') }}">
                            <input type="text" name="licence_no" id="licence_no" value="{{ old('licence_no') }}" class="form-control unicode" placeholder="၁၈">
                         
                        </div>    
                    </div><br>
                    <div class="row">
                      <div class="col-md-3">
                        <h6 style="font-size:15px;">စတင်ခွင့်ပြုသည့်ရက်စွဲ*</h6>
                      </div>
                      <div class="col-md-7 {{ $errors->first('issue_date', 'has-error') }}">
                        <input type="text" name="issue_date" id="issue_date" class="form-control unicode" placeholder="01-08-2020"
                        value="{{ old('issue_date') }}">
                      </div>
                    </div><br>
                    <div class="row">
                       <div class="col-md-3">
                            <h6 style="font-size:15px;">သက်တမ်းကာလ*</h6>
                        </div>
                        <div class="col-md-7 {{ $errors->first('duration', 'has-error') }}">
                            <input type="text" name="duration" id="duration" value="{{ old('duration') }}" class="form-control unicode" placeholder="၂နှစ်">
                         
                        </div>    
                    </div><br>
                    <div class="row">
                       <div class="col-md-3">
                            <h6 style="font-size:15px;">သက်တမ်းကုန်ဆုံးသည့်ရက်စွဲ*</h6>
                        </div>
                        <div class="col-md-7 {{ $errors->first('expire_date', 'has-error') }}">
                            <input type="text" name="expire_date" id="expire_date" class="form-control unicode" placeholder="01-08-2022" value="{{ old('expire_date') }}">
                           <!--  <div class="input-group date col-md-7">
                                <input type="text" class="form-control" value="12-02-2012" id="expire_date">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div> -->
                         
                        </div>    
                    </div><br>
                   </div>
                 </div>
                 <!-- <div> -->
                   <a class="btn btn-success unicode" id="clinic_next" style="float: right;">Next</a>
                 <!-- </div>    -->
            </div>
        </div>
        <div class="tabby-tab" style="margin-right: 5px;">
            <input type="radio" id="tab-2" name="tabby-tabs" disabled="true">
            <label for="tab-2">ပိုင်ရှင်အမည်</label>
            <div class="tabby-content">
               <div class="row">
                 <div class="col-md-10">
                   <div class="row">
                       <h6 style="font-size:15px;" class="col-md-2">ပိုင်ရှင်အမည်*</h6>
                        <div class="col-md-7 {{ $errors->first('owner_name', 'has-error') }}">
                            
                            <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name') }}" class="form-control unicode" placeholder="ဦးမောင်မောင်">
                         
                        </div>    
                   </div><br>
                   <div class="row">
                        <h6 style="font-size:15px;" class="col-md-2">ဖုန်းနံပါတ်*</h6>
                        <div class="col-md-7 {{ $errors->first('ph_no', 'has-error') }}">
                            
                            <input type="number" name="ph_no" id="ph_no" value="{{ old('ph_no') }}" class="form-control unicode" placeholder="09987656787">
                         
                        </div> 
                    </div><br>
                    <div class="row">
                        <h6 style="font-size:15px;" class="col-md-2">မှတ်ပုံတင်နံပါတ်*</h6>
                        <div class="col-md-7 {{ $errors->first('nrc', 'has-error') }}">
                            
                            <input type="text" name="nrc" id="nrc" value="{{ old('nrc') }}" class="form-control unicode" placeholder="9/PAMANA(N)111111">
                         
                        </div>
                    </div><br>
                    <div class="row">
                        <h6 style="font-size:15px;" class="col-md-2">ပိုင်ရှင် ဓါတ်ပုံ*</h6>
                        <div class="col-md-7 {{ $errors->first('owner_photo', 'has-error') }}">
                            
                            <input type="file" name="owner_photo" id="owner_photo" value="{{ old('owner_photo') }}" class="form-control unicode">
                         
                        </div>
                    </div><br>
                    <div class="row">
                        <h6 style="font-size:15px;" class="col-md-2">နေရပ်လိပ်စာ*</h6>
                        <div class="col-md-7 {{ $errors->first('owner_address', 'has-error') }}">
                            
                            <textarea name="owner_address" class="form-control" placeholder="ပျဉ်းမနား" id="owner_address"></textarea>
                            {!! $errors->first('owner_address', '<span class="error_msg unicode">:message</span> ') !!}
                         
                        </div> 
                    </div>
                 </div>
                 <div class="col-md-2">
                   
                 </div>
               </div><br>
               <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-5">
                        <!-- <a class="btn btn-primary unicode" href="" id="owner_back"> Back</a> -->
                        <a class="btn btn-primary unicode" id="owner_back">Back</a>
                        <button type="submit" class="btn btn-success unicode" id="save">Save</button>
                    </div>
            </div>
            </div>
        </div>

        <!-- <div class="tabby-tab" style="margin-right: 5px;">
            <input type="radio" id="tab-3" name="tabby-tabs">
            <label for="tab-3">SERVICE</label>
            <div class="tabby-content">
                
            </div>
        </div> -->

    </div>
</form>
@stop 



@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('bootstrap-datepicker/css/bootstrap-datepicker.css')}}">
<style>
        /* ------------------- */
        /* TEMPLATE        -- */
        /* ----------------- */

        /* @import url(https://fonts.googleapis.com/css?family=Lato:400, 700, 900, 300); */

        
        p {
            margin: 0 0 15px;
            line-height: 24px;
            color: gainsboro;
        }
        h6{
            font-size: 15px;
            color:black;
        }
        a:hover {
            color: tomato;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
        }

        /* ------------------- */
        /* PEN STYLES      -- */
        /* ----------------- */

        /* MAKE IT CUTE ----- */
        .tabs {
            position: relative;
            display: flex;
            min-height: 500px;
            border-radius: 8px 8px 0 0;
            overflow: hidden;
        }

        .tabby-tab {
            flex: 1;
        }

        .tabby-tab label {
            display: block;
            box-sizing: border-box;
            /* tab content must clear this */
            /*height: 50px;*/

            padding: 10px;
            text-align: center;
            background: #5a4080;
            cursor: pointer;
            color: white;
            transition: background 0.5s ease;
        }

        .tabby-tab label:hover {
            background: white;
            color: #5a4080;
            border-bottom:1px solid #5a4080;
        }

        .tabby-content {
            position: absolute;

            left: 0;
            bottom: 0;
            right: 0;
            /* clear the tab labels */
            top: 40px;

            padding: 20px;
            border-radius: 0 0 8px 8px;
            /* background:#efedf1; */
            /* show/hide */
            opacity: 0;
            transform: scale(0.1);
            transform-origin: top left;
            padding-bottom: 50px;
        }

        .tabby-content img {
            float: left;
            margin-right: 20px;
            border-radius: 8px;
        }
        /* MAKE IT WORK ----- */

        .tabby-tab [name="tabby-tabs"] {
            display: none;
        }
        [name="tabby-tabs"]:checked ~ label {
            background:  white;
            z-index: 2;
            color: #5a4080;
            border-bottom:1px solid #5a4080;
        }

        [name="tabby-tabs"]:checked ~ label ~ .tabby-content {
            z-index: 1;

            /* show/hide */
            opacity: 1;
            transform: scale(1);
        }


        /* BREAKPOINTS ----- */
         @media screen and (max-width: 767px) {
            .tabs {
                min-height: 400px;
            }
        }

        @media screen and (max-width: 480px) {
            .tabs {
                min-height: 580px;
            }
            .tabby-tab label {
                height: 60px;
            }
            .tabby-content {
                top: 60px;
            }
            .tabby-content img {
                float: none;
                margin-right: 0;
                margin-bottom: 20px;
            }
        } 


           #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            }

            #myImg:hover {opacity: 0.7;}

            /* The Modal (background) */
            .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: -10;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(243, 237, 237); /* Fallback color */
            background-color: rgba(221, 215, 215, 0.9); /* Black w/ opacity */
            }
            .modal1 {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 72%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(243, 237, 237); /* Fallback color */
            background-color: rgba(221, 215, 215, 0.9); /* Black w/ opacity */
            }

            /* Modal Content (image) */
            .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 595px;
            max-height:842px;
            margin-left: 22%;
            }
            .modal-content1 {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 595px;
            max-height:442px;
            margin-left: 22%;
            }

            /* Caption of Modal Image */
            #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
            }

            /* Add Animation */
            .modal-content, #caption {  
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
            }

            @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)} 
            to {-webkit-transform:scale(1)}
            }

            @keyframes zoom {
            from {transform:scale(0)} 
            to {transform:scale(1)}
            }

            /* The Close Button */
            .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: red;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            }

            .close:hover,
            .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
            }

            /* 100% Image Width on Smaller Screens */
            @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
            }

</style>
@stop



@section('js')
    <script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

    <script>
        $(function() {
              $('table').on("click", "tr.table-tr", function() {
                window.location = $(this).data("url");
              });
            });
        $("#issue_date").datepicker({ format: 'dd/mm/yyyy' });
        $("#expire_date").datepicker({ format: 'dd/mm/yyyy' });
        $("#clinic_next").click(function(){
                    // $("#tab-2").prop("checked", true);

                    var name = $("#clinic_name").val();
                    var township = $( "#tsh_id option:selected" ).text();
                    var clinic_address = $("#clinic_address").val();
                    var clinic_photo = $("#clinic_photo").val();
                    var licence_id = $("#licence_id option:selected").text();
                    var sub_licences_id = $("#sub_licences_id option:selected").text();
                    var licence_no = $("#licence_no").val();
                    var issue_date = $("#issue_date").val();
                    var duration = $("#duration").val();
                    var expire_date = $("#expire_date").val();
            
                    if (!name) {
                        $("#clinic_name").css('border-color', function(){
                            return '#f00';
                        });
                    }
                    if (township == "မြို့နယ်") {
                        $("#tsh_id").css('border-color', function(){
                            return '#f00';
                        });
                    }
                    if (!name) {
                        $("#clinic_address").css('border-color', function(){
                            return '#f00';
                        });
                    }

                    if (!clinic_photo) {
                        $("#clinic_photo").css('border-color', function(){
                            return '#f00';
                        });
                    }
                    if (licence_id == "လိုင်စင်အမျိုးအစား") {
                        $("#licence_id").css('border-color', function(){
                            return '#f00';
                        });
                    }
                    if (sub_licences_id == "လိုင်စင်ခွဲ") {
                        $("#sub_licences_id").css('border-color', function(){
                            return '#f00';
                        });
                    }
                    if (!licence_no) {
                        $("#licence_no").css('border-color', function(){
                            return '#f00';
                        });
                    }
                    if (!issue_date) {
                        $("#issue_date").css('border-color', function(){
                            return '#f00';
                        });
                    }
                    if (!duration) {
                        $("#duration").css('border-color', function(){
                            return '#f00';
                        });
                    }
                    if (!expire_date) {
                        $("#expire_date").css('border-color', function(){
                            return '#f00';
                        });
                    }

                    $('#clinic_name').on('change', function(){
                        $("#clinic_name").css('border-color', function(){
                            return '#A9A9A9';
                        });
                    });

                    $('#tsh_id').on('change', function(){
                        $("#tsh_id").css('border-color', function(){
                            return '#A9A9A9';
                        });
                    });

                    $('#clinic_address').on('change', function(){
                        $("#clinic_address").css('border-color', function(){
                            return '#A9A9A9';
                        });
                    });

                    $('#clinic_photo').on('change', function(){
                        $("#clinic_photo").css('border-color', function(){
                            return '#A9A9A9';
                        });
                    });

                    $('#licence_id').on('change', function(){
                        $("#licence_id").css('border-color', function(){
                            return '#A9A9A9';
                        });
                    });

                    $('#sub_licences_id').on('change', function(){
                        $("#sub_licences_id").css('border-color', function(){
                            return '#A9A9A9';
                        });
                    });

                    $('#licence_no').on('change', function(){
                        $("#licence_no").css('border-color', function(){
                            return '#A9A9A9';
                        });
                    });

                    $('#issue_date').on('change', function(){
                        $("#issue_date").css('border-color', function(){
                            return '#A9A9A9';
                        });
                    });

                    $('#duration').on('change', function(){
                        $("#duration").css('border-color', function(){
                            return '#A9A9A9';
                        });
                    });

                    $('#expire_date').on('change', function(){
                        $("#expire_date").css('border-color', function(){
                            return '#A9A9A9';
                        });
                    });
                    if (name && clinic_address && clinic_photo && township != "မြို့နယ်" && licence_id != "လိုင်စင်အမျိုးအစား" && sub_licences_id != "လိုင်စင်ခွဲ" && licence_no && issue_date && duration && expire_date) {
                        // alert("HI");
                        $("#tab-2").prop("checked", true);
                        
                    }
                    
                    $("#save").click(function(){

                        var owner_name = $("#owner_name").val();
                        var ph_no = $("#ph_no").val();
                        var nrc = $("#nrc").val();
                        var owner_photo = $("#owner_photo").val();
                        var owner_address = $("#owner_address").val();

                        if (!owner_name) {
                        $("#owner_name").css('border-color', function(){
                            return '#f00';
                            });
                        $("form").submit(function(e){
                            e.preventDefault();
                        });
                        }
                        if (!ph_no) {
                        $("#ph_no").css('border-color', function(){
                            return '#f00';
                            });
                        $("form").submit(function(e){
                            e.preventDefault();
                        });
                        }
                        if (!nrc) {
                        $("#nrc").css('border-color', function(){
                            return '#f00';
                            });
                        $("form").submit(function(e){
                            e.preventDefault();
                        });
                        }
                        if (!owner_photo) {
                        $("#owner_photo").css('border-color', function(){
                            return '#f00';
                            });
                        $("form").submit(function(e){
                            e.preventDefault();
                        });
                        }
                        if (!owner_address) {
                        $("#owner_address").css('border-color', function(){
                            return '#f00';
                            });
                        $("form").submit(function(e){
                            e.preventDefault();
                        });
                        }

                        if (owner_name && ph_no && nrc && owner_photo && owner_address) {
                            $('form').submit();
                            // alert("Hi");
                        }
                    });
            });
        $("#owner_back").click(function(){
           $("#tab-1").prop("checked", true);
        });
    </script>
        
@stop 
