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
					$page_content=$_REQUEST['page_content'];
					$id= $_REQUEST['id'];
					$sql_insert="UPDATE `travel_content` SET
								 `content`='$page_content'
								 WHERE `id`='$id'";
					$res_insert=mysqli_query($con,$sql_insert);
					if($res_insert)
					{
						header("Location: content_mgt.php?msg=successfull update here");
						exit();
					}
								 
	}	
$sql_content="SELECT * FROM `travel_content` WHERE `id`='$id'";
$rs_content=mysqli_query($con,$sql_content);
$row_content=mysqli_fetch_array($rs_content);			
?>
<html>
<head>
<title>Admin Area</title>
<link href="../styles/admin_style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function validate()
{ 
						if(document.f1.page_content.value=='')
						{
							alert("Please enter Content.");
							document.f1.page_content.focus();
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
							<td colspan="4" class="black" align="center"><b>Content Management</b></td>
							</tr>
							<tr height="10"><td colspan="2"></td></tr>
							<tr>		
							<td align="center" width="15%">&nbsp;</td>
							<td colspan="2" class="mysty4" align="center" width="70%">&nbsp;</td>
							<td align="center" width="15%">&nbsp;</td>
							</tr>
					</table>	
<form name="f1" id="f1" method="post" action="" enctype="multipart/form-data" onSubmit="return validate();"> 					
<input type="hidden"  name="mode" id="mode" value="1" >	
<input type="hidden"  name="id" id="id" value="<?php echo $id; ?>" >					
					<table class="tab_sty1" align="center" border="0" cellpadding="0" cellspacing="1" width="100%">
		 <tr class="mysty2" bgcolor="#A9B63D" height="18">
    				<td colspan="2" class="mysty2" align="center" bgcolor="#A9B63D"><span class="style2"><strong><font color="#ffffff">Edit Content</font></strong></span></td>
		  </tr>
		<tr><td colspan="2">&nbsp;</td></tr>


 
<tr>
<td class="mysty1"   width="250" align="right" valign="top">Content</td>
<td width="332" style="padding-left:5px;"><textarea name="page_content" id="page_content" cols="70" rows="20"><?php echo $row_content['content']; ?></textarea></td>
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
 