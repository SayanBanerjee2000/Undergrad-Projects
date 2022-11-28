<table width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td align="right" valign="top" style="padding-right:6px;"><table width="260" cellpadding="0" cellspacing="0" bgcolor="#506EC4">
              <tr>
                <td style="padding-top:10px; padding-bottom:10px;">
				<div class="menu"><a href="index.php">Home</a></div>
				<div class="menu"><a href="aboutus.php">About Us</a></div>
				<div class="menu"><a href="packages.php">Packages</a></div>
				<div class="menu"><a href="faq.php">FAQ</a></div>
				<div class="menu"><a href="contactus.php">Contact Us</a></div>				</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="right" valign="top" style="padding-right:6px; padding-top:5px;">
			
			<table width="260" cellpadding="0" cellspacing="0" bgcolor="#F88129">
              <tr>
                <td align="left" valign="top" style="padding-top:19px; padding-left:19px;"><img src="images/index_20.jpg" width="191" height="26" alt="" /></td>
              </tr>
			  
			    <tr>
                <td align="center" valign="top" style="padding-top:12px;
				padding-bottom:12px;"><img src="images/index_45.jpg" width="196" height="88" alt="" /></td>
              </tr>
			  
			  <tr>
			  <td align="left" valign="top" style="color:#FFFFFF; padding-left:24px; padding-top:10px; padding-right:4px;">
             	<marquee direction="up"  height="352" scrolldelay="200" > 
				<?php
				while($row_news=mysqli_fetch_array($rs_news))
				{
				?>				
					<span style="color:#0E541E; font-weight:bold;"><?php echo date("F j, Y",strtotime($row_news['created_at'])); ?></span><br />
					 <?php echo substr($row_news['details'],0,100); ?><br /><br />
				  <span  style="float:right;"><a href="newsdetails.php?id=<?php echo $row_news['id'] ?>" class="more2"  style="text-decoration:none;">read more </a></span><br /><br /> 
				  
				  <?php
				  }
				  ?>
				</marquee>
			 </td>
			  </tr>
			  
            </table></td>
          </tr>
        </table>