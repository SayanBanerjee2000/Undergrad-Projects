<?php
include("lib/connection.php");

$sql_content="SELECT * FROM `travel_content` WHERE `id`='1'";
$rs_content=mysqli_query($con,$sql_content);
$row_content=mysqli_fetch_array($rs_content);



$sql_news="SELECT * FROM `travel_news` ORDER BY  `id` ASC ";
$rs_news=mysqli_query($con,$sql_news);



$sql_packagefirst="SELECT * FROM `travel_package` ORDER BY  `id` ASC LIMIT 0,5 ";
$rs_packagefirst=mysqli_query($con,$sql_packagefirst);


$sql_packagesecond="SELECT * FROM `travel_package` ORDER BY  `id` DESC LIMIT 0,4 ";
$rs_packagesecond=mysqli_query($con,$sql_packagesecond);


$sql_photo="SELECT * FROM `travel_photogallery` ORDER BY  `id` DESC LIMIT 0,12 ";
$rs_photo=mysqli_query($con,$sql_photo);
?>

<html>
<head>
<title>Travel Agency</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link href="styles/colorbox.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="js/jquery-1.6.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.colorbox.js"></script>
</head>

<body>
<table width="780" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td align="center" valign="top"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td valign="top" style="padding-top:5px;"><table width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td width="65%" valign="top"><?php include("body_main_home.php");?></td>
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
