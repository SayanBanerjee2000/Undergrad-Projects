<?php 
include("connection.php");

	$sql = "SELECT * FROM `helpdesk`";
	$res = mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($res))
	{
		$agent_msg = $row['agent_msg'];
		$cust_msg = $row['cust_msg'];
		if($agent_msg == NULL)
		{
			echo '<div class="user-inbox inbox"><div class="msg-header"><div class="msg-user">You</div>'.$cust_msg.'</div></div>';
		} elseif($cust_msg == NULL) {
			echo '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><div class="msg-user">Agent</div>'.$agent_msg.'</div></div>';
		}
	}

?>