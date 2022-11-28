<?php 
include("connection.php");
$sql_temp = "SELECT * FROM temp";
$res_temp = mysqli_query($con, $sql_temp);
$row_temp = mysqli_fetch_array($res_temp);
$id = $row_temp['loginid'];
if(mysqli_num_rows($res_temp) == '1')
{
	$sql = "SELECT * FROM `helpdesk`";
	$res = mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($res))
	{
		$agent_msg = $row['agent_msg'];
		$cust_msg = $row['cust_msg'];
		$user_name = $row_temp['name'];
		$user_id = $row_temp['loginid'];
		if($agent_msg == NULL)
		{
			echo '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><div class="msg-user">'.$user_name.' ('.$user_id.')'.'</div>'.$cust_msg.'</div></div>';
		} elseif($cust_msg == NULL) {
			echo '<div class="user-inbox inbox"><div class="msg-header"><div class="msg-user">You</div>'.$agent_msg.'</div></div>';
		}
	}
}


?>