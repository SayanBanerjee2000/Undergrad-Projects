<?php
include("connection.php"); 
$sub_id= $_REQUEST['id'];
	$sql_con="DELETE FROM `feedback_subject` WHERE `id` ='$sub_id'";  
	$res=mysqli_query($con, $sql_con);
	if($res)	
	{
		@header("Location: subject_det.php?msg=Sucessfull Delete");
		exit();
	}
?>