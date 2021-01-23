<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="XL1LTaGOrRdrf1QmXiesCB25nAWG5NaXcncrTmpz">

    <title></title>
    <link rel="stylesheet" href='https://mmwebfonts.comquas.com/fonts/?font=pyidaungsu' />


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
        
   

    img {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    .groove {
        border-radius: 10px;
        border-style: groove;
        height: auto;
    }

    #logo {
        width: 100px;
        height: 100px;
    }

    #logo1 {
        width: 190px;
        height: 190px;
        margin:auto;
    }

    #tick {
        width: 190px;
        height: 190px;
    }

    .title {
        text-align: center;
        font-size: 18px;
    }

    .space {
        padding-left: 35px;
        padding-right: 35px;
    }

    .row {
        letter-spacing: .5px;
    }

    .main-footer {
        display: none !important;
    }

    #banner {
    height: 100px;
    /*width: 100%;*/
    /*padding-bottom: 10px;*/
    /*background-color: red;*/
    }

    
    
    th, td {
      border: 1px solid black;
    }
    .styled-table {
    border-collapse: collapse;
    /*margin: 25px 0;*/
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    /*box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);*/
    }
    .styled-table thead tr {
        /*background-color: #009879;
        color: #ffffff;*/
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
    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }*/
        .container {
            position: relative;
            z-index: 1;
          }
        .bg {
            visibility: visible;
            position: absolute;
            z-index: -1;
            bottom: 0;
            left: 0;
            right: 0;
            background: url({{asset('linn.jpg')}}) center center;
            opacity: .3;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 1000px 400px;
          }

          @page {
            size:A4;
            margin-left: 0px;
            margin-right: 0px;
            margin-top: 0px;
            margin-bottom: 0px;
            margin: 0;
            -webkit-print-color-adjust: exact;
        }

        #header label{
            display: block;
            text-align: center;
        }
        #img-container {
        text-align: center;
        display: block;
        /*margin-top: 10px;*/
      }
   
    </style>

</head>

<body>
    <div style="margin: 30px;">
        <div class="row" >
           <div class="col-md-3">
           </div>
           <div class="col-md-7" id="header">
                <label style="font-size: 20px">ပြည်ထောင်စုသမ္မတမြန်မာနိုင်ငံတော်အစိုးရ</label>
                <label style="font-size: 20px">ကျန်းမာရေးနှင့်အားကစားဝန်ကြီးဌာန</label>
                <label style="font-size: 20px">ပုဂ္ဂလိကကျန်းမာရေးဆိုင်ရာကြီးကြပ်ရေးကော်မတီ</label>
           </div>
           <div class="col-md-2">
               <input type="text" name="" style="width: 100px;height: 100px;margin-top: 20px;margin-left: 30px;">

           </div>
       </div>
       <div class="row" id="img-container">
           <img src="{{ asset('./icon.png') }}" alt="image" width="100px"><br>
           <label style="font-size: 18px;">*ပုဂ္ဂလိက{{$clinic_history->viewLicenceType->lic_name}}လုပ်ငန်းလိုင်စင်*</label>
       </div>
       <div style="margin-top: 20px;margin-left: 70px;">
           <label style="font-size: 18px;margin-left: 40px;">ပုဂ္ဂလိကကျန်းမာရေးလုပ်ငန်းဆိုင်ရာ နည်းဥအဒေ {{$clinic_history->viewLicenceType->rule_no}} နည်းဥပဒေခွဲ(ခ)အရ ဖော်ပြပါ</label><br>
           <label style="font-size: 18px;">ပုဂ္ဂိုအား ပြည်ထောင်စုနယ်မြေ၊ နေပြည်တော်၊ <span
                        style="text-decoration: underline;">{{$clinic_history->viewTownship->tsh_name_mm}} {{$clinic->address}}</span> တွင် {{$clinic->clinic_name}} အမည်ပါ {{$clinic_history->viewSubLicence->sub_lic_name}} လုပ်ငန်းအား လုပ်ကိုင်ခွင့်ပြု၍  ဤလုပ်ငန်းလိုင်စင်ကို ထုတ်ပေးလိုက်သည်။</label>
       </div>
       <div>
           <p style="text-align: center;font-size: 18px;">လိုင်စင်ခွင့်ပြုချက်ရရှိသူ</p>
           <div class="row">
           <div class="table-responsive">
                <table class="table table-bordered styled-table" style="margin-left: 80px;">
                    <tr>
                         <th style="width: 100px;">အမည်</th>
                         <th>နိုင်ငံသားစိစစ်ရေးကဒ်အမှတ်</th> 
                        <th style="width: 230px;">နေရပ်လိပ်စာ</th>
                    </tr>
                    <tr style="height: 80px;">
                        <td>{{$clinic->owner}}</td>
                        <td>{{$clinic->nrc}}</td>
                       <td>{{$clinic_history->viewTownship->tsh_name_mm}} ၊ {{$clinic->address}}</td>
                    </tr>
                </table>
       </div>
           </div>
             
       </div>
       <div class="row" style="margin-top: 20px;margin-left: 70px;">
           <div class="col-md-4">
               <label style="font-size: 18px;">လိုင်စင်အမှတ်</label>
           </div>
           <div>
               <label style="font-size: 18px;">{{$clinic_history->lic_no}}</label>
           </div>
       </div>
       <div class="row" style="margin-left: 70px;">
           <div class="col-md-4">
               <label style="font-size: 18px;">စတင်ခွင့်ပြုသည့်ရက်စွဲ</label>
           </div>
           <div>
               <label style="font-size: 18px;">{{date('d-m-Y',strtotime($clinic_history->issue_date))}}</label>
           </div>
       </div>
       <div class="row" style="margin-left: 70px;">
           <div class="col-md-4">
               <label style="font-size: 18px;">သက်တမ်းကာလ</label>
           </div>
           <div>
               <label style="font-size: 18px;">{{$clinic_history->duration}}</label>
           </div>
       </div>
       <div class="row" style="margin-left: 70px;">
           <div class="col-md-4">
               <label style="font-size: 18px;">သက်တမ်းကုန်ဆုံးသည့်ရက်စွဲ</label>
           </div>
           <div>
               <label style="font-size: 18px;">{{date('d-m-Y',strtotime($clinic_history->expire_date))}}</label>
           </div>
       </div>
       <div class="row" style="width: 100%">
           <div class="col-md-3" align="right" style="margin-top: 20px;">
               <!-- <input type="text" name="" style="width: 100px;height: 100px;margin-top: 20px;margin-left: 70px;"> -->
               {!! QrCode::size(100)->generate(URL::to('/').'/'.$hashids); !!}
           </div>
           <div class="col-md-9" id="header" style="margin-top: 50px;width: 75%;">
               <label style="font-size: 18px;">အတွင်းရေးမှူး</label>
               <label style="font-size: 18px;">နေပြည်တော်ပုဂ္ဂလိကကျန်းမာရေးဆိုင်ရာကြီးကြပ်ရေးကော်မတီ</label>
               <label style="font-size: 18px;">ပြည်ထောင်စုနယ်မြေ၊နေပြည်တော်</label>
           </div>
       </div>
       <div class="row" style="margin-top: 20px;">
           <label style="font-size: 14px;">(သက်တမ်းတိုးလျှောက်ထားလိုပါက လိုင်စင်သက်တမ်းမကုန်ဆုံးမီ အနည်းဆုံး ရက်ပေါင်း ၆၀ ကြိုတင်၍ လျှောက်ထားရမည်။)</label>
       </div>
       <div style="margin-top: 30px;">
           <label style="font-size: 14px;">Private Health Business Licence</label>
       </div>
    <script>
    window.print();
    </script>
    </div>
       

</body>

</html>