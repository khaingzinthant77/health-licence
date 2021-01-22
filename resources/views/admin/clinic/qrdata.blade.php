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
                
                <h4 class="unicode" style="font-style: bold !important; color:#2c0499;" >ပြည်ထောင်စုသမ္မတမြန်မာနိုင်ငံတော်အစိုးရ</h4>
                <h4 style=" color:#2c0499;">ကျန်းမာရေးနှင့်အားကစားဝန်ကြီးဌာန</h4>
                <h4 style=" color:#2c0499;">ပုဂ္ဂလိကကျန်းမာရေးဆိုင်ရာကြီးကြပ်ရေးကော်မတီ</h4>
            </div>
              <br>

            <div class="row">
       
             
                <div class="col-md-12 col-sm-12">
                    <table class="table table-bordered" style=" margin-right: auto; margin-left: auto;">
                              <tbody>
                                <tr>
                                  <th scope="row" style="text-align: left;">လုပ်ငန်းအမည်</th>
                                  <td>{{$clinic->clinic_name}}</td>
                                  
                                </tr>
                                 <tr>
                                  <th scope="row" style="text-align: left;">လုပ်ငန်းတည်နေရာ</th>
                                  <td>{{$clinic_history->viewTownship->tsh_name_mm}}၊ {{$clinic->clinic_address}}</td>
                                  
                                </tr>
                                <tr>
                                  <th scope="row" style="text-align: left;">လိုင်စင်အမျိုးအစား</th>
                                  <td>
                                    {{$clinic_history->viewLicenceType->lic_name}}
                                </td>
                                  
                                </tr>

                                <tr>
                                  
                                  <th scope="row" style="text-align: left;">လိုင်စင်ခွဲ</th>
                                  
                                 
                                  <td>
                                    {{$clinic_history->viewSubLicence->sub_lic_name}}
                                  </td>
                                  
                                  
                                </tr>

                                <tr>
                                  <th scope="row" style="text-align: left;">လိုင်စင်နံပါတ်</th>
                                  <td>
                                    {{$clinic_history->lic_no}}
                                  </td>
                                  
                                </tr>
                                
      
                                <tr>
                                  <th scope="row" style="text-align: left;">စတင်ခွင့်ပြုသည့်ရက်စွဲ</th>
                                  <td>{{date('d-m-Y',strtotime($clinic_history->issue_date))}}</td>
                                  
                                </tr>
                                <tr>
                                  <th scope="row" style="text-align: left;">သက်တမ်းကာလ</th>
                                  <td> 
                                       {{$clinic_history->duration}}
                                       
                                    </td>
                                  
                                </tr>
                                <tr>
                                  <th scope="row" style="text-align: left;">သက်တမ်းကုန်ဆုံးသည့်ရက်စွဲ</th>
                                  <td> 
                                    {{date('d-m-Y',strtotime($clinic_history->expire_date))}}
                                </td>
                                  
                                </tr>
                                 <tr>
                                  <th scope="row" style="text-align: left;">ဆရာဝန်များ</th>
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
                                 <tr>
                                  <th scope="row" style="text-align: left;">လုပ်ငန်းပုံ</th>
                                  <td>
                                    @foreach ($clinic_photos as $image)
                                    <div class="col-md-4">
                                        <img src="{{ asset( $image->path .'/' . $image->clinic_photo) }}" alt="image"
                                                    width="100px">
                                    </div>
                                      <br>
                                    @endforeach
                              </td>
                                  
                                </tr>
                              </tbody>
                    </table>
                </div>
              
            </div>
  </div>


</body>
</html>
