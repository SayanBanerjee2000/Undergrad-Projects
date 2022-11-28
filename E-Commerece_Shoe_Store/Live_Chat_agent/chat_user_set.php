<?php 
include("connection.php");
if (isset($_POST['send_txt_user'])) 
{
	
	$user_msg = $_POST['txt_user'];
	$id = $_POST['hidden_id'];
	$sql = "INSERT INTO `helpdesk` SET `cust_msg` = '$user_msg' , `cust_id` = '$id' ";
	$res = mysqli_query($con, $sql);
	if($res)
	{?>
<script type="text/javascript">
window.location.href = "chat_user.php";
</script>

<?php }
}

?>