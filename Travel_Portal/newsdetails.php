<?php
include("lib/connection.php");

$id=$_REQUEST['id'];
$sql_news="SELECT * FROM `travel_news` WHERE `id`='$id'";
$rs_news=mysqli_query($con,$sql_news);
$row_news=mysqli_fetch_array($rs_news);
 

$sql_news="SELECT * FROM `travel_news` ORDER BY  `id` ASC ";
$rs_news=mysqli_query($con,$sql_news);

 
?>

<html>
<head>
<title>Travel Agency</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" /> 
</head>

<body>
<table width="780" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td align="center" valign="top"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td valign="top" style="padding-top:5px;"><table width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td width="65%" valign="top"><?php include("body_news.php");?></td>
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
