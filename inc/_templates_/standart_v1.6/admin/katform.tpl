<tr>
  <td class="contentHead" colspan="2" align="center"><span class="fontBold">{$head}</span></td>
</tr>
<tr>
<td>
<form name="forum" enctype="multipart/form-data" action="?admin=forum&amp;do=addkat" method="post" onsubmit="return(DZCP.submitButton())"> 
<table class="hperc" cellspacing="1">
<tr>
  <td class="contentMainTop" width="150"><span class="fontBold">{$fkat}:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="kat" value="{$kat}" class="inputField_dis"
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop"><span class="fontBold">{$fkid}:</span></td>
  <td class="contentMainFirst" align="center">
    <select name="kid" class="dropdown">
      <option value="1">als erstes</option>
      {$positions}
    </select>
  </td>
</tr>
<tr>
  <td class="contentMainTop"><span class="fontBold">{$fart}:</span></td>
  <td class="contentMainFirst" align="center">
    <select name="intern" class="dropdown">
      <option value="0">{$public}</option>
      <option value="1">{$intern}</option>
    </select>
  </td>
</tr>
<tr>
  <td class="contentBottom" colspan="2"><input id="contentSubmit" type="submit" value="{$value}" class="submit" /></td>
</tr>
</table>
</form>
</td>
</tr>