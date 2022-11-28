<?php
	session_start();
	include("connection.php");
	unset($_SESSION['sub_login_status']);
	session_destroy();
	
	$sql = "DELETE FROM `helpdesk`";
	$res = mysqli_query($con, $sql);

	$sql_temp = "DELETE FROM temp_admin";
	$res_temp = mysqli_query($con, $sql_temp);
	if($res_temp)
	{
	?>
	<script type="text/javascript">
		alert('Logout Successful');
		window.location.href = "sub_admin_login.php";
	</script>
	<?php
	}
?>