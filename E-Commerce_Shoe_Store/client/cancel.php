<?php 
include("connection.php");
$id = $_REQUEST['id'];
$sql_add = "SELECT distinct p_name, size, p_quantity FROM orders WHERE order_id = '$id'";
$res_add = mysqli_query($con,$sql_add);
while($row = mysqli_fetch_array($res_add))
{
	$prod_name = $row['p_name'];
	$prod_qty  = $row['p_quantity'];

	$sql_update = "UPDATE product SET p_quantity = p_quantity+'$prod_qty' WHERE p_name = '$prod_name'";
	$res_update = mysqli_query($con,$sql_update);
}
$sql = "DELETE FROM orders WHERE order_id = '$id'";
$res = mysqli_query($con, $sql);
if($res)
{
	echo "<script>alert('Order #'".$id." canceled')</script>";
	echo "<script>window.location.href='index.php'</script>";
}
?>