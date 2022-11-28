<?php
include("connection.php");
if(isset($_POST['send_txt_agent']))
{
	$id = "agent";
	$msg = $_POST['txt_agent'];

	$sql = "INSERT INTO `helpdesk` SET `agent_msg` = '$msg', `cust_id` ='$id' ";
	$res = mysqli_query($con, $sql);
	if($res)
	{?>
<script type="text/javascript">
window.location.href = "chat_agent.php";
</script>
<?php
	}
}
?>