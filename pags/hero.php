<?php if(!isset($pro)){echo 'Protected Page!'; exit;}; ?>
<br>

<table width="635" border="0" cellspacing="2" style="margin:0px 0" class="ranking">
  <tr>
    <th width="227" align="center">Name</th>
    <th width="203" align="center">Class</th>
    <th width="281" align="center">Victory Count</th>
  </tr>
  <?php
  $sql = $conexao->prepare("SELECT *,(select classid from characters where classid = ClassId) AS class FROM heroes as h order by count DESC");
  $sql->execute();
  while($res = $sql->fetch(PDO::FETCH_ASSOC)){
  ?>
  <tr>
    <td align="center"><?php echo $res['char_name'];?></td>
    <td align="center"><?php echo $res['class'];?></td>
    <td align="center"><?php echo $res['count'];?></td>
  </tr>
  <?php
  }
  ?>
</table>

