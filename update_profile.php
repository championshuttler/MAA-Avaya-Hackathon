<?php
require "functions/db.php";
require "functions/users.php";

$name = $_POST['name']; 	
$password = md5($_POST['password']); 		
$phone_number = $_POST['phone_number']; 	
$email_id = $_POST['email_id']; 	
$address = $_POST['address_1']; 	
//$emergency_contact_1 = $_POST['emergency_contact_2']; 	
//$emergency_contact_1 = $_POST['emergency_contact_1']; 	
//$scanned_identity_card = $_POST['scanned_identity_card']; 	
//$profile_pic = $_POST['profile_pic']; 
//$status = $_POST['status']; 	
//$online = $_POST['online'];

$user_id = getUserIdFromMobile($phone_number, $conn);

$sql = "UPDATE users SET first_name = '$name', email_id = '$email_id', address_1 = '$address' WHERE user_id = '$user_id' AND password = '$password'";
//echo $sql;
$res = mysqli_query($conn,$sql);
//echo $res;
?>