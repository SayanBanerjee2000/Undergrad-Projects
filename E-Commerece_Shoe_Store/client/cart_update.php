<?php
include("connection.php"); 
$pd_id= $_REQUEST['id'];
	$sql_conn="DELETE FROM `cart` WHERE `id` ='$pd_id'";  
	$res=mysqli_query($con, $sql_conn);
	if($res)	
	{
		@header("Location: cart_home.php?msg=Sucessfull Delete");
		exit();
	}
?>