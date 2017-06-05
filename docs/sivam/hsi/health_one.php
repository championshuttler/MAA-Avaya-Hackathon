<?php
$Height = $_GET['Height']
$rbc=$_GET['rbc'];
$wbc=$_GET['wbc'];
$bp = $_GET['bp'];
$weight = $_GET['weight'];
$platelets=$_GET['platelets'];
$hb=$_GET['hb'];
$urine = $_GET['urine'];
$sugar = $_GET['sugar'];
$ldlctrol=$_GET['ldlctrol'];
$hdlctrol=$_GET['hdlctrol'];
$dateu = $_GET['dateu'];





$host="localhost";
$uname="avayahackathon";
$pass="avayahackathon";
$DB_NAME="avayahackathon";

$conn=new mysqli($host,$uname,$pass,$DB_NAME);

$query="INSERT INTO health_one(Height,rbc,wbc,bp,weight,platelets,hb,urine,sugar,ldlctrol,hdlctrol,dateu) VALUES(\"".$Height."\",\"".$rbc."\",\"".$wbc."\",\"".$bp."\",\"".$weight."\",\"".$platelets."\",\"".$hb."\",\"".$urine."\",\"".$sugar."\",\"".$ldlctrol."\",\"".$hdlctrol."\",\"".$dateu."\",)";


$result=$conn->query($query);

echo $result;
?>
