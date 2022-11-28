<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tablestyle.css">
	<title></title>
<style>
	#div1
	{
		margin:0 auto;
	}
	.inputbox input
	{
    height: 60px;
    width: 180px;
    background: rgba(51, 45, 45, 0.2);
    border: none;
    outline: none;
    padding: 10px 10px;
    border-radius: 35px;
    border: 1px solid rgba(255,255,255,0.5);
    border-right: 1px solid rgba(255,255,255,0.2);
    border-bottom: 1px solid rgba(255,255,255,0.2);
    font-size: 12px;
	}
	.inputbox input[type="submit"]
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
	<p><a href="../index.php">Home</a></p>
	<div class="container">
	<form align="center" method="POST">
		<input type="hidden" name="mode" value="1">
		<table class="content-table" align="center">
			<tr>
				<td>Unique-Id</td>
				<td><input type="text" name="uid" id="uid" placeholder="Provide your unique-id" required></td>
			</tr>

			<tr>
				<td>Name</td>
				<td><input type="text" name="uname" id="uname"></td>
			</tr>

			<tr>
				<div class="inputbox">
				<input type="submit" name="submit" value="Fetch Feedback">
			</div>
			</tr>


		</table>
	</form>
</div>
<?php
include("connection.php");
if (!empty($_REQUEST['mode']))
{
	$uid = $_REQUEST['uid'];
	$uname = $_REQUEST['uname'];
	$sql = "SELECT tname, AVG(question1),AVG(question2),AVG(question3),AVG(question4),AVG(question5),AVG(question6),AVG(question7),AVG(question8),AVG(question9),AVG(question10) FROM feedback_response where tid='$uid' AND tname='$uname'";
	$res=mysqli_query($con,$sql);
	$chk=mysqli_num_rows($res);
	if($chk>'0'){
		while($row = mysqli_fetch_array($res))
		{
			?>
			
			<div id="div1" align="center" class="container">
			<table  class="content-table" align="center" border="1">
			<p align="center"><strong>Teacher Name:</strong><?php echo $row['tname'];?></p>
				<thead>
				<tr>
					<th>Questions</th>
					<th>Remarks</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>How good are his/her communication skills?</td>
					<td><?php echo $row['AVG(question1)'];?></td>
				</tr>

				<tr>
					<td>Is he/she approachable?</td>
					<td><?php echo $row['AVG(question2)'];?></td>
				</tr>

				<tr>
					<td>How effective is his/her method of teaching?</td>
					<td><?php echo $row['AVG(question3)'];?></td>
				</tr>

				<tr>
					<td>Is he/she confident with the subject?</td>
					<td><?php echo $row['AVG(question4)'];?></td>
				</tr>

				<tr>
					<td>Does he/she entertains students in clearing doubts?</td>
					<td><?php echo $row['AVG(question5)'];?></td>
				</tr>

				<tr>
					<td>Does he/she gives fair grades?</td>
					<td><?php echo $row['AVG(question6)'];?></td>
				</tr>

				<tr>
					<td>Is he/she successful in developing self-learning habits</td>
					<td><?php echo $row['AVG(question7)'];?></td>
				</tr>

				<tr>
					<td>Does he/she manages time well?</td>
					<td><?php echo $row['AVG(question8)'];?></td>
				</tr>

				<tr>
					<td>Does he/she promotes full class participation?</td>
					<td><?php echo $row['AVG(question9)'];?></td>
				</tr>

				<tr>
					<td>Did he/she ever act as a role model for you?</td>
					<td><?php echo $row['AVG(question10)'];?></td>
				</tr>
			</tbody>
			</table>
		</div>
			
		<?php
		}
	}
}
?>
</body>
</html>