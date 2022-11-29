<?php 
include("connection.php");

$pid= $_REQUEST['id'];
$sql="SELECT * FROM  `product_temp` WHERE `id`='$pid' ";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{
	$cat_id  = $row['cat_id'];
	$pd_name = $row['pd_name'];
	$pd_quantity = $row['pd_quantity'];
	$pd_price= $row['pd_price'];
	$pd_photo= $row['pd_photo'];

	$sql_insert = "INSERT INTO product SET
				  cat_id = '$cat_id',
				  p_name = '$pd_name',
				  p_quantity = '$pd_quantity',
				  price = '$pd_price',
				  photo = '$pd_photo'";
	$res_insert = mysqli_query($con, $sql_insert);
}

if($res_insert)
{
$sql_prod_temp = "UPDATE product_temp SET
				 status = '1' WHERE id = '$pid'";
$res_prod_temp = mysqli_query($con, $sql_prod_temp);
	?>
	<script type="text/javascript">
		alert('Product Approval Complete, Product Added');
		window.location.href = "admin_welcome.php";
	</script>
<?php 
}
?>