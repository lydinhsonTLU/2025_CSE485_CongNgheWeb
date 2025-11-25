<?php
echo date("Y-m-d H:i:s");           //lấy ngày giờ hiện tại

echo date("d/m/Y");       // 25/11/2025
echo date("H:i");         // 10:45
echo date("l");           // Tuesday


date_default_timezone_set("Asia/Ho_Chi_Minh");              //set múi giờ


$ts = time();
echo date("Y-m-d H:i:s", $ts);      //chuyển timestamp sang ngày vaf giờ


$ts = strtotime("2025-12-01");              //chuyển chuỗi ngày tháng sang timestamp
echo $ts;



//sử dụng đối tượng Datetime
$date = new DateTime();
echo $date->format("d/m/Y H:i:s");


$date = new DateTime("now", new DateTimeZone("Asia/Ho_Chi_Minh"));              //set múi giờ
echo $date->format("Y-m-d H:i:s");


$date = new DateTime();
$date->modify("+5 days");                           //cộng trừ ngày tháng với modify()
echo $date->format("Y-m-d");



