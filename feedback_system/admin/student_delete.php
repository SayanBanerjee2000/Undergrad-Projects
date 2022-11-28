<?php
include("connection.php"); 
$student_id= $_REQUEST['id'];
	$sql_con="DELETE FROM `feedback_student` WHERE `id` ='$student_id'";  
	$res=mysqli_query($con, $sql_con);
	if($res)	
	{
		@header("Location: student_det.php?msg=Sucessfull Delete");
		exit();
	}
?>