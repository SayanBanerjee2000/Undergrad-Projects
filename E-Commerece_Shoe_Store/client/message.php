<?php
// connecting to database
$conn = mysqli_connect("localhost", "root", "", "shoe") or die("Database Error");

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);
$msg = is_numeric($_POST['text']);

//checking user query to database query
$check_data = "SELECT * FROM chatbot WHERE questions LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

$get_msg = $_POST['text'];

$prod_check = "SELECT * FROM `product` WHERE p_name like '%$getMesg%'";
$res_prod = mysqli_query($conn, $prod_check);
$chk_prod = mysqli_num_rows($res_prod);

$sql_qry = "SELECT * FROM `temp`";
$res_qry = mysqli_query($conn, $sql_qry);
$row_qry = mysqli_fetch_array($res_qry);
$user_id = $row_qry['loginid'];

$check_order_num = "SELECT DISTINCT order_id, user_id, total_amt, order_date, delivery_date, cust_name, cust_email, 					cust_addr, state, city, zip, cust_mobile FROM orders WHERE order_id = '$get_msg' AND user_id = '$user_id'";
$res_order_num = mysqli_query($conn, $check_order_num);
$total_rows_order = mysqli_num_rows($res_order_num);



if ($msg == 1) {
	if($total_rows_order>=1)
	{
		$check_order = "SELECT * FROM orders WHERE order_id = '$get_msg'";
		$res_chk = mysqli_query($conn, $check_order);
		$row = mysqli_fetch_array($res_chk);
		echo "Hi ".$row['cust_name']."<br>This is your order id:".$row['order_id']."<br>It will be delivered by:".$row['delivery_date']." and is currently processing";
	}
	else
	{
		echo "The Entered Order ID does not exist <br>";
		echo "Please Enter a Valid Order ID";
	}
}

if(strcmp($get_msg ,"Order Status")==0) // Just Change This Part => On Pressing the order status button this block of code will shoot and display. So, It will not show mention your order id on clicking the order status button but it will display the below result on clicking and then if any order id is given it will shoot
{
	$sql_fetch = "SELECT DISTINCT cust_name, order_id, MAX(order_date), delivery_date FROM orders WHERE user_id = '$user_id' LIMIT 0,1";
	$res_fetch = mysqli_query($conn, $sql_fetch);
	$row_fetch = mysqli_fetch_array($res_fetch);

	$sql_chk_dis = "SELECT DISTINCT order_id FROM orders WHERE user_id = '$user_id'";
	$res_chk_dis = mysqli_query($conn, $sql_chk_dis);
	$chk_row = mysqli_num_rows($res_chk_dis);

	if($chk_row >= '1')
	{
	
		echo "Hi ".$row_fetch['cust_name']."<br>This is your recent order id:".$row_fetch['order_id']."<br>It will be delivered by:".$row_fetch['delivery_date']." and is currently processing<br>Did you mean this order?<br>If not, please mention the order id below";
		exit();
	}
	else
	{
		echo "You do not have any placed order with us!";
		exit();
	}

}

if($msg!=1 && mysqli_num_rows($run_query) > 0){
    
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $replay = $fetch_data['replies'];
    echo $replay;
    echo $msg;
}
if ($chk_prod >=1 && $msg!=1) 
{
	while ($rowP = mysqli_fetch_array($res_prod)) 
	{
				//echo "<img src='uploaded/" . $rowP['photo'] . "' alt='error'>";
				//echo "<figure><img src='uploaded/".$rowP['photo']."'</figure>";
				
				echo "<img src='../admin/uploaded/" . $rowP['photo'] . "' width=100px height=100px alt='error'>";
				echo "<br> Shoe Name: ".$rowP['p_name'];
				echo "<br> Shoe price: ".$rowP['price'];
				echo "<br> Shoe Quantity: ".$rowP['p_quantity']."<br>";

	}


}
// elseif($chk_prod<1)
// {
// 	echo "Currently we do not have the stock of the requested colour";
// }
// elseif($total_rows_order<1 && $msg == 1)
// {
// 	echo "Please Enter a Valid Order ID";

// }
// else
// {
//     echo "Sorry can't understand you!";
// }

?>