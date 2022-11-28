<?php
include("connection.php");
if (!empty($_REQUEST['mode']))
{
	$user_login = $_REQUEST['user_login'];
	$uname = $_REQUEST['uname'];
	$sql_con="INSERT INTO `feedback_student` SET 
					`loginid`='$user_login' ,
					`name`= '$uname'";
	$res=mysqli_query($con, $sql_con);		
	if($res)	
	{
		@header("Location: student_det.php?msg=Sucessfull Insert");
		exit();
	}	
} 
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
			if(document.getElementById('user_pwd').value=="")
			{
				alert('Please enter password!!');
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

	<h1 align="center">New Student details allocator</h1>
	<h2 align="left"><a href="student_det.php">Click here to go back</a></h2>
	<form method="post" onsubmit="return validate();">
		<input type="hidden" name="mode" value="1">
		<table align="center">
			
			<tr>
				<td>Unique-ID</td>
				<td><input type="text" name="user_login" id="user_login"></td>
			</tr>

			<tr>
				<td>Name</td>
				<td><input type="text" name="uname" id="uname"></td>
			</tr>

			<tr>
				<td><input type="submit" name="submit" value="save"></td>
			</tr>

		</table>
	</form>

</body>
</html>