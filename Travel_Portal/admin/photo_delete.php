<?php 
session_start(); 
include("../lib/connection.php");  
$photo_id= $_REQUEST['id'];
$sql="SELECT * FROM  `travel_photogallery` WHERE `id`='$photo_id' ";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$photoname = $row['photo'];
	
	$uploadlocation="../uploaded/";
	$sql_con="DELETE FROM `travel_photogallery` WHERE `id` ='$photo_id'";  
	$res=mysqli_query($con,$sql_con);
	if($res)	
	{
		@unlink($uploadlocation.$photoname);
		@header("Location: photo_mgt.php?msg=Sucessfull Delete");
		exit();
	}
?>