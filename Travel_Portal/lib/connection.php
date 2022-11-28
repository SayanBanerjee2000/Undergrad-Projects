<?php
error_reporting(0);
$con = mysqli_connect("localhost","root","");
if($con == false)
{
   echo "Connection Not Established Please Check!";
   exit;
}
$dbselect = mysqli_select_db($con, "travel");
if($dbselect == false)
{
	echo "Please Select Database!";
	exit;
}
?>