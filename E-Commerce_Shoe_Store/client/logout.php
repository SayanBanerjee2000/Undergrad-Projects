<?php
	session_start();
	include("connection.php");
	unset($_SESSION['client_login_status']);
	session_destroy();

	$sql_del = "DELETE FROM `temp`";
	$res_del = mysqli_query($con, $sql_del);

	$sql_del_chat = "DELETE FROM `helpdesk`";
	$res_del_chat = mysqli_query($con, $sql_del_chat);
	if($res_del)
	{
		echo '<script type="text/javascript">alert("Logout Successful");</script>';
	   	echo ("<script>location.href='index.php'</script>");
	}
	
?>