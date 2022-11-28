<?php
include("connection.php");
if (!empty($_REQUEST['mode']))
{
	$st_name = $_REQUEST['st_name'];
	$stu_id  = $_REQUEST['stu_id'];
	$session_n = $_REQUEST['session_n'];
	$eng = $_REQUEST['eng'];
	$maths=$_REQUEST['maths'];
	$phy = $_REQUEST['phy'];
	$chem = $_REQUEST['chem'];
	$comp = $_REQUEST['comp'];
	$gpa = $_REQUEST['gpa'];

	$sql_con="INSERT INTO `feedback_exam` SET
					`name`='$st_name',
					`roll`='$stu_id',
					`session`='$session_n',
					`english`='$eng',
					`maths`='$maths',
					`physics`='$phy',
					`chemistry`='$chem',
					`computer`='$comp',
					`gpa`='$gpa'";
	$res=mysqli_query($con, $sql_con);		
	if($res)	
	{
		@header("Location: exam_det.php?msg=Sucessfull Insert");
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
			if(document.getElementById('st_name').value=="")
			{
				alert('Please enter name of student !!');
				return false;
			}
			if(document.getElementById('stu_id').value=="")
			{
				alert('Please enter student id  !!');
				return false;
			}
			if(document.getElementById('session_n').value=="")
			{
				alert('Please enter the session !!');
				return false;
			}
			if(document.getElementById('eng').value=="")
			{
				alert('Please enter english exam marks !!');
				return false;
			}
			if(document.getElementById('maths').value=="")
			{
				alert('Please enter Mathematics exam marks !!');
				return false;
			}
			if(document.getElementById('chem').value=="")
			{
				alert('Please enter chemistry exam marks !!');
				return false;
			}
			if(document.getElementById('phy').value=="")
			{
				alert('Please enter physics exam marks !!');
				return false;
			}
			if(document.getElementById('comp').value=="")
			{
				alert('Please enter computer exam marks !!');
				return false;
			}
			if(document.getElementById('gpa').value=="")
			{
				alert('Please enter GPA !!');
				return false;
			}
		}
	</script>
</head>
<body>

	<h1 align="center">New Exam Marks Details</h1>
	<h2 align="left"><a href="exam_det.php">Click here to go back</a></h2>
	<form method="post" onsubmit="return validate();">
		<input type="hidden" name="mode" value="1">
		<table align="center">
			<tr>
				<td>Student Name</td>
				<td><input type="text" name="st_name" id="st_name"></td>
			</tr>
			<tr>
				<td>Student Roll</td>
				<td><input type="text" name="stu_id" id="stu_id"></td>
			</tr>

			<tr>
				<td>session</td>
				<td><input type="text" name="session_n" id="session_n"></td>
			</tr>

			<tr>
				<td>English</td>
				<td><input type="number" name="eng" id="eng"></td>
			</tr>

			<tr>
				<td>Mathematics</td>
				<td><input type="number" name="maths" id="maths"></td>
			</tr>

			<tr>
				<td>Physics</td>
				<td><input type="number" name="phy" id="phy"></td>
			</tr>
			<tr>
				<td>Chemistry</td>
				<td><input type="number" name="chem" id="chem"></td>
			</tr>
			<tr>
				<td>Computer</td>
				<td><input type="number" name="comp" id="comp"></td>
			</tr>
			<tr>
				<td>GPA</td>
				<td><input type="number" name="gpa" id="gpa" step="any"></td>
			</tr>

			<tr>
				<td><input type="submit" name="submit" value="save"></td>
			</tr>

		</table>
	</form>
	<p style="margin-left: 480px;"><strong>Student Details</strong></p>

	<table border="1" align="left" style="margin-left: 480px;">
		<tr>
			<td><strong>Roll id</strong></td>
			<td><strong>Name</strong></td>
		</tr>
	<?php

	$sql="SELECT loginid,name FROM feedback_student ORDER BY id ASC";
	$ress=mysqli_query($con, $sql);
	while($row=mysqli_fetch_array($ress))
	{?>
		<tr>
			<td><?php echo $row['loginid']?></td>
			<td><?php echo $row['name']?></td>
		</tr>
	<?php
	}?>
	</table>
	</table>
</body>
</html>