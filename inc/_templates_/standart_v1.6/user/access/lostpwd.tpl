<tr>
  <td class="contentHead" colspan="2" align="center"><span class="fontBold">{lang msgID="lostpwd_head"}</span></td>
</tr>
{if !$lock}
{$notification_page}
<tr>
<td>
<form name="lostpwd" action="?action=lostpwd&amp;do=sended" method="post" onsubmit="return(DZCP.submitButton())">
<table class="hperc" cellspacing="1">
<tr>
  <td class="contentMainTop" width="25%"><span class="fontBold">{lang msgID="loginname"}:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="user" class="inputField_dis" {$lock}
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
  <td class="contentMainTop" width="25%"><span class="fontBold">{lang msgID="email"}:</span></td>
  <td class="contentMainFirst" align="center">
    <input type="text" name="email" class="inputField_dis" {$lock}
    onfocus="this.className='inputField_en';"
    onblur="this.className='inputField_dis';" />
  </td>
</tr>
<tr>
    <td class="contentMainTop" style="vertical-align:middle"><span class="fontBold">{lang msgID="register_confirm"}: </span><span class="fontRed">*</span></td>
    <td class="contentMainFirst" align="center">
        <table class="corner" style="width:204px;border: 1px solid #d4d4d4;">
            <tbody>
                <tr>
                    <td colspan="2" style="width:195"><img class="corner" onmouseover="DZCP.showInfo('{lang msgID="capcha_sound_info"}')" onmouseout="DZCP.hideInfo()" onClick="DZCP.EvalSound('../inc/ajax.php?i=securimage_audio')" src="{idir}/ajax_loading.gif" alt="CAPTCHA Image" name="siimage_lostpwd" hspace="0" vspace="0" id="siimage_lostpwd" style="border: 1px solid #d4d4d4; margin-right: 1px" />
                        <script language="javascript" type="text/javascript">DZCP.initDynCaptcha('siimage_lostpwd',0,0,0,'',0,'{sid}');</script></td>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="secure" size="23" maxlength="25" {$lock}/></td>
                    <td><a tabindex="-1" style="border-style: none;" href="#" title="Refresh Image" onclick="DZCP.initDynCaptcha('siimage_lostpwd',0,0,0,'',0,''); this.blur(); return false"><img src="{idir}/securimage/refresh.png" alt="Reload Image" height="16" width="16" onclick="this.blur()" border="0" /></a></td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
<tr>
  <td class="contentBottom" colspan="2"><input id="contentSubmit" type="submit" value="{lang msgID="button_value_send"}" class="submit" {$lock}/></td>
</tr>
</table>
</form>
</td>
</tr>
{else}
    <tr>
        <td>
            <div align="center">
                <br><p><span style="font-size: 13px;">Diese Funktion steht nur zur Verfügung, wenn du die Datenschutz-Grundverordnung (EU-DSGVO) akzeptiert hast.</span>
                <p><span style="font-size: 13px;">Diese findest du hier: <a href="sdfsdfsdfsd" target="_parent">{$dsgvo_url}</a></span><br><br>
            </div>
        </td>
    </tr>
{/if}