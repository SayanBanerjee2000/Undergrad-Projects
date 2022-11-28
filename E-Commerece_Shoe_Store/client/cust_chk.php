<?php  
include("connection.php");
if (isset($_GET['cust_det'])) 
{

	$f_name = $_GET['fname'];
	$l_name = $_GET['lname'];
	$c_addr = $_GET['addr'];
	$c_city = $_GET['city'];
	$c_state= $_GET['state'];
	$c_zip  = $_GET['zip'];
	$c_email= $_GET['email'];
	$c_phn  = $_GET['ph_no'];
	$total  = $_GET['hidden_total'];
	$sql_temp = "SELECT * FROM temp";
	$res_temp = mysqli_query($con, $sql_temp);
	$row_temp = mysqli_fetch_array($res_temp);
	$id = $row_temp['loginid'];
	// $hd_cust= $_GET['hidden_cust_id'];
	$orderdate = date("Y-m-d");
	$deliverydate = date('Y-m-d', strtotime($orderdate. ' + 10 days'));
	$quant = 0;
	// $sql_prod = "SELECT * from `product`";
	// $res = mysqli_query($con, $sql_prod);
	// $sql_cart = "SELECT prod_name, SUM(quantity) FROM cart GROUP BY prod_name";
	// $res_cart = mysqli_query($con, $sql_cart);
	$sql = "SELECT product.p_name,product.photo, product.p_quantity, cart.prod_name, SUM(cart.quantity) FROM cart INNER JOIN product ON cart.prod_name=product.p_name GROUP BY cart.prod_name";

	$res = mysqli_query($con, $sql);
	$qty = 0;
	while($row = mysqli_fetch_array($res))
	{
		if($row['p_name'] == $row['prod_name'])
		{
			$pd_name = $row['prod_name'];
			// echo "Product : ".$pd_name;
			//echo "<br>----------------------<br>";
			$qty = $row['p_quantity'] - $row['SUM(cart.quantity)'];
			$sql_update = "UPDATE `product` SET `p_quantity` = '$qty' WHERE `p_name` = '$pd_name'";
			$res_update = mysqli_query($con, $sql_update);
			//echo "$qty";
			//echo "<br>----------------------<br>";
		}
	}
	// while ($row_cart=mysqli_fetch_array($res_cart)) {
	// 		if($row_prod['prod_name'] == $row_cart['p_name'] )
	// 		{
	// 			$quant = $row_prod['p_quantity']-$row_cart['SUM(quantity)'];
	// 			$pd_name = $row_cart['prod_name'];
	// 			$sql_update = "UPDATE `product` SET `p_quantity` = '$quant' WHERE `p_name` = '$pd_name'";
	// 			$res_update = mysqli_query($con, $sql_update);
	// 			$quant = 0;

	// 		}
	// 	}
	//}
	// $sql_temp = "SELECT * FROM `temp`";
	// $res_temp = mysqli_query($con, $sql_temp);
	// $quant = 0;
	// while ($row_prod = mysqli_fetch_array($res) && $row_temp=mysqli_fetch_array($res_temp)) {
	// 		if($row_prod['p_name'] == $row_temp['product_name'])
	// 		{
	// 			$quant = $row_prod['p_quantity']-$row_temp['prod_quant'];
	// 			$pd_name = $row_temp['product_name'];
	// 			$sql_update = "UPDATE `product` SET `p_quantity` = '$quant' WHERE `p_name` = '$pd_name'";
	// 			$quant=0;
	// 		}
	// }

	// $sql_temp_del = "DELETE FROM `temp`";
	// $res_temp_del = mysqli_query($con, $sql_temp_del);
	  $sql_cart = "SELECT * FROM cart WHERE user_id = '$id'";
	  $res_cart = mysqli_query($con, $sql_cart);
	  $rand_var = rand(100,999);  
	  $full_name = $f_name." ".$l_name;
	while($row_cart = mysqli_fetch_array($res_cart))
	{
	  
	  $item_name = $row_cart['prod_name'];
	  $item_quantity = $row_cart['quantity'];
	  $item_size = $row_cart['size'];
	  $original = $row_cart['orig_price'];
	  $sql_insert = "INSERT INTO `orders` SET 
	  				`order_id` = '$rand_var',
	  				`user_id`  = '$id',
	  				`total_amt` = '$total', 
	  				`order_date` ='$orderdate', 
	  				`delivery_date` = '$deliverydate', 
	  				`cust_name` = '$full_name', 
	  				`cust_email` = '$c_email', 
	  				`cust_addr` = '$c_addr', 
	  				`state` = '$c_state', 
	  				`city` = '$c_city', 
	  				`zip` = '$c_zip', 
	  				`cust_mobile` = '$c_phn',
	  				`p_name` ='$item_name',
	  				`p_quantity`='$item_quantity',
	  				`size` = '$item_size',
	  				`original_prc`='$original'";

	  $res_in = mysqli_query($con, $sql_insert);
	  if($res_in)
	  {
	  	$sql_del = "DELETE FROM `cart` WHERE user_id='$id' AND `prod_name` = '$item_name' AND `size` = '$item_size'";
	  	$res_del = mysqli_query($con, $sql_del);
	  	if($res_del)
	  	{
	  		echo '<script type="text/javascript">alert("Order Placed. Your Order ID:'.$rand_var.'");</script>';
	   		echo ("<script>location.href='index.php'</script>");
	   	}
	 }
	}

}
?>