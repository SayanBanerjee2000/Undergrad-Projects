<?php
session_start();
if(empty($_SESSION['login_status']))
{
		header("Location: index.php");
		exit();
}
include("../lib/connection.php");  
$id=$_REQUEST['id'];
	if(!empty($_REQUEST['mode']))
	{
					$id = $_REQUEST['id'];					 
					$name=$_REQUEST['name']; 					
					$details=$_REQUEST['details'];
				 
			 
 				
							$sql_update="UPDATE `travel_package` SET
										 `name`='$name',	
										 `details`='$details'
										 WHERE `id`='$id'";										 
							$res_update=mysqli_query($con,$sql_update);
							if($res_update)
							{
								header("Location: package_mgt.php?msg=successfull edit");
								exit();
							}
					 
								 
	}	
 


 
$sql_package="SELECT * FROM `travel_package` WHERE `id`='$id'";
$rs_package=mysqli_query($con,$sql_package);
$row_package=mysqli_fetch_array($rs_package);					
?>
<html>
<head>
<title>Admin Area</title>
<link href="../styles/admin_style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function validate()
{ 
						if(document.f1.name.value=='0')
						{
							alert("Please enter name");
							document.f1.name.focus();
							return false;
						} 
						if(document.f1.details.value=='')
						{
							alert("Please enter package Details");
							document.f1.details.focus();
							return false;
						}
						 																															
}
</script>
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
							<td colspan="4" class="black" align="center"><b>Package Management</b></td>
							</tr>
							<tr height="10"><td colspan="2"></td></tr>
							<tr>		
							<td align="center" width="15%">&nbsp;</td>
							<td colspan="2" class="mysty4" align="center" width="70%" style="color:#FF0000;">&nbsp; </td>
							<td align="center" width="15%">&nbsp;</td>
							</tr>
					</table>	
<form name="f1" id="f1" method="post" action="" enctype="multipart/form-data" onSubmit="return validate();"> 					
<input type="hidden"  name="mode" id="mode" value="1" >		
<input type="hidden"  name="id" id="id" value="<?php echo $id; ?>" >		
			
					<table class="tab_sty1" align="center" border="0" cellpadding="0" cellspacing="1" width="100%">
		 <tr class="mysty2" bgcolor="#A9B63D" height="18">
    				<td colspan="2" class="mysty2" align="center" bgcolor="#A9B63D"><span class="style2"><strong><font color="#ffffff">Edit Package</font></strong></span></td>
		  </tr>
		<tr><td colspan="2">&nbsp;</td></tr>


 
 

<tr>
<td class="mysty1"   width="250" align="right">Name :</td>
<td width="332"><input name="name" size="48" id="name" type="text" value="<?php echo $row_package['name']; ?>"></td>
</tr>
<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 


 
 


<tr>
<td class="mysty1"   width="250" align="right">Details :</td>
<td width="332"><textarea name="details" id="details" cols="36" rows="10"><?php echo $row_package['details']; ?></textarea>
</td>
</tr>
<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 

 

 
 
 

    <tr>
      <td colspan="2" style="padding-left: 50px;" align="center">
	   <input type="submit" value="Submit" name='submit'></td>
    </tr>
	
<tr><td colspan="2">&nbsp;</td></tr>
	
	</table>
	</form>
		</td>
		</tr>
</table>
<p><img src="../images/white_px.jpg" border="0" height="10"></p>
</body>
</html>
 