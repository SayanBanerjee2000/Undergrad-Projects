<?php
session_start();
if(empty($_SESSION['login_status']))
{
		header("Location: index.php");
		exit();
}
include("../lib/connection.php");   
$sql_content="SELECT * FROM `travel_content` ORDER BY `id` ASC";
$rs_content=mysqli_query($con,$sql_content);

if(!empty($_REQUEST['msg']))
{
	$msg = $_REQUEST['msg'];
}
else
{
	$msg = "";
}
?>
<html>
<head>
<title>Admin Area</title>
<link href="../styles/admin_style.css" rel="stylesheet" type="text/css">
</head>

<body style="margin:0px; padding:0px;"> 
<?php include("header.php");    ?>
<table align="left" border="0" cellpadding="0" cellspacing="0" width="90%"  >
		<tr>
		<td align="left" valign="top" width="20%"> 
					<?php include("left.php");    ?>
		</td>
		<td align="center" valign="top" width="68%">
		
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr height="20"><td colspan="2"></td></tr>
							<tr>
							<td colspan="4" class="black" align="center"><b>Content Management</b></td>
							</tr>
							<tr height="10"><td colspan="2"></td></tr>
							<tr>		
							<td align="center" width="15%">&nbsp;</td>
							<td colspan="2" class="mysty4" align="center" width="70%" style="color:#FF0000;">&nbsp;<?php echo $msg; ?></td>
							<td align="center" width="15%">&nbsp;</td>
							</tr>
					</table>	
					
					
					<table class="tab_sty1" align="center" border="0" cellpadding="0" cellspacing="1" width="100%">
								<tr class="list" height="18">
								<td colspan="6" class="mysty2" align="center" bgcolor="#A9B63D"><font color="#FFFFFF" size="2"><b>Content Details</b></font>&nbsp;&nbsp;&nbsp;&nbsp;</td>
								</tr>
								
								
								<tr bgcolor="#D4DCE4" height="18">       
								<td class="mysty1" align="center" ><b>Sl.</b></td>	   
								<td class="mysty1" align="center" ><b>Page Name</b></td>  
								<td class="mysty1"  align="center"><b>Edit</b></td>
								</tr>
<?php
$i=0;
while($row_content=mysqli_fetch_array($rs_content))
{ 
$i++;
?>								
								
								
<tr bgcolor="#eeeeee">       
<td class="mysty1" align="center"><?php echo $i; ?></td>	   
<td class="mysty1" align="center"><?php echo $row_content['name']; ?></td>   
<td align="center" ><a href="content_edit.php?id=<?php echo $row_content['id']; ?>" class="A3"  ><img src="../images/edit.png" border="0"></a></td>							      
</tr>
<?php
}
?>								
								
								
								 
								
								
								
								 
					
					</table>
		</td>
		</tr>
</table>
<p><img src="../images/white_px.jpg" border="0" height="10"></p> 
</body>
</html>
 