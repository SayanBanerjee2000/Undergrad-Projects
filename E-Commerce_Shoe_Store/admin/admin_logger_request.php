<?php
include("connection.php");

if (isset($_POST['txt_submit'])) {
	$msg = $_POST['txt_msg'];
	$sql = "INSERT INTO admin_log SET message = '$msg'";
	$res = mysqli_query($con, $sql);
	if($res)
	{?>
		<script type="text/javascript">
			alert('Log Updated');
			window.location.href = "admin_welcome.php";
		</script>
	<?php }
}

?>