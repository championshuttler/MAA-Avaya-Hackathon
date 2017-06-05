<?php
$UUID=$_GET['UUID'];
$name=$_GET['name'];
$Height=$_GET['Height'];

$host="localhost";
$uname="avayahackathon";
$pass="avayahackathon";
$DB_NAME="avayahackathon";

$conn=new mysqli($host,$uname,$pass,$DB_NAME);

$query="INSERT INTO basic(UUID, name, Height) VALUES(\"".$UUID."\",\"".$name."\", \"".$Height."\")";


$result=$conn->query($query);
    echo $result;
?>
