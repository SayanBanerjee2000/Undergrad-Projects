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
<style>
	  .content-table {
	margin-top:230px
	margin-left:400px;
    padding: 32px;
    /* position: relative;
    justify-content: center; */
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    min-width: 400px;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
  }
  
  .content-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
    font-weight: bold;
  }
  
  .content-table th,
  .content-table td {
    padding: 12px 15px;
  }
  
  .content-table tbody tr {
    border-bottom: 1px solid #dddddd;
  }
  
  .content-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
  }
  
  .content-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
  }
  
  .content-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
  }
  .container
{
    margin-top: 75px;
    margin-left: 487px;
    width:490px;
    min-height: 400px;
    background: rgba(63, 55, 55, 0.158);
    border-radius: 10px;
    padding-left: 4%;
    padding: auto;
    justify-content: center;
    align-items: center;
    
    backdrop-filter: blur(5px);
    box-shadow: 0 25px 25px rgba(0,0,0,0.1);
    border: 1px solid rgba(255, 255, 255, 0.596);
    border-right: 1px solid rgba(255,255,255,0.2);
    border-bottom: 1px solid rgba(255,255,255,0.2);
}
	</style>
</head>
<body>
<h1 align="center">Teacher login details manager</h1>
<h2 align="center"><a href="admin_welcome.php">Click here to go back</a></h2>
<table border="0" align="center"  >
		<tr>
			<td ><strong><a href="teacher_insert.php">Add New</a></strong></td>   			 
		</tr>
		<tr>
			<td style="color:#FF0000;">&nbsp;<?php echo $msg; ?></td>   			 
		</tr>
</table>	
<div class="container">	
<table class="content-table" border="1" align="center"  >
	<thead>
		<tr>
			<td><strong>Id</strong></td>
			<td><strong>Unique ID</strong></td>     
			<td><strong>Name</strong></td>
			<td><strong>Subjects</strong></td>
			<td><strong>Action</strong></td>  

		</tr></thead>
<?php
$sql="SELECT * FROM  `feedback_teacher` ORDER BY  `id` ASC ";
$res=mysqli_query($con, $sql);
while($row=mysqli_fetch_array($res))
{
?>  
		<tbody>
 		<tr>
			<td><?php echo $row['id']; ?></td>   
			<td><?php echo $row['loginid']; ?></td>    
			<td><?php echo $row['name']; ?></td>  
			<td><?php echo $row['subjects'];?></td> 
			<td><a href="teacher_edit.php?id=<?php echo $row['id']; ?>" >Edit</a>&nbsp;<a onClick="return(confirm('Do you really want to Delete?'))" href="teacher_delete.php?id=<?php echo $row['id']; ?>" >Delete</a></td> 
		</tr></tbody>
<?php
}
?>		
</table>
</div>
</body>
</html>