<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>နေပြည်တော်ကုသရေးနှင့် ပြည်သူ့ကျန်းမာရေးဦးစီးဌာန</title>
    <link rel="icon" href="{{ asset('icon.png') }}" type="image/png">

  <link rel="stylesheet" href="{{ asset('css/bootstrap-3.min.css') }}">

  <link rel="stylesheet" href='https://mmwebfonts.comquas.com/fonts/?font=pyidaungsu' />

    <style type="text/css" media="screen">
        body{
            font-family:Pyidaungsu,Yunghkio,'Masterpiece Uni Sans' !important;
        }
        .unicode{
            font-family:Pyidaungsu,Yunghkio,'Masterpiece Uni Sans' !important;
        }
        .active>.nav-link {
            color: #82daa7 !important;
        }
        .active {
            color: #82daa7 !important;
        }
        label{
          font-weight: bold;
          color: black;
        }
        img {
          border-radius: 5px;
          cursor: pointer;
          transition: 0.3s;
        }
        table, td, th {  
              border: 1px solid #ddd;
              text-align: left;
            }

            table {
              border-collapse: collapse;
              width: 100%;
            }

            th, td {
              padding: 15px;
            }
    </style>
</head>
<body>
    <?php 
        $mm_num = ['၀','၁', '၂', '၃', '၄', '၅', '၆','၇','၈','၉'];
        $en_num = range(0, 9);

    ?>

  <div class="container">
            <div align="center">
                <br>
                <img src="{{ asset('icon.png') }}" width="100">
                <br><br>
                <label class="unicode" style="font-style: bold !important; color:#2c0499;">ပြည်ထောင်စုသမ္မတမြန်မာနိုင်ငံတော်အစိုးရ</label><br>
                <label style=" color:#2c0499;">ကျန်းမာရေးနှင့်အားကစားဝန်ကြီးဌာန</label><br>
                <label style=" color:#2c0499;">ပုဂ္ဂလိကကျန်းမာရေးဆိုင်ရာကြီးကြပ်ရေးကော်မတီ</label>
            </div>
              <br>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <table style="width:100%">
                      <tr style="background-color: #009879; color: #ffffff; text-align: left;">
                        <th>လုပ်ငန်းအချက်အလက်များ</th>
                        <th>ပိုင်ရှင်အချက်အလက်များ</th> 
                        <th>လုပ်ငန်းပုံ</th>
                        <th>ဆရာဝန်များ</th>
                      </tr>
                      <tr>
                        <td>
                            <div class="row">
                                <label style="margin-right: 100px;">လုပ်ငန်းအမည်</label>
                                <label>{{$clinic->clinic_name}}</label>
                            </div><br>
                            <div class="row">
                                <label style="margin-right: 70px;">လုပ်ငန်းတည်နေရာ</label>
                                <label>{{$clinic_history->viewTownship->tsh_name_mm}}၊ {{$clinic->clinic_address}}</label>
                            </div><br>
                            <div class="row">
                                <label style="margin-right: 70px;">လိုင်စင်အမျိုးအစား</label>
                                <label>{{$clinic_history->viewLicenceType->lic_name}}</label>
                            </div><br>
                            <div class="row">
                                <label style="margin-right: 135px;">လိုင်စင်ခွဲ</label>
                                <label>{{$clinic_history->viewSubLicence->sub_lic_name}}</label>
                            </div><br>
                            <div class="row">
                                <label style="margin-right: 105px;">လိုင်စင်နံပါတ်</label>
                                <label>{{$clinic_history->lic_no}}</label>
                            </div><br>
                            <div class="row">
                                <label style="margin-right: 50px;">စတင်ခွင့်ပြုသည့်ရက်စွဲ</label>
                                <label>{{date('d-m-Y',strtotime($clinic_history->issue_date))}}</label>
                            </div><br>
                            <div class="row">
                                <label style="margin-right: 85px;">သက်တမ်းကာလ</label>
                                <label>{{$clinic_history->duration}}</label>
                            </div><br>
                            <div class="row">
                                <label style="margin-right: 10px;">သက်တမ်းကုန်ဆုံးသည့်ရက်စွဲ</label>
                                <label>{{date('d-m-Y',strtotime($clinic_history->expire_date))}}</label>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="row">
                                <label>ပိုင်ရှင်ဓါတ်ပုံ</label>
                                
                            </div><br>
                            <div>
                                <img src="{{ asset($clinic->path.$clinic->owner_photo) }}" alt="photo" width="150px">
                            </div>
                                <label style="margin-right: 70px;">ပိုင်ရှင်အမည်</label>
                                <label>{{$clinic->owner}}</label>
                            </div><br>
                            <div class="row">
                                <label style="margin-right: 90px;">ဖုန်းနံပါတ်</label>
                                <label>{{$clinic->phone}}</label>
                            </div><br>
                            <div class="row">
                                <label style="margin-right: 50px;">မှတ်ပုံတင်နံပါတ်</label>
                                <label>{{$clinic->nrc}}</label>
                            </div><br>
                            <div class="row">
                                <label style="margin-right: 70px;">နေရပ်လိပ်စာ</label>
                                <label>{{$clinic->address}}</label>
                            </div><br>
                            
                            </td>
                        <td>
                                
                            <div class="row">
                                @foreach ($clinic_photos as $image)
                                <div class="col-md-4">
                                    <img src="{{ asset( $image->path .'/' . $image->clinic_photo) }}" alt="image"
                                                width="100px">
                                </div>

                                <br>
                                @endforeach
                            </div>
                                
                            <td>
                                @if(count($doctors)>0)
                                @foreach($doctors as $doctor)
                                <div class="row">
                                    <label>ဆရာဝန်အမည်</label>
                                    <label>{{$doctor->doc_name}}</label>
                                </div><br>
                                <div class="row">
                                    <label>ဘွဲ့အမည်</label>
                                    <label>{{$doctor->doc_degree}}</label>
                                </div><br>
                                <div class="row">
                                    <label>ဖုန်းနံပါတ်</label>
                                    <label>{{$doctor->doc_phone}}</label>
                                </div><br>
                                <div class="row">
                                    <label>နေရပ်လိပ်စာ</label>
                                    <label>{{$doctor->doc_address}}</label>
                                </div><hr>
                                @endforeach
                                @endif
                            </td>
                      </tr>
                      
                    </table>
                              
                    </table>
                </div>
              
            </div>
  </div>


</body>
</html>
