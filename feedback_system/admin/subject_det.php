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
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tabstile.css">
<title></title>
<style>
	#grad
{
    background-image: linear-gradient(rgb(189, 221, 183),#04af93);
}
	/* .container
{
    margin-left: 258px;
	margin-top: 813px
    width:600px;
    min-height: 400px;
    background: rgba(63, 55, 55, 0.158);
    border-radius: 10px;
    display: flex;
    padding: auto;
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(5px);
    box-shadow: 0 25px 25px rgba(0,0,0,0.1);
    border: 1px solid rgba(255, 255, 255, 0.596);
    border-right: 1px solid rgba(255,255,255,0.2);
    border-bottom: 1px solid rgba(255,255,255,0.2);
} */
</style>
</head>
<body>
<div id ="grad">
<h1 align="center">Subject details manager</h1>
<h2 align="center"><a href="admin_welcome.php">Click here to go back</a></h2>
<table border="0" align="center"  >
		<tr>
			<td ><strong><a href="subject_insert.php"><span>Add New</span></a></strong></td>   			 
		</tr>
		<tr>
			<td style="color:#FF0000;">&nbsp;<?php echo $msg; ?></td>   			 
		</tr>
</table>
<div class="container">		
<table border="2" align="center" class="content-table">
		<thead>
		<tr>
			<td><strong>Id</strong></td>
			<td><strong>Subject</strong></td>     
			<td><strong>Action</strong></td>   
		</tr>
	</thead>
<?php
$sql="SELECT * FROM  `feedback_subject` ORDER BY  `id` ASC ";
$res=mysqli_query($con, $sql);
while($row=mysqli_fetch_array($res))
{
?>  	
		<tbody>
 		<tr>
			<td><?php echo $row['id']; ?></td>   
			<td><?php echo $row['subject']; ?></td>    
			<td><a href="subject_edit.php?id=<?php echo $row['id']; ?>" >Edit</a>&nbsp;<a onClick="return(confirm('Do you really want to Delete?'))" href="subject_delete.php?id=<?php echo $row['id']; ?>" >Delete</a></td> 
		</tr></tbody>
<?php
}
?>		
</table>
</div>
</div>
</body>
</html>