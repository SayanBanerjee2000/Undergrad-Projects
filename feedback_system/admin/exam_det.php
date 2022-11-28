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
</style>
</head>
<body>
<h1 align="center">Exam details manager</h1>
<h2 align="center"><a href="admin_welcome.php">Click here to go back</a></h2>
<table border="0" align="center"  >
		<tr>
			<td ><strong><a href="exam_insert.php">Add New</a></strong></td>   			 
		</tr>
		<tr>
			<td style="color:#FF0000;">&nbsp;<?php echo $msg; ?></td>   			 
		</tr>
</table>		
<table class="content-table" border="1" align="center"  >
	<thead>
		<tr>
			<td><strong>Id</strong></td>
			<td><strong>Student Name</strong></td>
			<td><strong>Student ID</strong></td>     
			<td><strong>Session</strong></td>
			<td><strong>English</strong></td>
			<td><strong>Mathematics</strong></td>
			<td><strong>Physics</strong></td>
			<td><strong>Chemistry</strong></td>
			<td><strong>Computer</strong></td>
			<td><strong>GPA</strong></td>
			<td><strong>Action</strong></td>   
		</tr>
</thead>
<?php
$sql="SELECT * FROM  `feedback_exam` ORDER BY  `id` ASC ";
$res=mysqli_query($con, $sql);
while($row=mysqli_fetch_array($res))
{
?>  
<tbody>
 		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>   
			<td><?php echo $row['roll']; ?></td>
			<td><?php echo $row['session']; ?></td>
			<td><?php echo $row['english']; ?></td>
			<td><?php echo $row['maths']; ?></td>
			<td><?php echo $row['physics']; ?></td>
			<td><?php echo $row['chemistry']; ?></td>
			<td><?php echo $row['computer']; ?></td>
			<td><?php echo $row['gpa']; ?></td>    
			<td><a href="exam_edit.php?id=<?php echo $row['id']; ?>" > Edit</a></td> 
		</tr>
</tbody>
<?php
}
?>		
</table>
</body>
</html>