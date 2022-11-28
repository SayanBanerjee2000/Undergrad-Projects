<?php
include("lib/connection.php");
include("lib/common.php");


if(!empty($_REQUEST['mode']))
{ 
	$username = $_REQUEST['username'];
	$useraddress = $_REQUEST['useraddress'];
	$city = $_REQUEST['city'];
	$country = $_REQUEST['country'];
	$phoneno = $_REQUEST['phoneno'];
	$emailadd = $_REQUEST['emailadd'];
	$comments = $_REQUEST['comments'];



	$msg="<table align='center' cellpadding='0' cellspacing='0' width='500' style='border:1px solid #000000;'>
			<tr bgcolor='#000000' height=18>
			  <td colspan='4' align='center'>
			  <font color='#FFFFFF' size='2' face='Verdana, Arial, Helvetica, sans-serif'><strong>Contact Us Details</strong></font></td>
			</tr>
			<tr height=10><td colspan=4></td></tr>
			<tr   height=18>
				<td width='2%'>&nbsp;</td>
				<td width='20%'><b>Name</b></td>
				<td width='1%' align=center><b>:</b></td>
				<td width='77%'>$username</td>
			</tr>
			<tr height=10><td colspan=4></td></tr>
			<tr  height=20>
				<td>&nbsp;</td>
				<td><b>Address</b></td>
				<td align=center><b>:</b></td>
				<td>$useraddress</td>
			</tr>
			<tr height=10><td colspan=4></td></tr>	
			<tr height=10><td colspan=4></td></tr>
			<tr   height=20>
				<td>&nbsp;</td>
				<td><b>City</b></td>
				<td align=center><b>:</b></td>
				<td>$city</td>
			</tr>		
			<tr height=10><td colspan=4></td></tr>
			<tr   height=20>
				<td>&nbsp;</td>
				<td><b>Country</b></td>
				<td align=center><b>:</b></td>
				<td>$country</td>
			</tr>	
			<tr height=10><td colspan=4></td></tr>
			<tr   height=20>
				<td>&nbsp;</td>
				<td><b>Phone no</b></td>
				<td align=center><b>:</b></td>
				<td>$phoneno</td>
			</tr>	
			<tr height=10><td colspan=4></td></tr>
			<tr   height=20>
				<td>&nbsp;</td>
				<td><b>Email Address</b></td>
				<td align=center><b>:</b></td>
				<td>$emailadd</td>
			</tr>	
			<tr height=10><td colspan=4></td></tr>
			<tr   height=20>
				<td>&nbsp;</td>
				<td><b>Comments</b></td>
				<td align=center><b>:</b></td>
				<td>$comments</td>
			</tr>				
		</table>";


 
	$senderEmail = SITE_EMAIL;
	$subject="Contact Us Mail";
	$to="siteadministrator@gmail.com";
	$fr="From: $senderEmail";
	
	$headers="MIME-Version: 1.0\r\n";
	$headers.= "Content-type: text/html; charset=ISO-8859-1\r\n";
	$headers.= $fr . "\r\n";			
	
	$val=mail($to,$subject,$msg,$headers);
			if($val)
			{
					$finalmsg="*Informations successfully Placed!";
			}
			else
			{
					$finalmsg="*Mail delivery Failed!";
			}
}

$sql_news="SELECT * FROM `travel_news` ORDER BY  `id` ASC ";
$rs_news=mysqli_query($con,$sql_news);
 
?>

<html>
<head>
<title>Travel Agency</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" /> 
	<script language="javascript" type="text/javascript">
		function checkingcontact()
		{
				if(document.getElementById('username').value=='')
				{
					document.getElementById('username').style.backgroundColor='#70B3E0';
					document.sampleform.username.focus();
					return false;
				}
				else
				{
					document.getElementById('username').style.backgroundColor ='';
				}

				if(document.getElementById('useraddress').value=='')
				{
					document.getElementById('useraddress').style.backgroundColor='#70B3E0';
					document.sampleform.useraddress.focus();
					return false;
				}
				else
				{
					document.getElementById('useraddress').style.backgroundColor ='';
				}
								
				if(document.getElementById('city').value=='')
				{
					document.getElementById('city').style.backgroundColor='#70B3E0';
					document.sampleform.city.focus();
					return false;
				}
				else
				{
					document.getElementById('city').style.backgroundColor ='';
				}
				
				if(document.getElementById('country').value=='')
				{
					document.getElementById('country').style.backgroundColor='#70B3E0';
					document.sampleform.country.focus();
					return false;
				}
				else
				{
					document.getElementById('country').style.backgroundColor ='';
				}		
				
				if(document.getElementById('phoneno').value=='')
				{
					document.getElementById('phoneno').style.backgroundColor='#70B3E0';
					document.sampleform.phoneno.focus();
					return false;
				}
				else
				{
					document.getElementById('phoneno').style.backgroundColor ='';
				}	
										
				if(document.getElementById('emailadd').value=='')
				{
					document.getElementById('emailadd').style.backgroundColor='#70B3E0';
					document.sampleform.emailadd.focus();
					return false;
				}
				else
				{
					document.getElementById('emailadd').style.backgroundColor ='';
				}	
				
				if(document.getElementById('comments').value=='')
				{
					document.getElementById('comments').style.backgroundColor='#70B3E0';
					document.sampleform.comments.focus();
					return false;
				}
				else
				{
					document.getElementById('comments').style.backgroundColor ='';
				}	
								
		}
	</script>	
</head>

<body>
<table width="780" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td align="center" valign="top"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td valign="top" style="padding-top:5px;"><table width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td width="65%" valign="top"><?php include("body_contact.php");?></td>
        <td width="35%" valign="top"><?php include("body_right.php");?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top" style="padding-top:6px;"><?php include("footer.php");?></td>
  </tr>
</table>
</body>
</html>
