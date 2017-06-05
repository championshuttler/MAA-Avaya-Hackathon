<?php

error_reporting(E_ALL & ~E_NOTICE); ini_set('display_errors', '1');

$host="localhost";
$uname="root";
$pass="root";
$DB_NAME="BhamaHeal";

$conn=new mysqli($host,$uname,$pass,$DB_NAME);

$Height=$_GET['Height'];
$lefteye=$_GET['lefteye'];
$righteye=$_GET['righteye'];
$height=$_GET['height'];
$weight=$_GET['weight'];
$sugar=$_GET['sugar'];
$remarks=$_GET['remarks'];
$bmi=$weight/($height*$height)*10000;

$query="INSERT INTO health_two(Height,lefteye,righteye,height,weight,bmi,sugar,remarks) VALUES(\"".$Height."\",\"".$lefteye."\",\"".$righteye."\",\"".$height."\",\"".$weight."\",\"".$bmi."\",\"".$sugar."\",\"".$remarks."\")";

// echo $query;

$result=$conn->query($query);
echo $result;

?>