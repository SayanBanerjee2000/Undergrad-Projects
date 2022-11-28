<?php
session_start();
if(empty($_SESSION['login_status']))
{
		header("Location: index.php");
		exit();
}
include("../lib/connection.php");  
	if(!empty($_REQUEST['mode']))
	{
 
					$name =$_REQUEST['name'];
					$details=$_REQUEST['details'];
					$presentDt = date("Y-m-d");
					 			
							$sql_insert="INSERT INTO `travel_news` SET
										 `title`='$name',
										 `details`='$details',
										 `created_at`='$presentDt'";
							$res_insert=mysqli_query($con,$sql_insert);
							if($res_insert)
							{
								header("Location: news_mgt.php?msg=successfull insert");
								exit();
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
						if(document.f1.name.value=='')
						{
							alert("Please enter title");
							document.f1.name.focus();
							return false;
						} 
						if(document.f1.details.value=='')
						{
							alert("Please enter news Description");
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
							<td colspan="4" class="black" align="center"><b>News Management</b></td>
							</tr>
							<tr height="10"><td colspan="2"></td></tr>
							<tr>		
							<td align="center" width="15%">&nbsp;</td>
							<td colspan="2" class="mysty4" align="center" width="70%" style="color:#FF0000;">&nbsp;<?php echo $msgdisplay; ?></td>
							<td align="center" width="15%">&nbsp;</td>
							</tr>
					</table>	
<form name="f1" id="f1" method="post" action="" enctype="multipart/form-data" onSubmit="return validate();"> 					
<input type="hidden"  name="mode" id="mode" value="1" >					
					<table class="tab_sty1" align="center" border="0" cellpadding="0" cellspacing="1" width="100%">
		 <tr class="mysty2" bgcolor="#A9B63D" height="18">
    				<td colspan="2" class="mysty2" align="center" bgcolor="#A9B63D"><span class="style2"><strong><font color="#ffffff">Insert News</font></strong></span></td>
		  </tr>
		<tr><td colspan="2">&nbsp;</td></tr>


 
 

<tr>
<td class="mysty1"   width="250" align="right">Title :</td>
<td width="332"><input name="name" size="48" id="name" type="text"></td>
</tr>
<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 

 

 

<tr>
<td class="mysty1"   width="250" align="right">Desciption :</td>
<td width="332"><textarea name="details" id="details" cols="36" rows="10"></textarea>
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
 