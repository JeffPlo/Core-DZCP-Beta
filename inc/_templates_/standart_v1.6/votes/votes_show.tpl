<tr>
  <td class="{$class}" width="19%">{$datum}</td>
  <td class="{$class}" width="60%">{$titel} {$show} {$closed}</td>
  <td class="{$class}" width="20%" nowrap="nowrap">{$autor}</td>
  <td class="{$class}" width="1%" align="center">{$stimmen}</td>
</tr>
<tr id="more{$vid}" style="display:{$display};"> 
  <td class="highlight" colspan="7">
    <form name="vote_{$vid}" action="?action=do&amp;what=vote&amp;id={$vid}" method="post" onsubmit="return DZCP.submitButton('voteSubmit_{$vid}')">
    <table class="hperc" cellspacing="1">
      <tr>
        <td class="contentHead" colspan="3" align="center"><span class="fontBold">{$result_head}</span></td>
      </tr>
      {$results}
      <tr>
        <td class="contentBottom" colspan="3">{$votebutton}</td>
      </tr>
    </table>
    </form>
  </td>
</tr>
