<tr>
<td>
<form name="voteadmin" action="?admin=votes{$what}" method="post" onsubmit="return(DZCP.submitButton())">
<table class="hperc" cellspacing="1">
<tr>
  <td class="contentHead" colspan="2" align="center"><span class="fontBold">{$head}</span></td>
</tr>
{$error}
<tr>
  <td class="contentMainTop" width="160"><span class="fontBold">{lang msgID="votes_admin_question"}:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="question" value="{$question1}" class="inputField_dis"
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop" width="160"><span class="fontBold">{lang msgID="votes_admin_answer"} 1:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="a1" value="{$a1}" class="inputField_dis"
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop" width="160"><span class="fontBold">{lang msgID="votes_admin_answer"} 2:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="a2" value="{$a2}" class="inputField_dis"
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop" width="160"><span class="fontBold">{lang msgID="votes_admin_answer"} 3:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="a3" value="{$a3}" class="inputField_dis"
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop" width="160"><span class="fontBold">{lang msgID="votes_admin_answer"} 4:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="a4" value="{$a4}" class="inputField_dis"
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop" width="160"><span class="fontBold">{lang msgID="votes_admin_answer"} 5:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="a5" value="{$a5}" class="inputField_dis"
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop" width="160"><span class="fontBold">{lang msgID="votes_admin_answer"} 6:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="a6" value="{$a6}" class="inputField_dis"
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop" width="160"><span class="fontBold">{lang msgID="votes_admin_answer"} 7:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="a7" value="{$a7}" class="inputField_dis"
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop" width="160"><span class="fontBold">{lang msgID="votes_admin_answer"} 8:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="a8" value="{$a8}" class="inputField_dis"
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop" width="160"><span class="fontBold">{lang msgID="votes_admin_answer"} 9:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="a9" value="{$a9}" class="inputField_dis"
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop" width="160"><span class="fontBold">{lang msgID="votes_admin_answer"} 10:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="a10" value="{$a10}" class="inputField_dis"
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop" width="160"><span class="fontBold">{lang msgID="votes_admin_intern"}</span></td>
  <td class="contentMainFirst" align="center"><input class="checkbox" type="checkbox" value="1" name="intern" {$intern} /></td>
</tr>
{$br1}
<tr>
  <td class="contentMainTop" width="160"><span class="fontBold">{lang msgID="votes_admin_closed"}</span></td>
  <td class="contentMainFirst" align="center"><input class="checkbox" type="checkbox" value="1" name="closed" {$isclosed} /></td>
</tr>
{$br2}
<tr>
  <td class="contentBottom" colspan="2"><input id="contentSubmit" type="submit" value="{$value}" class="submit" /></td>
</tr>
</table>
</form>
</td>
</tr>