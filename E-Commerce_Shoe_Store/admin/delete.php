<?php
include("connection.php"); 
$pid= $_REQUEST['id'];
	$sql_con="DELETE FROM `product` WHERE `id` ='$pid'";  
	$res=mysqli_query($con, $sql_con);
	if($res)	
	{
		@header("Location: prod_mgmt.php");
		exit();
	}
?>