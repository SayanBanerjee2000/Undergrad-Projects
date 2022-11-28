<table width="94%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td height="35" align="left" valign="middle" class="heading" style="padding-top:6px;">Photo Gallery</td>
          </tr>
          <tr>
            <td valign="top" class="contentbody">
							<table width="85%" cellpadding="0" cellspacing="0" bgcolor="#EFEAEA">
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
                    </table>
              </td>
          </tr>
       
        </table>