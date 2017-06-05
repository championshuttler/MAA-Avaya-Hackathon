<?php

$user_id=$_GET['user_id'];

function health_data($user_id){//this function can accept & return n number of parameter.
	$con = mysqli_connect("localhost","avayahackathon","avayahackathon","avayahackathon");
	
	$data=array();
	$user_id= (int)$user_id;
	$func_num_args = func_num_args();
	// echo $func_num_args; //To check number of arguments we passed
	$func_get_args = func_get_args();
	//echo $func_get_args; // To check the arguments we passed
	if($func_num_args>1){
		unset($func_get_args[0]);
	$fields= '`'.implode('`,`',$func_get_args).'`';
	
	$query="SELECT $fields FROM `parameter` WHERE  `user_id` =$user_id";
	 
	$result= mysqli_query($con,$query);
	$data=mysqli_fetch_assoc($result);
	//print_r($data); To retrieve all the data
	
	return $data;
	
	}

	
}

$health_data =health_data($user_id,'name','email','username','mobile','state','batch','branch','institute','profilepic');
					$name=$profile_data['name'];
					$email=$profile_data['email'];
					$mobile=$profile_data['mobile'];

						




?>