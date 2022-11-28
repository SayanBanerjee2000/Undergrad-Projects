<?php
include("lib/connection.php");
 
$sql_photo="SELECT * FROM `travel_photogallery` ORDER BY  `id` DESC ";
$rs_photo=mysqli_query($con,$sql_photo); 

$sql_news="SELECT * FROM `travel_news` ORDER BY  `id` ASC ";
$rs_news=mysqli_query($con,$sql_news);
 
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
        <td width="65%" valign="top"><?php include("body_photogallery.php");?></td>
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
