<?php
session_start();
if(empty($_SESSION['login_status']))
{
		header("Location: index.php");
		exit();
}
include("../lib/connection.php");  
$id=$_REQUEST['id']; 
$sql_news="SELECT * FROM `travel_news` WHERE `id`='$id'";
$rs_news=mysqli_query($con,$sql_news);
$row_news=mysqli_fetch_array($rs_news);		

 		
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
							<td colspan="4" class="black" align="center"><b>News Management</b></td>
							</tr>
							<tr height="10"><td colspan="2"></td></tr>
							<tr>		
							<td align="center" width="15%">&nbsp;</td>
							<td colspan="2" class="mysty4" align="center" width="70%" style="color:#FF0000;">&nbsp; </td>
							<td align="center" width="15%">&nbsp;</td>
							</tr>
					</table>	
 	
			
					<table class="tab_sty1" align="center" border="0" cellpadding="0" cellspacing="1" width="100%">
		 <tr class="mysty2" bgcolor="#A9B63D" height="18">
    				<td colspan="2" class="mysty2" align="center" bgcolor="#A9B63D"><span class="style2"><strong><font color="#ffffff">News Detail</font></strong></span></td>
		  </tr>
		<tr><td colspan="2">&nbsp;</td></tr>

 

<tr>
<td class="mysty1"   width="250" align="right">Title :</td>
<td width="332"><input name="student_name" size="48" id="student_name" type="text" value="<?php echo $row_news['title']; ?>"></td>
</tr>
<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 

 


<tr>
<td class="mysty1"   width="250" align="right">Desciption :</td>
<td width="332"><textarea name="student_address" id="student_address" cols="36" rows="10"><?php echo $row_news['details']; ?></textarea>
</td>
</tr>
<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 

 

 
 
 

<tr>
<td colspan="2"   height="10" align="center">&nbsp;</td>
</tr> 
 
 

    <tr>
      <td colspan="2" style="padding-left: 50px;" align="center">
	   <input type="button" value="BACK" name='submit' onClick="window.location.href='news_mgt.php'"></td>
    </tr>
	
<tr><td colspan="2">&nbsp;</td></tr>
	
	</table>
 
		</td>
		</tr>
</table>
<p><img src="../images/white_px.jpg" border="0" height="10"></p>
</body>
</html>
 