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
					$uname=$_REQUEST['uname'];
					$pwd=$_REQUEST['pwd'];
					$sql_chk="SELECT * FROM `admin` WHERE `loginid`='$uname' AND `password`='$pwd'";
					$rs_chk=mysqli_query($con,$sql_chk);
					$checking = mysqli_num_rows($rs_chk);
					if($checking == '1')
					{			
												$fetch_data=mysqli_fetch_array($rs_chk);
												$loginid = $fetch_data['loginid'];
												$_SESSION['login_status']=$loginid;
												?>
<script language='javascript'>
window.location.href = "admin_welcome.php";
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
    <script type="text/javascript">
    function validate() {
        var n = document.getElementById('uname');
        var p = document.getElementById('pwd');
        if (n.value == "") {
            alert("username can't be blank");
            return false;
        }
        if (p.value == "") {
            alert("Password can't be blank");
            return false;
        }
    }
    </script>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="./loginstyle.css">
</head>

<body class="align">


    <div class="grid">
        <h1>ADMIN LOGIN</h1>
        <form name="loginform" action="index.php" class="box form login" method="POST" onsubmit="return validate();">
            <input type="hidden" name="mode" id="mode" value="1">

            <div class="form__field">
                <label for="login__username"><svg class="icon">
                        <use xlink:href="#icon-user"></use>
                    </svg><span class="hidden">Username</span></label>
                <input class="form__input" placeholder="Username" type="text" name="uname" id="uname" required>
            </div>

            <div class="form__field">
                <label for="login__password"><svg class="icon">
                        <use xlink:href="#icon-lock"></use>
                    </svg><span class="hidden">Password</span></label>
                <input id="login__password" type="password" class="form__input" id="password" name="pwd" id="pwd"
                    placeholder="Password" required>
            </div>

            <div class="form__field">
                <input type="submit" value="Log In">
            </div>

        </form>


    </div>

    <svg xmlns="http://www.w3.org/2000/svg" class="icons">
        <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
            <path
                d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
        </symbol>
        <symbol id="icon-lock" viewBox="0 0 1792 1792">
            <path
                d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
        </symbol>
        <symbol id="icon-user" viewBox="0 0 1792 1792">
            <path
                d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
        </symbol>
    </svg>

</body>

</html>