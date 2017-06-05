<?php
require "functions/db.php";
require "functions/staff.php";

if (isset($_POST['mobile']) && is_numeric($_POST['mobile'])) 
	   $mobile = $_POST['mobile'];
else
{
	echo 'Invalid Mobile number';
	exit();
}	

if (isset($_POST['password']))
$password=md5($_POST['password']);	
else
{
	echo 'Please enter password';
	exit();
}


$sql = "SELECT staff_id FROM staff WHERE password='$password' AND phone_number='$mobile' ";

$res = mysqli_query($conn, $sql); 
$password_check = mysqli_num_rows($res);

if($password_check>0){
$result=mysqli_query($conn, "SELECT * from staff WHERE phone_number='$mobile' AND password='$password' ");	

$row = $result -> fetch_assoc();
unset($row["password"]);
//echo json_encode( array("mobile" => $row["phone_number"], "name" => $row["first_name"].$row["last_name"]) );
array_walk_recursive($row, function (&$item, $key) {
    $item = null === $item ? '' : $item;
});
echo json_encode($row);
}
else
{echo 'Invalid Credentials';
}
?>