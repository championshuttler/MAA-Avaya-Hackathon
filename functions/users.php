<?php



function getEmailFromMobile($mobile, $conn)
{	
	$result=$conn->query("SELECT email_id FROM `users` WHERE phone_number = '$mobile'");
	$row = $result->fetch_row();	
	if(!$row[0])
		return false;
	else	
		return $row[0];
}

function getUserIdFromMobile($mobile, $conn)
{	
	$result=$conn->query("SELECT user_id FROM `users` WHERE phone_number = '$mobile'");
	$row = $result->fetch_row();	
	if(!$row[0])
		return false;
	else	
		return $row[0];
}

function getUserIdFromAppointId($appoint_id, $conn)
{
	$result=$conn->query("SELECT user FROM `appointment` WHERE appointment_id = '$appoint_id'");
	$row = $result->fetch_row();	
	if(!$row[0])
		return false;
	else	
		return $row[0];	

}

function getNameFromUserId($user_id, $conn)
{
	$result=$conn->query("SELECT first_name, last_name FROM `users` WHERE user_id = '$user_id'");
	$row = $result->fetch_row();	
	if(!$row[0])
		return false;
	else	
		return $row[0]. ' '. $row[1];

}
function getEmailFromUserId($user_id, $conn)
{	
	$result=$conn->query("SELECT email_id FROM `users` WHERE user_id = '$user_id'");
	$row = $result->fetch_row();	
	if(!$row[0])
		return false;
	else	
		return $row[0];
}

function resultToArray($result) {
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

function getDoctorFromDepartment($department,$hospital, $conn)
{	
	$result=$conn->query("SELECT `staff_id` FROM `staff` WHERE `hospital_id` = '$hospital' AND `department_id`='$department' ");
	
	 while($row = $result->fetch_row()) 
            $myArray[] = $row[0];
         
         $ans = array();
         $result=$conn->query("SELECT name FROM staff WHERE staff_id = 1");
        
         
         foreach($myArray as $doctor)
         {
       
         $result=$conn->query("SELECT `name` FROM `staff` WHERE `staff_id` = 1");
   		$val = $result->fetch_row()[0];
         array_push($ans, array('staff_id' => $doctor, 'doctor_name' => $val));
         }   
  	return $ans; 
		
}


function getDepartmentFromHospital($hospital, $conn)
{	
	
	$result=$conn->query("SELECT `departments` FROM `hospital` WHERE `hospital_id` = '$hospital' ");
	$row = $result->fetch_array();	
	$str=explode("-",$row[0]);
	$ans = array();
	foreach ($str as $item)
	{   //echo $item
	   $depname = $conn->query("SELECT `department_name` FROM `departments` WHERE `department_id` = '$item' ")->fetch_row()[0];
	   array_push($ans, array('department_id' => $item, 'department_name' =>  $depname ));	
	    //array_push($ans, array($item => );
	    //Sorry but it works
	  
	}
	return $ans;
	
}


function check_staff_busy($staffid,$date){
	
	$con = mysqli_connect("localhost","avayahackathon","avayahackathon","avayahackathon");
	$sql_staff = "SELECT `doctor` FROM `appointment` WHERE `doctor`='$staffid' AND `appointment_date`='$date' ";
	$query_staff = mysqli_query($con, $sql_staff); 
	$staff_check = mysqli_num_rows($query_staff);
	
	if($staff_check<5){
	return "1";
	}
	else return "0";
}


function user_data($user_id){//this function can accept & return n number of parameter.
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
	
	$query="SELECT $fields FROM `users` WHERE  `user_id` =$user_id";
	 
	$result= mysqli_query($con,$query);
	$data=mysqli_fetch_assoc($result);
	//print_r($data); To retrieve all the data
	
	return $data;
	
	}

	
}

function staff_data($staff_id){//this function can accept & return n number of parameter.
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
	
	$query="SELECT $fields FROM `staff` WHERE  `staff_id` =$staff_id";
	 
	$result= mysqli_query($con,$query);
	$data=mysqli_fetch_assoc($result);
	//print_r($data); To retrieve all the data
	
	return $data;
	
	}

	
}


function makeAppointment($user_id, $staff_id, $date)
{
	
	$con = mysqli_connect("localhost","avayahackathon","avayahackathon","avayahackathon");
	$result=$con->query("INSERT INTO `appointment` (`user`, `doctor`, `appointment_time`,`appointment_date`,`made_on`,`user_remark`,`staff_remark`,`appointment_type`,`appointment_status`)                                VALUES ('$user_id', '$staff_id', '09:00:00','$date','$timestamp','$user_remark','$staff_remark','$appointment_type','$appointment_status');");
	//$apointmentid = $con->user_id;
	return $result;
	
}

?>