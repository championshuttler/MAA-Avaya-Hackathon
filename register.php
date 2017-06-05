<?php
require "functions/db.php";
require "functions/users.php";
//echo"piyush";

if (isset($_POST["name"]))
{//$name = explode(" ",strip_tags(trim($_POST["name"])));	
//$first_name = ucfirst($name[0]);
$first_name = ucfirst($name);
//if($name[1])
//$last_name = ucfirst($name[1]);
//else
//$last_name = '';
}
else 
{echo 'Name not supplied';
exit();}

if (isset($_POST["mobile"]))
{if (is_numeric($_POST["mobile"]))
$mobile = $_POST["mobile"];
else
{
echo 'Mobile number is invalid';
exit();}
$sql = "SELECT user_id FROM users WHERE phone_number='$mobile' LIMIT 1";
$res = mysqli_query($conn,$sql);
$mobile_check = mysqli_num_rows($res);
if ($mobile_check > 0)
{echo 'Mobile number is already registered with us';
exit();}
}
else
{echo 'Mobile number is missing';
exit();} 

if (isset($_POST["password"]))
$pass= md5($_POST["password"]);
else 
{echo 'Password is missing';
exit();} 
	

$sql = "INSERT INTO users (first_name, phone_number, password) VALUES ('$first_name', '$mobile', '$pass')";
$res = mysqli_query($conn,$sql);
if(!$conn->affected_rows)
echo 'Error in registeration. Please try again later.';
else
echo 'Success';   
mysqli_close($conn);
exit();
?>
