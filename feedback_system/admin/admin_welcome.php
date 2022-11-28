<?php
session_start();
if(empty($_SESSION['login_status']))
{
		header("Location: index.php");
		exit();
}
	include("connection.php");    
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admindash.css">
	<title>Admin Welcome</title>
	<style>

		</style>

</head>
<body>

	
	<section>
	
	<div class="color"></div>
        <div class="color"></div>
        <div class="color"></div> 
		<h1 style="font-family: Times New Roman;position:fixed" class="h"> Administrator Zone </h1>       
        <div class="container">
		<div class="card">
		<div class="circle">
                    <h2>01</h1>
                </div>
				<div class="content">
				<a href="student_det.php">Student details</a>
				</div>
				</div>
				<div class="card">
				<div class="circle">
                    <h2>02</h1>
                </div>
				<div class="content">
				<a href="teacher_det.php">Teacher details</a>
				</div>
				</div>
			<div class="card">
			<div class="circle">
                    <h2>03</h1>
                </div>
				<div class="content">
			
			<a href="exam_det.php">Exam details</a>
			</div>
			</div>

			<div class="card">
			<div class="circle">
                    <h2>04</h1>
                </div>
				<div class="content">
			<a href="subject_det.php">Subject details</a></td>
			</div>
			</div>
			<div class="card">
			<div class="circle">
                    <h2>05</h1>
                </div>
				<div class="content">
				<a href="logout.php">logout</a>
			</div>
			</div>
			</div>
</section>
</body>
</html>