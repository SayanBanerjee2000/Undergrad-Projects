<?php
include("connection.php"); 
$teacher_id= $_REQUEST['id'];
	$sql_con="DELETE FROM `feedback_teacher` WHERE `id` ='$teacher_id'";  
	$res=mysqli_query($con, $sql_con);
	if($res)	
	{
		@header("Location: teacher_det.php?msg=Sucessfull Delete");
		exit();
	}
?>