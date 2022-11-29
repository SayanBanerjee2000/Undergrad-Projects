<?php 
include("connection.php");
$sql = "SELECT * FROM `product` WHERE `cat_id` = '1'";
$res = mysqli_query($con, $sql);
if($res)
{
	echo ("<script>location.href='index_men.php'</script>");
}
?>