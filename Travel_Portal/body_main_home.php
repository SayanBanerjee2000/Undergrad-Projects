<table width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><table width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" cellspacing="0" cellpadding="0">
                  <tr>
                    <td valign="top"></td>
                  </tr>
                  <tr>
                    <td valign="top"><div style="padding-top:29px; padding-left:30px;"><img src="images/index_10.jpg" width="388" height="27" alt="" /></div>
                        <div class="body1"><?php echo substr($row_content['content'],0,185);?>....</div></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top" class="more" style="padding-right:22px; padding-top:10px;"><a href="welcome.php">read more</a> <img src="images/index_14.jpg" width="8" height="5" alt="" /></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td valign="top"><table width="100%" cellspacing="0" cellpadding="0">
                  <tr>
                    <td valign="top" style="padding-left:30px; padding-top:10px;"><img src="images/index_16.jpg" width="280" height="23" alt="" /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" style="padding-top:12px; padding-left:35px;"><table width="85%" cellpadding="0" cellspacing="0" bgcolor="#EFEAEA">
                      <tr>
                        <td>
						
						<table width="100%" cellspacing="5" cellpadding="0">
						
						
                          <tr>
							<?php
							$ii=0;
							while($row_photo=mysqli_fetch_array($rs_photo))
							{
							$ii++;
							?>						  
                      			 <td width="25%"><a class="group4"  href="uploaded/<?php echo $row_photo['photo']; ?>" title="" ><img src="uploaded/<?php echo $row_photo['photo']; ?>" alt="" width="98" height="75" class="border" border="0" /></a></td> 
							<?php
							if($ii%4==0)
							{
								echo "</tr>";
							}
							}
							?>
                          </tr>
						  
						  
                        </table>
						
						
						</td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td valign="top" class="more" style="padding-left:35px; padding-top:10px;
					padding-bottom:8px;"><a href="photogallery.php">view all Photos</a> <img src="images/index_38.jpg" width="18" height="7" alt="" /></td>
                  </tr>
                </table></td>
              </tr>
              
            </table></td>
          </tr>
		  
		   <tr>
		  <td style="padding-left:5px; padding-right:5px; color:#0E541E; font-weight:bold;">
		  <marquee  direction="left"  height="15" scrolldelay="200" > 
		  Contact Us for Booking .... CALL 033 56757557....  Contact Us for Booking .... CALL 033 56757557....  Contact Us for Booking .... CALL 033 56757557....  Contact Us for Booking .... CALL 033 56757557....  
		  </marquee>
		  </td>
		  </tr>
          <tr>
            <td align="center" valign="top" style="padding-top:2px;"><table width="98%" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" bgcolor="#C6D456" style="padding-bottom:12px;"><table width="440" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2" align="left" valign="top" style="padding-top:12px; padding-left:0px; padding-bottom:10px;"><img src="images/index_42.jpg" width="295" height="32" alt="" /></td>
                  </tr>
				  
				  
                  <tr>
                    <td width="51%" rowspan="2" align="left" valign="top">
					<?php
					$kk=0;
					while($row_packagefirst=mysqli_fetch_array($rs_packagefirst))
					{
					$kk++;
								if($kk==5)
								{
									$stylevar="";
								}
								else
								{
									$stylevar='style="border-bottom:#D7E189 1px solid;"';
								}
					?>
							<div class="link" <?php echo $stylevar; ?>><a href="packageDetails.php?id=<?php echo $row_packagefirst['id']; ?>"><?php echo $row_packagefirst['name']; ?></a> </div>							 
					<?php
					}
					?>				
					</td>
                    <td width="49%" align="left" valign="top">
					<?php
					while($row_packagesecond=mysqli_fetch_array($rs_packagesecond))
					{
					?>
					<div class="link" style="border-bottom:#D7E189 1px solid;"><a href="packageDetails.php?id=<?php echo $row_packagesecond['id']; ?>"><?php echo $row_packagesecond['name']; ?></a></div>
					<?php
					}
					?>	
					</td>
                  </tr>
				  
				  
				  
                  <tr>
                    <td align="right" valign="middle" class="more1" style="padding-right:15px;"><a href="packages.php">READ MORE</a> <img src="images/index_49.jpg" alt="" width="11" height="5" /></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
		  
		  
		  
        </table>