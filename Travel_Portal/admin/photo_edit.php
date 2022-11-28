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
						//////////////////////////////////////////////// Code for Image Edit Start //////////////////////////////
						$uploadlocation="../uploaded/";
						$fetchOldimage = $_REQUEST['oldimage'];
						$fetchFileName = $_FILES['image0']['name'];
						$rand_variable = rand(1111, 9999);
						$new_file=$rand_variable."_".$fetchFileName;
						if(is_uploaded_file($_FILES['image0']['tmp_name']))
						{
								// ~~~~~~~~~ Delete Previous image Start  ~~~~~~~~~~ //
								@unlink($uploadlocation.$fetchOldimage);
								// ~~~~~~~~~ Delete Previous image End  ~~~~~~~~~~ //
								@move_uploaded_file($_FILES['image0']['tmp_name'],$uploadlocation.$new_file);
								$updatedFileName=$new_file;
						}
						else
						{
								$updatedFileName=$fetchOldimage;
						}
						//////////////////////////////////////////////// Code for Image Edit End //////////////////////////////
						
						
						$sql_con="Update `travel_photogallery` SET 
										`photo`='$updatedFileName'
										 WHERE `id`='$id' ";  
						$res=mysqli_query($con,$sql_con);		
						if($res)	
						{
							@header("Location: photo_mgt.php?msg=Sucessfull Edit");
							exit();
						}
					 
								 
	}	
 


 
$sql_photo="SELECT * FROM `travel_photogallery` WHERE `id`='$id'";
$rs_photo=mysqli_query($con,$sql_photo);
$row_photo=mysqli_fetch_array($rs_photo);					
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
							<td colspan="4" class="black" align="center"><b>Photo Management</b></td>
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
<input type="hidden" name="oldimage" value="<?php echo $row_photo['photo']; ?>" />	
			
					<table class="tab_sty1" align="center" border="0" cellpadding="0" cellspacing="1" width="59%">
		 <tr class="mysty2" bgcolor="#A9B63D" height="18">
    				<td colspan="2" class="mysty2" align="center" bgcolor="#A9B63D"><span class="style2"><strong><font color="#ffffff">Upload New Photo</font></strong></span></td>
		  </tr>
		<tr><td colspan="2">&nbsp;</td></tr>


 
 

<tr>
<td class="mysty1"   width="161" align="right">Upload New Photo :</td>
<td width="322">
<input type="file" name="image0" id="image0">
</td>
</tr>
<tr>
<td height="5">&nbsp;</td>
<td height="5" style="padding-left:100px;"><img src="../uploaded/<?php echo $row_photo['photo']; ?>" height="50" width="50" border="0" ></td>
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
 