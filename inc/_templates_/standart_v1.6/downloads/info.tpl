<tr>
  <td class="contentHead" align="center" colspan="2"><span class="fontBold">{$dlname} - {lang msgID="dl_info2"}</span></td>
</tr>
<tr>
  <td width="30%" class="contentMainTop"><span class="fontBold">{lang msgID="dl_file"}:</span></td>
  <td class="contentMainFirst">{$file}</td>
</tr>
<tr>
  <td width="30%" valign="top" class="contentMainTop"><span class="fontBold">{lang msgID="dl_besch"}:</span></td>
  <td class="contentMainFirst">{$besch}</td>
</tr>
{$br1}
<tr>
  <td width="30%" class="contentMainTop"><span class="fontBold">{lang msgID="dl_size"}:</span></td>
  <td class="contentMainFirst">{$size}</td>
</tr>
{$br2}
<tr>
  <td width="30%" class="contentMainTop"><span class="fontBold">{lang msgID="dl_date"}:</span></td>
  <td class="contentMainFirst">{$date}</td>
</tr>
{$br1}
<tr>
  <td width="30%" class="contentMainTop"><span class="fontBold">{lang msgID="dl_date"}:</span></td>
  <td class="contentMainFirst">{$lastdate}</td>
</tr>
{$br2}
<tr>
  <td class="contentHead" align="center" colspan="2"><span class="fontBold">{lang msgID="dl_info"}</span></td>
</tr>
<tr>
  <td width="30%" class="contentMainTop"><span class="fontBold">{lang msgID="dl_loaded"}:</span></td>
  <td class="contentMainFirst">{$loaded}</td>
</tr>
{$br1}
<tr>
  <td width="30%" class="contentMainTop"><span class="fontBold">{lang msgID="dl_traffic"}:</span></td>
  <td class="contentMainFirst">{$traffic}</td>
</tr>
<tr>
  <td width="30%" valign="top" class="contentMainTop"><span class="fontBold">{lang msgID="dl_speed"}:</span></td>
  <td class="contentMainFirst">
    <table class="hperc">
      <tr>
        <td><span class="fontBold">DSL 1000</span> (1 MBit/s) <span class="fontBold">:</span></td>
        <td>{$speed_dsl1024} Min.</td>
      </tr>
      <tr>
        <td><span class="fontBold">Q-DSL</span> (2 MBit/s) <span class="fontBold">:</span></td>
        <td>{$speed_dsl2048} Min.</td>
      </tr>
      <tr>
        <td><span class="fontBold">DSL 3000</span> (3 MBit/s) <span class="fontBold">:</span></td>
        <td>{$speed_dsl3072} Min.</td>
      </tr>
      <tr>
        <td><span class="fontBold">DSL 6000</span> (6 MBit/s) <span class="fontBold">:</span></td>
        <td>{$speed_dsl6016} Min.</td>
      </tr>
      <tr>
        <td><span class="fontBold">DSL 16000</span> (16 MBit/s) <span class="fontBold">:</span></td>
        <td>{$speed_dsl16128} Min.</td>
      </tr>
    </table>
  </td>
</tr>
{$br2}
<tr>
  <td class="contentBottom" colspan="2">
    <form action="" method="get" onsubmit="return(DZCP.submitButton())">
      <input type="hidden" name="action" value="getfile" />
      <input type="hidden" name="id" value="{$id}" />
      <input id="contentSubmit" type="submit" class="submit" value="{$getfile}" />
    </form>
  </td>
</tr>