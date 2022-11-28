<?php
include("connection.php"); 
if(!empty($_REQUEST['mode']))
{
	$teacher_id      = $_REQUEST['teacher_id'];
	$user_login      = $_REQUEST['user_login'];
	$user_pwd        = $_REQUEST['user_pwd'];
	$uname           = $_REQUEST['uname']; 
	$sub  			 = $_REQUEST['sub'];
	  
	$sql_con="UPDATE `feedback_teacher` SET 
					`loginid`='$user_login' ,
					`password`= '$user_pwd', 
					`name`= '$uname',
					`subjects`='$sub'
					 WHERE `id`='$teacher_id' ";  
	$res=mysqli_query($con, $sql_con);
	if($res)	
	{
		@header("Location: teacher_det.php?msg=Sucessfull Edit");
		exit();
	}				
}
$teacher_id= $_REQUEST['id'];
$sql="SELECT * FROM  `feedback_teacher` WHERE `id`='$teacher_id' ";
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
			if(document.getElementById('user_pwd').value=="")
			{
				alert('Please enter password!!');
				return false;
			}

			if(document.getElementById('uname').value=="")
			{
				alert('Please enter the teacher name');
				return false;
			}
			if(document.getElementById('sub').value=="")
			{
				alert('Please enter the subject');
				return false;
			}
		}
	</script>
</head>
<body>

	<h1 align="center">Student details editor</h1>
	<h2 align="left"><a href="teacher_det.php">Click here to go back</a></h2>
	<form method="post" onsubmit="return validate();">
		<input type="hidden" name="mode" value="1">
		<input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>"> 
		<table align="center">
			
			<tr>
				<td>Unique ID</td>
				<td><input type="text" name="user_login" id="user_login" value="<?php echo $row['loginid']; ?>"></td>
			</tr>

			<tr>
				<td>Name</td>
				<td><input type="text" name="uname" id="uname" value="<?php echo $row['name']; ?>"></td>
			</tr>
			<tr>
				<td>Subject</td>
				<td><input type="text" name="sub" id="sub" value="<?php echo $row['subjects'];?>"></td>
			</tr>

			<tr>
				<td><input type="submit" name="submit" value="save"></td>
			</tr>

		</table>
	</form>

</body>
</html>