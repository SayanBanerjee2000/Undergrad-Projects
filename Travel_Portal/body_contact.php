<form id="sampleform" name="sampleform" method="post" action="" style="margin-bottom:auto;" onSubmit="return checkingcontact();">
<input type="hidden" name="mode" value="1" />
<table width="93%" border="0" align="center" cellpadding="2" cellspacing="4">
            <tr>
              <td height="35" colspan="3" align="left" valign="middle" class="heading" style="color:#A5B905; font-weight:bold; font-size:14px; padding-left:21px;">Contact Us</td>
            </tr>
			
			<tr>
              <td  colspan="2" align="left"  valign="middle" class="contact" style="color:#FF0000" >&nbsp;<?php echo $finalmsg; ?></td>
               
            </tr>
			
            <tr>
              <td width="32%" align="left" valign="middle" class="contact">Your Name:</td>
              <td width="68%" colspan="2"><input type="text" name="username" id="username" style="width:250px; height:20px;" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="contact">Address:</td>
              <td colspan="2"><input type="text" name="useraddress"  id="useraddress" style="width:250px; height:20px;" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="contact">City:</td>
              <td colspan="2"><input type="text" name="city" id="city" style="width:250px; height:20px;" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="contact"> Country:</td>
              <td colspan="2"><input type="text" name="country" id="country" style="width:250px; height:20px;" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="contact">Phone no:</td>
              <td colspan="2"><input type="text" name="phoneno" id="phoneno" style="width:250px; height:20px;" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="contact">Email Address:</td>
              <td colspan="2"><input type="text" name="emailadd" id="emailadd" style="width:250px; height:20px;" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="contact">Comments:</td>
              <td colspan="2"><textarea name="comments" id="comments" rows="5" style="width:250px;" cols="25"></textarea></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                     
                    <td width="100%"><input type="image" name="imageField2" src="images/submit.gif" style="border:none;" /></td>
                  </tr>
              </table></td>
            </tr>
          </table>
		  </form>