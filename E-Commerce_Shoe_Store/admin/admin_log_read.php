<?php 
include("connection.php");
$pid= $_REQUEST['id'];
$sql="SELECT * FROM  `admin_log` WHERE `id`='$pid' AND status = '0' ";
$res=mysqli_query($con,$sql);

$sql_update = "UPDATE admin_log SET status = '1' WHERE `id` = '$pid'";
$res_update = mysqli_query($con, $sql_update);

if($res_update)
{
	?>
	<script type="text/javascript">
		alert('Message Read');
		window.location.href = 'admin_request.php';
	</script>
<?php }

?>