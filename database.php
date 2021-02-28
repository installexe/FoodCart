<?php 

$d1_ip = "localhost";
$d2_name = "root";
$d3_p = "";
$d4_db = "food";

$induction = mysqli_connect($d1_ip,$d2_name,$d3_p,$d4_db);
mysqli_set_charset($induction, "utf8");
if ($induction == false)
{
    echo  "Ошибка";
}
?>