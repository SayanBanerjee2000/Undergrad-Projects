<table width="94%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td height="35" align="left" valign="middle" class="heading" style="padding-top:6px;"><?php echo $row_news['title'];?> - <span style="color:#0E541E; font-weight:normal;"><?php echo date("F j, Y",strtotime($row_news['created_at'])); ?></span></td>
          </tr>
          <tr>
            <td valign="top" class="contentbody">
				<?php echo nl2br($row_news['details']);?>
              </td>
          </tr>
       
        </table>