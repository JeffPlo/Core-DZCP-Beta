<tr>
<td>
<form name="dlkats" action="?admin=dlkats&amp;do={$do}" method="post" onsubmit="return(DZCP.submitButton())">
<table class="hperc" cellspacing="1">
<tr>
  <td class="contentHead" align="center" colspan="2"><span class="fontBold">{$newhead}</span></td>
</tr>
<tr>
  <td class="contentMainTop" width="100"><span class="fontBold">{lang msgID="dl_dlkat"}:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="kat" value="{$kat}" class="inputField_dis"
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
  <td class="contentBottom" colspan="2"><input id="contentSubmit" type="submit" value="{$what}" class="submit" /> | <input type="button" value="{lang msgID="paginator_previous"}" class="submit" onclick="DZCP.goTo('../admin/?admin=forum')" tabindex="6"></td>
</tr>
</table>
</form>
</td>
</tr>