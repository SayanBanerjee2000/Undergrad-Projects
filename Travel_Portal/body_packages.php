<table width="94%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td height="35" align="left" valign="middle" class="heading" style="padding-top:6px;">Packages</td>
          </tr>
          <tr>
            <td valign="top" class="contentbody">
				<table width="440" cellspacing="0" cellpadding="0">
                
                  <tr>
                    <td width="51%"  align="left" valign="top">
					<?php
				
					while($row_packagefirst=mysqli_fetch_array($rs_packagefirst))
					{
					?>
			 <div class="link" style="border-bottom:#D7E189 1px solid;" title="Click here for Details">
			 <a href="packageDetails.php?id=<?php echo $row_packagefirst['id']; ?>"><?php echo $row_packagefirst['name']; ?></a> </div>			
							 						 
					<?php
					}
					?>				
					</td>
                     
                  </tr>
				  
			 
                </table>
              </td>
          </tr>
       
        </table>