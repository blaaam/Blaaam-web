<?php if(!isset($pro)){echo 'Protected Page!'; exit;}; ?>
<br>

<table width="635" border="0" cellspacing="2" style="margin:0px 0" class="ranking"> 
  <tr>
    <th width="80" align="center"><strong>Position</strong></th>
    <th width="140" align="center"><strong>Name</strong></th>
    <th width="140" align="center"><strong>Clan</strong></th>
    <th width="140" align="center"><strong>Pks</strong></th>
  </tr>
  <?php
  $i = 1;
 $sql = $conexao->prepare("SELECT *,(SELECT clan_id FROM clan_data WHERE c.clanid = clan_id) AS clan from characters AS c where accesslevel = '0' order by pkkills DESC LIMIT 25");
 $sql->execute();
 while($res = $sql->fetch(PDO::FETCH_ASSOC)){
	 $clan = empty($res['clan']) ? 'No Clan' : $res['clan'];

  if($i == 1){
    $img = "<img src=\"images/top1.gif\" alt=\"\">";
  }elseif($i == 2){
    $img = "<img src=\"images/top2.gif\" alt=\"\">";
  }elseif($i == 3){
    $img = "<img src=\"images/top3.gif\" alt=\"\">";
  }else{
    $img = $i."&ordm;";
  }

  ?>
  <tr>
    <td align="center"><?php echo $img ; ?></td>
    <td align="center"><?php echo $res['char_name']; ?></td>
    <td align="center"><?php echo $clan; ?></td>
    <td align="center"><?php echo number_format($res['pkkills'],0,'.','.'); ?></td>
  <?php
  $i++;
 }
  ?>
</table>
