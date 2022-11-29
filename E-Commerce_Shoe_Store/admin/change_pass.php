<?php
session_start();
if(empty($_SESSION['login_status']))
{
		header("Location: index.php");
		exit();
}
include("connection.php");
if(!empty($_REQUEST['mode']))
{
	$old_pass = $_REQUEST['old_pass'];
	$new_pass = $_REQUEST['new_pass'];
	//$con_pass = $_REQUEST['con_pass'];

	$sql = "SELECT * from `admin` where `loginid` = 'admin' and `password`='$old_pass'";
	$res = mysqli_query($con,$sql);
	$check=mysqli_num_rows($res);
	if($check == '1')
	{
		$qry1="UPDATE  `admin` set `password`='$new_pass'  where `id` ='1'";
		$rs1=mysqli_query($con,$qry1);
		if($rs1)
		{
			unset($_SESSION['login_status']);
			session_destroy();
		?>
<script language="javascript">
alert("Password successfully changed.");
window.location.href = 'index.php';
</script>
<?php 
		}
	}
	else
	{
	?>
<script language="javascript">
alert("Your old password is incorrect. Please verify ...");
window.location.href = 'change_pass.php';
</script>
<?php
	}
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Password Manager</title>
    <script type="text/javascript">
    function validate() {
        var a = document.getElementById('old_pass');
        var b = document.getElementById('new_pass');
        var c = document.getElementById('con_pass');

        if (a.value == "") {
            alert('Old password cannot be empty');
            return false;
        }
        if (b.value == "") {
            alert('New password cannot be empty');
            return false;
        } else if (b.value !== c.value) {
            alert('New Password does not matches with confirm password.');
            return false;
        }
    }
    </script>
    <link rel="stylesheet" type="text/css" href="./loginstyle.css">
    <style>
    input {
        font-size: 1rem;
        border-bottom-left-radius: 0.25rem !important;
        border-top-left-radius: 0.25rem !important;
    }
    </style>
</head>

<body class="align">
    <div class="grid">
        <h1>Change Password</h1>
        <form method="POST" class="box form login" action="change_pass.php" onsubmit="return validate();">
            <input type="hidden" name="mode" id="mode" value="1">

            <div class="form__field">
                <input class="form__input" placeholder="Old Password" type="password" id="old_pass" name="old_pass"
                    required>
            </div>

            <div class="form__field">
                <input class="form__input" placeholder="New Password" type="password" id="new_pass" name="new_pass"
                    required>
            </div>

            <div class="form__field">
                <input class="form__input" placeholder="Confirm Password" type="password" id="con_pass" name="con_pass"
                    required>
            </div>

            <div class="form__field">
                <input type="submit" value="Submit">
            </div>

        </form>


    </div>

</body>

</html>