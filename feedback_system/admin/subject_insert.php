<?php
include("connection.php");
if (!empty($_REQUEST['mode']))
{
	$sub_name = $_REQUEST['sub_name'];
	$sql_con="INSERT INTO `feedback_subject` SET 
					`subject`='$sub_name'";
	$res=mysqli_query($con, $sql_con);		
	if($res)	
	{
		@header("Location: subject_det.php?msg=Sucessfull Insert");
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
			if(document.getElementById('sub_name').value=="")
			{
				alert('Please enter subject to add !!');
				return false;
			}
		}
	</script>
</head>
<body>

	<h1 align="center">New Subject</h1>
	<h2 align="left"><a href="subject_det.php">Click here to go back</a></h2>
	<form method="post" onsubmit="return validate();">
		<input type="hidden" name="mode" value="1">
		<table align="center">
			
			<tr>
				<td>Subject</td>
				<td><input type="text" name="sub_name" id="sub_name"></td>
			</tr>

			<tr>
				<td><input type="submit" name="submit" value="save"></td>
			</tr>

		</table>
	</form>

</body>
</html>