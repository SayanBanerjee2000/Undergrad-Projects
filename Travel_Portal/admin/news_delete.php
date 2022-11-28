<?php 
session_start(); 
include("../lib/connection.php");  
					$id= $_REQUEST['id'];					 
					$sql_insert="DELETE FROM `travel_news` WHERE `id`='$id'";
					$res_insert=mysqli_query($con,$sql_insert);
					if($res_insert)
					{
						header("Location: news_mgt.php?msg=Delete successfull");
						exit();
					}
?>