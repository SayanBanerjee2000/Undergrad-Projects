<?php
include("connection.php");
if (isset($_GET['submit']))
{
	$title = $_GET['search_box'];
	$sql   = "SELECT * FROM `product` WHERE `p_name` LIKE '%$title%'";
	$res   = mysqli_query($con, $sql);
	if(mysqli_num_rows($res)>0)
	{
		while($row = mysqli_fetch_array($res))
		{

		}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Shoe Store</title>
</head>
<body>

	<h3 align="center" style="font-family: Verdana;"><strong>The Shoe Store</strong></h3>
	<form method="GET" action="search.php" onsubmit="">
		<table style="margin-top: 45px;" align="center">
			<tr>
				<td><input type="text" name="" id=""></td>
				<td style="font-family: verdana"><input type="submit" name="" value="Search"></td>
			</tr>
		</table>
		<table align="center" cellpadding="40" cellspacing="40">
			<tr><td><td></td></td></tr>
			<tr>
				<td><strong>Product name</strong></td>
				<td><strong>Price</strong></td>
			</tr>
		</table>
	</form>

</body>
</html>
<?php
}}
?>