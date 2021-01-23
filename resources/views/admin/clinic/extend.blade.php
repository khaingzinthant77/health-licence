<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="XL1LTaGOrRdrf1QmXiesCB25nAWG5NaXcncrTmpz">

    <title></title>
    <link rel="stylesheet" href='https://mmwebfonts.comquas.com/fonts/?font=pyidaungsu' />
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-datepicker/css/bootstrap-datepicker.css')}}">

    <style>
    body {
        font-family: Pyidaungsu, Yunghkio, 'Masterpiece Uni Sans' !important;
    }

    .unicode {
        font-family: Pyidaungsu, Yunghkio, 'Masterpiece Uni Sans' !important;
    }

    .row {
        letter-spacing: .5px;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -7.5px;
        margin-left: -7.5px;
    }

    .col-md-3 {
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%;
    }

    .col-md-4 {
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
    }

    .col-md-6 {
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
    }

    .col-md-8 {
        -ms-flex: 0 0 66.666667%;
        flex: 0 0 66.666667%;
        max-width: 66.666667%;
    }
        
   
    </style>

</head>

<body>
    <div class="">
      <form action="{{route('extend.store')}}" method="POST" class="form-horizontal">
        @csrf
        @method('POST')
        <div class="row">
        <div class="col-md-4">
          <h6 style="font-size:15px;">စတင်ခွင့်ပြုသည့်ရက်စွဲ*</h6>
        </div>
        <div class="col-md-7 {{ $errors->first('issue_date', 'has-error') }}">
          <input type="text" name="issue_date" id="issue_date" class="form-control unicode" placeholder="01-08-2020"
          value="{{ old('issue_date') }}">
          <input type="hidden" name="clinic_id" value="{{$clinic_history->clinic_id}}">
          <input type="hidden" name="lic_id" value="{{$clinic_history->lic_id}}">
          <input type="hidden" name="sub_lic_id" value="{{$clinic_history->sub_lic_id}}">
          <input type="hidden" name="tsh_id" value="{{$clinic_history->tsh_id}}">
          <input type="hidden" name="lic_no" value="{{$clinic_history->lic_no}}">
        </div>
      </div><br>
      <div class="row">
        <div class="col-md-4">
          <h6 style="font-size:15px;">သက်တမ်းကာလ*</h6>
        </div>
        <div class="col-md-7 {{ $errors->first('duration', 'has-error') }}">
          <input type="text" name="duration" id="duration" class="form-control unicode" placeholder="၂ နှစ်"
          value="{{ old('duration') }}">
        </div>
      </div><br>
      <div class="row">
        <div class="col-md-4">
          <h6 style="font-size:15px;">သက်တမ်းကုန်ဆုံးသည့်ရက်စွဲ*</h6>
        </div>
        <div class="col-md-7 {{ $errors->first('expire_date', 'has-error') }}">
          <input type="text" name="expire_date" id="expire_date" class="form-control unicode" placeholder="01-08-2020"
          value="{{ old('expire_date') }}">
        </div>
      </div><br>
      <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-5">
                        <!-- <a class="btn btn-primary unicode" href="" id="owner_back"> Back</a> -->
                        <!-- <a class="btn btn-primary unicode" id="owner_back">Back</a> -->
                        <button type="submit" class="btn btn-success unicode" id="save">Save</button>
                    </div>
            </div>
      </form>
      

    </div>

</body>

</html>
<script type="text/javascript">
  <script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
      $("#issue_date").datepicker({ format: 'dd/mm/yyyy' });
       $("#expire_date").datepicker({ format: 'dd/mm/yyyy' });
    </script>
</script>