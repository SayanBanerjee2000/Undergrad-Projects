<?php
session_start();
if(!empty($_SESSION['login_status']))
{
		header("Location: admin_welcome.php");
		exit();
}
include("../lib/connection.php"); 
	if(!empty($_REQUEST['mode']))
	{
					$adm_user=$_REQUEST['adm_user'];
					$adm_pass=$_REQUEST['adm_pass'];
					$sql_chk="SELECT * FROM `travel_admin` WHERE `loginid`='$adm_user' AND `password`='$adm_pass'";
					$rs_chk=mysqli_query($con,$sql_chk);
					$checking = mysqli_num_rows($rs_chk);
					if($checking == '1')
					{			
												$fetch_data=mysqli_fetch_array($rs_chk);
												$loginid = $fetch_data['loginid'];
												$_SESSION['login_status']=$loginid;
												?>
												<script language='javascript'>
													window.location.href="admin_welcome.php";
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
<html>
<head>
<title>Admin Area</title>
<link href="../styles/admin_style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function validate()
{
					if(document.loginform.adm_user.value=='')
					{
						alert('please enter the Login id!');
						document.loginform.adm_user.focus();
						return false;
					}
					if(document.loginform.adm_pass.value=='')
					{
						alert('please enter the password!');
						document.loginform.adm_pass.focus();
						return false;
					}					 
}
</script> 
</head>


<body style="margin:0px; padding:0px;">
<table border="0" cellspacing="0" width="100%">
		<tr height="60">
				<td align="center" bgcolor="#A9B63D">
				<img src="../images/admin_1.jpg">
				</td>
		</tr>
		<tr height="2px"><td bgcolor="#ffffff"></td></tr>
		<tr height="4px"><td align="right" bgcolor="#A9B63D"></td></tr>
</table>


<form name="loginform" id="loginform" method="post" action="index.php" onSubmit="return validate();">
<input type="hidden"  name="mode" id="mode" value="1" >
<p>&nbsp;</p>
<p>&nbsp;</p>
<table class="tab_sty1" align="center" border="0" cellpadding="0" cellspacing="0" width="34%">
	<tr bgcolor="#A9B63D" height="20"><td colspan="4" class="mysty1"><div align="center"><font color="#FFFFFF"><b>Administrator Login</b></font></div></td></tr>
	<tr><td><div align="center"></div></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td rowspan="6" width="45%"><img src="../images/key.jpg" height="112" width="150"></td>
	</tr>
	<tr><td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
    <tr>
		<td class="mysty1" align="center" width="27%"><div align="right">&nbsp;<b>Login ID : </b></div></td>
		<td width="2%">&nbsp;</td>
		<td align="left" width="26%"><input name="adm_user" id="adm_user" size="15" maxlength="20" type="text"></td>
	</tr>
	<tr><td align="center">&nbsp;</td>
	  <td align="center">&nbsp;</td>
	  <td align="center">&nbsp;</td>
    </tr>
	<tr>
		<td class="mysty1" align="center"><div align="right"><b>Password : </b></div></td>
		<td>&nbsp;</td>
		<td align="center"><div align="left"><input name="adm_pass" id="adm_pass" size="15" type="password"></div></td>
	</tr>
	<tr><td align="center">&nbsp;</td>
	  <td align="center">&nbsp;</td>
	  <td align="center">&nbsp;</td>
    </tr>
	<tr><td align="center">&nbsp;</td>
	  <td align="center">&nbsp;</td>
	  <td align="center">&nbsp;</td>
    </tr>
	<tr><td colspan="4" align="center"><input  type="submit" name="submit" value="" style="background-image: url(../images/go_but.gif); width: 38px; height: 18px; border: 0 none;"></td></tr>
	<tr><td colspan="4">&nbsp;</td></tr>
</table>
</form>

<p><img src="../images/white_px.jpg" border="0" height="75"></p>
<p><img src="../images/white_px.jpg" border="0" height="50"></p>
<table border="0" cellspacing="0" width="100%" style="vertical-align:bottom;"  >
	<tr height="4px"><td align="right" bgcolor="#A9B63D"></td></tr>
		<tr height="2px"><td bgcolor="#ffffff"></td></tr>
		<tr height="60">
				<td align="center" bgcolor="#A9B63D">&nbsp;
				
				</td>
		</tr>

</table>
</body>
</html>
 