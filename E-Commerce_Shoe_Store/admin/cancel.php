<?php 
include("connection.php");
$id = $_REQUEST['id'];
$sql = "DELETE FROM orders WHERE order_id = '$id'";
$res = mysqli_query($con, $sql);
if($res)
{
	echo "<script>alert('Order #'".$id." canceled')</script>";
	echo "<script>window.location.href='index.php'</script>";
}
?>