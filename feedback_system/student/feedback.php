<?php
include("connection.php");
if(!empty($_REQUEST['mode']))
{
	$tname=$_REQUEST['tname'];
	$grade1=$_REQUEST['grade1'];
	$grade2=$_REQUEST['grade2'];
	$grade3=$_REQUEST['grade3'];
	$grade4=$_REQUEST['grade4'];
	$grade5=$_REQUEST['grade5'];
	$grade6=$_REQUEST['grade6'];
	$grade7=$_REQUEST['grade7'];
	$grade8=$_REQUEST['grade8'];
	$grade9=$_REQUEST['grade9'];
	$grade10=$_REQUEST['grade10'];

	$sql1="SELECT * from `feedback_teacher` where `name` = '$tname'";
	$res1=mysqli_query($con,$sql1);
	while ($row=mysqli_fetch_array($res1)) {
		$id = $row['loginid'];
	}
	$check=mysqli_num_rows($res1);
	if($check == '1')
	{
		$sql2="INSERT INTO feedback_response SET
			tid='$id',
			tname='$tname',
			question1='$grade1',
			question2='$grade2',
			question3='$grade3',
			question4='$grade4',
			question5='$grade5',
			question6='$grade6',
			question7='$grade7',
			question8='$grade8',
			question9='$grade9',
			question10='$grade10'";
		$res2=mysqli_query($con,$sql2);
		echo "<strong>Successfully submitted</strong>";
	}
	else
	{
		echo "<strong>No such teacher exists</strong>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/feedb.css">
	<title>Feedback</title>
	<style>
		#div1
		{
			float:left;
		}
		#div2
		{
			margin: 0 auto;
			float:right;
		}
		.form h2
		{
			position: relative;
			color: rgb(66, 14, 14);
			font-size: 66px;
			font-weight: 600;
			letter-spacing: 1px;
			margin-bottom: 40px;   
		}
		.form h2::before
			{
				content: '';
				position:absolute;
				left: 0;
				bottom: -10px;
				width: 1008px;
				height: 4px;
				background: #fff;
			}
			.form .inputbox input::placeholder
			{
				font-size: 12px;
				width: 100%;
				color: rgb(14, 10, 10);
			}
			.form .inputbox input[type="submit"]
			{
				background: #dff1ff;
				color: #666;
				max-width: 105px;
				cursor: pointer;
				margin-bottom: 20px;
				font-weight: 650;

			}	
		</style>
</head>
<body>
<section>
		<div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
		<div style="width: 1090px;" class="container">
		<div class="form">
	<h2 align="center">Feedback Form</h2>
	<form method="post">
	
	<input type="hidden" name="mode" id="mode" value="1">
	<div class="inputbox">
	<p align="center">Teacher:<input type="text" name="tname" id="tname"></p>
	</div>
	<p align="center"><a href="student_welcome.php">Click to go back</a></p>
	<p align="center"><a href="teacher_list.php">Click here to get the teacher names</a></p>

<?php
$sql="SELECT * FROM  `feedback_questions` ORDER BY  `id` ASC ";
$sql3="SELECT `name` FROM `feedback_teacher` ORDER BY `id` ASC";
$res=mysqli_query($con, $sql);
$res3=mysqli_query($con, $sql3);
?>
<div  id ="div1" style="height: auto;
    position: relative;
	font: size 12px;
    width: 800px;" class="fetch">
<?php
while($row=mysqli_fetch_array($res))
{
?>
			<p>
			<strong>
			<div class="inputbox">
			<input type="text" placeholder="<?php echo $row['id']?> ) <?php echo $row['questions'];?>" disabled>
			<!-- <?php echo $row['id']?> ) <?php echo $row['questions'];?> -->
</p></strong></div>
<?php
}?> 
</div>

	<div id ="div2" align="right" class="aligner" style="width: 196px;
    align-items: right;
    justify-content: right;">
		<div class="inputbox">
			<p>1) <input type="number" name="grade1" id="grade1"></p>
			</div>
			<div class="inputbox">
			<p>2) <input type="number" name="grade2" id="grade2"></p>
			</div>
			<div class="inputbox">
			<p>3) <input type="number" name="grade3" id="grade3"></p>
			</div>
			<div class="inputbox">
			<p>4) <input type="number" name="grade4" id="grade4"></p>
			</div>
			<div class="inputbox">
			<p>5) <input type="number" name="grade5" id="grade5"></p>
			</div>
			<div class="inputbox">
			<p>6) <input type="number" name="grade6" id="grade6"></p>
			</div>
			<div class="inputbox">
			<p>7) <input type="number" name="grade7" id="grade7"></p>
			</div>
			<div class="inputbox">
			<p>8) <input type="number" name="grade8" id="grade8"></p>
			</div>
			<div class="inputbox">
			9) <input type="number" name="grade9" id="grade9"></p>
			</div>
			<div class="inputbox">
			<p>10) <input type="number" name="grade10" id="grade10"></p>
			</div>
			
			<div style="position:relative;" class="inputbox">
			<input type="submit" name="submit" value="Submit">
			</div>
			</div>
			
	</form>

</body>
</html>