<?php
error_reporting(E_ALL & ~E_NOTICE); ini_set('display_errors', '1');

$bsid=$_GET['UUID'];
$Height=$_GET['Height'];
$remark=$_GET['remark'];
$type=$_GET['type'];

$host="localhost";
$uname="root";
$pass="root";
$DB_NAME="BhamaHeal";

$conn=new mysqli($host,$uname,$pass,$DB_NAME);

$query="INSERT INTO reports(UUID,Height,remark,type) VALUES(\"".$bsid."\",\"".$Height."\",\"".$remark."\",\"".$type."\")";


$result=$conn->query($query);
echo $result;

?>
