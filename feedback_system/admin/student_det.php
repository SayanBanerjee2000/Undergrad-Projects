<?php 
include("connection.php"); 

if(!empty($_REQUEST['msg'])) { 

	$msg=$_REQUEST['msg']; 
} 
else { 
	
	$msg  = ""; 
}
?>
<html>
<head>
<title></title>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tabstile.css">
</head>
<body>
<div id ="grad">
<!-- <section>

	<div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>  -->
<h1 align="center">Student login details manager</h1>
<h2 align="center"><a href="admin_welcome.php">Click here to go back</a></h2>
<div class="container">
<table class="content-table" border="0" align="center"  >
		<tr>
			<td ><strong><a href="student_insert.php">Add New</a></strong></td>   			 
		</tr>
		<tr>
			<td style="color:#FF0000;">&nbsp;<?php echo $msg; ?></td>   			 
		</tr>
</table>		
<table class="content-table"  border="1" align="center"  >
	<thead>
		<tr>
			<td><strong>Id</strong></td>
			<td><strong>Unique-ID</strong></td>      
			<td><strong>Name</strong></td>
			<td><strong>Action</strong></td>   
		</tr>
</thead>
<?php
$sql="SELECT * FROM  `feedback_student` ORDER BY  `id` ASC ";
$res=mysqli_query($con, $sql);
while($row=mysqli_fetch_array($res))
{
?>  	<tbody>
 		<tr>
			<td><?php echo $row['id']; ?></td>   
			<td><?php echo $row['loginid']; ?></td>  
			<td><?php echo $row['name']; ?></td>   
			<td><a href="student_edit.php?id=<?php echo $row['id']; ?>" >Edit</a>&nbsp;<a onClick="return(confirm('Do you really want to Delete?'))" href="student_delete.php?id=<?php echo $row['id']; ?>" >Delete</a></td> 
		</tr></tbody>
<?php
}
?>		
</table>
</div>
</div>
</body>
</html>