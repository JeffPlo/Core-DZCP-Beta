<tr>
<td>
<form id="autologin" name="autologin" action="?action=editprofile&amp;show=almgr&amp;do=almgr_edit_save&amp;id={$id}" method="post" onsubmit="return(DZCP.submitButton())">
<table class="hperc" cellspacing="1">
<tr>
  <td colspan="2" class="contentHead"><span class="fontBold">{lang msgID="almgr_edit_head"}</span></td>
</tr>
<tr>
  <td class="contentMainTop"><span class="fontBold">{lang msgID="almgr_name"}:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="name" value="{$name}" class="inputField_dis_profil"
    onfocus="this.className='inputField_en_profil';"
    onblur="this.className='inputField_dis_profil';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop"><span class="fontBold">{lang msgID="almgr_host"}:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="host" value="{$host}" disabled class="inputField_dis_profil"
    onfocus="this.className='inputField_en_profil';"
    onblur="this.className='inputField_dis_profil';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop"><span class="fontBold">{lang msgID="almgr_ip"}:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="ip" value="{$ip}" disabled class="inputField_dis_profil"
    onfocus="this.className='inputField_en_profil';"
    onblur="this.className='inputField_dis_profil';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop"><span class="fontBold">{lang msgID="almgr_ssid"}:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="ssid" value="{$ssid}" disabled class="inputField_dis_profil"
    onfocus="this.className='inputField_en_profil';"
    onblur="this.className='inputField_dis_profil';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop"><span class="fontBold">{lang msgID="almgr_pkey"}:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="pkey" value="{$pkey}" disabled class="inputField_dis_profil"
    onfocus="this.className='inputField_en_profil';"
    onblur="this.className='inputField_dis_profil';" />
  </td>
</tr>
<tr>
  <td class="contentBottom" colspan="2"><input id="contentSubmit" class="submit" type="submit" value="{lang msgID="button_value_edit"}" /></td>
</tr>
</table>
</form>
</td>
</tr>