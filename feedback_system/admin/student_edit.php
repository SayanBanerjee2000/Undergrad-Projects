<?php
include("connection.php"); 
if(!empty($_REQUEST['mode']))
{
	$student_id      = $_REQUEST['student_id'];
	$user_login      = $_REQUEST['user_login'];
	$uname           = $_REQUEST['uname']; 
	  
	$sql_con="UPDATE `feedback_student` SET 
					`loginid`='$user_login' ,
					`name`= '$uname'
					 WHERE `id`='$student_id' ";  
	$res=mysqli_query($con, $sql_con);
	if($res)	
	{
		@header("Location: student_det.php?msg=Sucessfull Edit");
		exit();
	}				
}
$student_id= $_REQUEST['id'];
$sql="SELECT * FROM  `feedback_student` WHERE `id`='$student_id' ";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script type="text/javascript">
		function validate()
		{
			if(document.getElementById('user_login').value=="")
			{
				alert('Please enter login id!!');
				return false;
			}

			if(document.getElementById('uname').value=="")
			{
				alert('Please enter the student name');
				return false;
			}
		}
	</script>
</head>
<body>

	<h1 align="center">Student details editor</h1>
	<h2 align="left"><a href="student_det.php">Click here to go back</a></h2>
	<form method="post" onsubmit="return validate();">
		<input type="hidden" name="mode" value="1">
		<input type="hidden" name="student_id" value="<?php echo $student_id; ?>"> 
		<table align="center">
			
			<tr>
				<td>Unique-ID</td>
				<td><input type="text" name="user_login" id="user_login" value="<?php echo $row['loginid']; ?>"></td>
			</tr>

			<tr>
				<td>Name</td>
				<td><input type="text" name="uname" id="uname" value="<?php echo $row['name']; ?>"></td>
			</tr>

			<tr>
				<td><input type="submit" name="submit" value="save"></td>
			</tr>

		</table>
	</form>

</body>
</html>