<?php
  
function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}

function changeDateFormat($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d H:mm:s', $date)->format($date_format);    
}
   
function productImagePath($image_name)
{
    return public_path('images/products/'.$image_name);
}

function en_to_mm($data)
{
	$mm_num = ['၀','၁', '၂', '၃', '၄', '၅', '၆','၇','၈','၉'];
    $en_num = range(0, 9);

    return(str_replace($en_num, $mm_num, $data));
}