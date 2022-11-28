<?php
include("connection.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tablestyle.css">
	<title>Teacher List</title>
</head>
<body>
<section>
	<div class="color"></div>
    <div class="color"></div>
    <div class="color"></div>
	
	<br>
	
    <div class="container">	
	<h3 style="font: size 40px; text-align:center; margin-bottom:40px" align="top"><a href="feedback.php">Click to go back</a></h4>
	<h3 style="font: size 40px; text-align:center; margin-bottom:40px " align="center">Teacher details</h3>
	<table  class="content-table" border="1" align="center">
		<thead>
		<tr>
			<td><strong>Id</strong></td>  
			<td><strong>Name</strong></td>
			<td><strong>Subject</strong></td>   
		</tr></thead>
<?php
$sql="SELECT * FROM  `feedback_teacher` ORDER BY  `id` ASC ";
$res=mysqli_query($con, $sql);
while($row=mysqli_fetch_array($res))
{
?>  	<tbody>
 		<tr>
			<td><?php echo $row['id']; ?></td>     
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['subjects']; ?></td>   
		</tr>
<?php
}
?>	
</tbody>	
</table>
</div>
</section>
</body>
</html>