<?php 

function add_parameter_column($parameter){

//$query="mysqli_query($link,"ALTER TABLE extracols ADD (".$newCol1." VARCHAR(100),  ".$newCol2." VARCHAR(100))");";

$query = "ALTER TABLE parameter ADD ('".$parameter."' varchar(50)   NULL DEFAULT NULL )";
mysqli_query($query);
}

function check_staff_active($staffid){
	$active=1;
	$con = mysqli_connect("localhost","avayahackathon","avayahackathon","avayahackathon");
	$sql_staff = "SELECT `status` FROM `staff` WHERE `staff_id`='$staffid' AND `status`='$active' ";
	$query_staff = mysqli_query($con, $sql_staff); 
	$staff_check = mysqli_num_rows($query_staff);
	return $staff_check;
}

function isActive($staff_id)
{	$active=1;
	$con = mysqli_connect("localhost","avayahackathon","avayahackathon","avayahackathon");
	$result = $con->query("SELECT count(*) FROM `staff` WHERE `staff_id` = $staff_id AND `active` = $active");

	$row = $result->fetch_row();

	if ($row[0] == 0)
	{
		return 0;
	}
	else
	{
		return 1;
	}
}

function isOnline($staff_id)
{	$active=1;
	$con = mysqli_connect("localhost","avayahackathon","avayahackathon","avayahackathon");
	$result = $con->query("SELECT count(*) FROM `staff` WHERE `staff_id` = $staff_id AND `online` = $active");

	$row = $result->fetch_row();

	if ($row[0] == 0)
	{
		return 0;
	}
	else
	{
		return 1;
	}
}

function update_line($staff_id,$online){
	$con = mysqli_connect("localhost","avayahackathon","avayahackathon","avayahackathon");
	$sql_line = "UPDATE `staff` SET `online`='$online' WHERE `staff_id`='$staff_id' ";
	mysqli_query($con, $sql_line); 
	 	
}
?>