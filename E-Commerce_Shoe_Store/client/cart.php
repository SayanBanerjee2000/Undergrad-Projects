<?php
include("connection.php");
if(isset($_GET['add_to_cart']))
{
	$var1 = $_GET['pd_name'];
	$var2 = $_GET['pd_price'];
	$var3 = $_GET['qty'];
	$size = $_GET['sz'];
	$var4 = $var2 * $var3;
	$sql = "SELECT * FROM `cart` where `prod_name` = '$var1' and `size` = '$size'";
	$result = mysqli_query($con, $sql);
	$chk_row = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	$sql_temp = "SELECT * FROM `temp`";
	$res_temp = mysqli_query($con, $sql_temp);
	$row_temp = mysqli_fetch_array($res_temp);
	$chk_temp = mysqli_num_rows($res_temp);
	$user_id = $row_temp['loginid'];

	// if($chk_row == 1)
	// {
	// 	echo '<script>alert("The item is already in cart")</script>';  
	//  	echo ("<script>location.href='index.php'</script>");
	// }
	$q = 0;
	$prc = 0;
	if($chk_row>=1)
	{
		$q = 0;
		$prc = 0;
		$q = $var3 + $row['quantity'];
		$prc = $q * $row['orig_price'];
		$sql_update = "UPDATE `cart` SET
					   `quantity` = '$q',
					   `prod_price` = '$prc' 
					   WHERE `prod_name` = '$var1' AND `size` = '$size'";
		$res_update = mysqli_query($con, $sql_update);
		echo '<script>alert("Cart Updated")</script>';
		echo ("<script>location.href='index.php'</script>");
	}
	else
	{
		$sql_con = "INSERT INTO `cart` SET `orig_price` = '$var2', `prod_name` = '$var1',`prod_price` = '$var4', `quantity` = '$var3', `size` = '$size',`user_id` = '$user_id'";
	 	$res = mysqli_query($con, $sql_con);
	 	echo '<script>alert("Product added to cart")</script>';
		echo ("<script>location.href='index.php'</script>");
	 	
	}
}	
?>