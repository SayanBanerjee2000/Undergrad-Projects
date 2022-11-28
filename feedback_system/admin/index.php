<?php
session_start();
if(!empty($_SESSION['login_status']))
{
		header("Location: admin_welcome.php");
		exit();
}
include("connection.php");


if(!empty($_REQUEST['mode']))
	{
					$user_login=$_REQUEST['user_login'];
					$user_pwd=$_REQUEST['user_pwd'];
					$sql_chk="SELECT * FROM `feedback_admin` WHERE `loginid`='$user_login' AND `password`='$user_pwd'";
					$rs_chk=mysqli_query($con,$sql_chk);
					$checking = mysqli_num_rows($rs_chk);
					if($checking == '1')
					{			
												$fetch_data=mysqli_fetch_array($rs_chk);
												$loginid = $fetch_data['loginid'];
												$_SESSION['login_status']=$loginid;
												?>
												<script language='javascript'>
													window.location.href="admin_welcome.php";
												</script>
					<?php
					}
					else
					{
					?>
												<script language='javascript'>
													alert("Either 'Login ID' or 'Password' is incorrect. Please Verify ...");
												</script>
					<?php
					}
	}
				
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/loginui.css">
	<title>Admin Login</title>
	<script type="text/javascript">
		
		function validate()
		{
			var a = document.getElementById('user_login');
			var b = document.getElementById('user_pwd');

			if(a.value == "")
			{
				alert('Please give the Username to login');
				return false;
			}

			if(b.value == "")
			{
				alert('Please give the password');
			}
		}


	</script>
</head>
<body>
<section>
		<div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>

        <div class="container">	
		
	
		<h2 align="center">Admin Login</h2>
		<div class="form">
		<form name="loginform1" action="index.php" method="post" onsubmit="return validate();">
		<input type="hidden"  name="mode" id="mode" value="1" >
				<div class="inputbox">
					<input type="text" name="user_login" id="user_login" placeholder="Username">
				</div>
				<div class="inputbox">
					<input type="password" name="user_pwd" id="user_pwd" placeholder="Password">
				</div>

				<div class="inputbox">
					<input type="submit" name="login" id="login" value="Login">
				</div>
	</form>
	</div>
	</div>
</section>
</body>
</html>