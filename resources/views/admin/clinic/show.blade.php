@extends('adminlte::page')

@section('title', 'Customer')

@section('content_header')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
<div class="row">
        <div class="col-lg-9">
             <a class="btn btn-success unicode" href="{{route('clinic.index')}}"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="col-lg-3">
            <div class="pull-right">
              <form action="{{route('clinic.destroy',$clinic->id)}}" method="POST" onsubmit="return confirm('Do you really want to delete?');">
                                <a class="text-secondary" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                                data-attr="{{ route('licence_extend',$clinic->id) }}">
                                <i class="fas fa-edit text-gray-300"></i>
                            </a>
                                @csrf
                                @method('DELETE')
                               

                                <a href="{{route('clinic.print',$clinic->id)}}" target="_blank" class="btn btn-sm btn-warning" style="margin-right: 10px;"><i class="fas fa-print"></i></a>

                                <a class="btn btn-sm btn-primary" href="{{route('clinic.edit',$clinic->id)}}"><i class="fa fa-fw fa-edit" /></i></a>

                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash" /></i></button> 
                            </form>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
    
    </div>
    <br>
    <div class="tabs">
        <div class="tabby-tab" style="margin-right: 5px;">
            <input type="radio" id="tab-1" name="tabby-tabs" checked >
            <label for="tab-1">လုပ်ငန်းအမည်</label>
            <div class="tabby-content">
                  
        <div class="table-responsive">
                <table class="table table-bordered styled-table">
                    <thead>
                    <tr>
                         <th>လုပ်ငန်းအမည်</th>
                         <th>မြို့နယ်</th> 
                         
                        <th>လိုင်စင်အမျိုးအစား</th>
                        <th>လိုင်စင်ခွဲ</th>
                        <th>လိုင်စင်နံပါတ်</th>
                        <th>စတင်ခွင့်ပြုသည့်ရက်စွဲ</th>
                        <th>သက်တမ်းကာလ</th>
                        <th>သက်တမ်းကုန်ဆုံးသည့်ရက်စွဲ</th>
                    </tr>
                    </thead>
                @if(count($histories)>0)
                @foreach($histories as $history)
                    <tr>
                        
                        <td>{{$history->viewClinic->clinic_name}}</td>
                        <td>{{$history->viewTownship->tsh_name_mm}}</td>
                       
                       <td>{{$history->viewLicenceType->lic_name}}</td>
                       <td>{{$history->viewSubLicence->sub_lic_name}}</td>
                       <td>{{$history->lic_no}}</td>
                       <td>{{$history->issue_date}}</td>
                       <td>{{$history->duration}}</td>
                       <td>{{$history->expire_date}}</td>
                    </tr>
                @endforeach
                 @else
                <tr align="center">
                      <td colspan="8">No Data!</td>
                </tr>
                @endif
                </table>
            <div align="center">
                <p style="color: black;">Total - {{$count}}</p>
          </div>
       </div>  
            </div>
        </div>
        <div class="tabby-tab" style="margin-right: 5px;">
            <input type="radio" id="tab-2" name="tabby-tabs">
            <label for="tab-2">ပိုင်ရှင်အမည်</label>
            <div class="tabby-content">
                 <div class="row">
                 <div class="col-md-10">
                   <div class="row">
                       <h6 style="font-size:15px;" class="col-md-2">ပိုင်ရှင်အမည်*</h6>
                        <div class="col-md-7 {{ $errors->first('owner_name', 'has-error') }}">
                            
                            <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name',$clinic->owner) }}" class="form-control unicode" placeholder="ဦးမောင်မောင်" readonly="readonly">
                         
                        </div>    
                   </div><br>
                   <div class="row">
                        <h6 style="font-size:15px;" class="col-md-2">ဖုန်းနံပါတ်*</h6>
                        <div class="col-md-7 {{ $errors->first('ph_no', 'has-error') }}">
                            
                            <input type="number" name="ph_no" id="ph_no" value="{{ old('ph_no',$clinic->phone) }}" class="form-control unicode" placeholder="09987656787" readonly="readonly">
                         
                        </div> 
                    </div><br>
                    <div class="row">
                        <h6 style="font-size:15px;" class="col-md-2">မှတ်ပုံတင်နံပါတ်*</h6>
                        <div class="col-md-7 {{ $errors->first('nrc', 'has-error') }}">
                            
                            <input type="text" name="nrc" id="nrc" value="{{ old('nrc',$clinic->nrc) }}" class="form-control unicode" placeholder="9/PAMANA(N)111111" readonly="readonly">
                         
                        </div>
                    </div><br>
                    
                    <div class="row">
                        <h6 style="font-size:15px;" class="col-md-2">နေရပ်လိပ်စာ*</h6>
                        <div class="col-md-7 {{ $errors->first('owner_address', 'has-error') }}">
                            
                            <textarea name="owner_address" class="form-control" placeholder="ပျဉ်းမနား" id="owner_address" readonly="readonly">{{$clinic->address}}</textarea>
                            {!! $errors->first('owner_address', '<span class="error_msg unicode">:message</span> ') !!}
                         
                        </div> 
                    </div><br>
                    <div class="row">
                        <h6 style="font-size:15px;" class="col-md-2">ပိုင်ရှင် ဓါတ်ပုံ*</h6>
                        <div class="col-md-7 {{ $errors->first('owner_photo', 'has-error') }}">
                            <img src="{{ asset($clinic->path.$clinic->owner_photo) }}" alt="photo" width="200px">
                            <!-- <input type="file" name="owner_photo" id="owner_photo" value="{{ old('owner_photo') }}" class="form-control unicode"> -->
                         
                        </div>
                    </div>
                 </div>
                 <div class="col-md-2">
                   
                 </div>
               </div>
            </div>
        </div>

        <div class="tabby-tab" style="margin-right: 5px;">
            <input type="radio" id="tab-3" name="tabby-tabs">
            <label for="tab-3">လုပ်ငန်းပုံ</label>
            <div class="tabby-content">
              <div class="row">
                  @foreach ($clinic_photos as $image)
                                <div class="col-md-4">
                                    <img src="{{ asset( $image->path .'/' . $image->clinic_photo) }}" alt="image"
                                                width="200px">
                                </div>

                                <br>
                        @endforeach
              </div>
            </div>
        </div>
        <div class="tabby-tab" style="margin-right: 5px;">
            <input type="radio" id="tab-4" name="tabby-tabs">
            <label for="tab-4">ဆရာဝန်များ</label>
            <div class="tabby-content">
              <div class="table-responsive">
                <table class="table table-bordered styled-table">
                    <thead>
                    <tr>
                         <th>ဆရာဝန်အမည်</th>
                         <th>ဘွဲ့အမည်</th> 
                        <th>ဖုန်းနံပါတ်</th>
                        <th>နေရပ်လိပ်စာ</th>
                    </tr>
                    </thead>
                @if(count($doctors)>0)
                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{$doctor->doc_name}}</td>
                        <td>{{$doctor->doc_degree}}</td>
                       <td>{{$doctor->doc_phone}}</td>
                       <td>{{$doctor->doc_address}}</td>
                    </tr>
                @endforeach
                 @else
                <tr align="center">
                      <td colspan="5">No Data!</td>
                </tr>
                @endif
                </table>
            <div align="center">
                <p style="color: black;">Total - 1</p>
          </div>
       </div>
            </div>
        </div>
    

    </div>
    <div class="modal fade" id="mediumModal" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="mediumBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop 



@section('css')

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

            
</style>
@stop



@section('js')
    <script src=" {{ asset('js/business/moment.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).on('click', '#mediumButton', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            alert(href);
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#mediumModal').modal("show");
                    $('#mediumBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                // error: function(jqXHR, testStatus, error) {
                //     console.log(error);
                //     alert("Page " + href + " cannot open. Error:" + error);
                //     $('#loader').hide();
                // },
                timeout: 8000
            })
        });
        $(function() {
              $('table').on("click", "tr.table-tr", function() {
                window.location = $(this).data("url");
              });
            });
    </script>
        
@stop 
