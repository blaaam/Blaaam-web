<?php if(!isset($pro)){echo 'Protected page!'; exit;}; ?>
<?php if(!isset($_SESSION[Servername."login"])){
  echo '<div class="alert alert-danger">
        <strong>Restricted access!</strong> Please login to see content.
    </div>';
}else{?>
<br>

<table width="635" border="0" cellspacing="2" style="margin:0px 0;" class="ranking">
  <tr>
    <th width="180" align="center"><strong>Name</strong></th>
    <th width="180" align="center"><strong>Class</strong></th>
    <th width="180" align="center"><strong>Fights</strong></th>
    <th width="180" align="center"><strong>Points</strong></th>
  </tr>
  <?php
  $sql = $conexao->prepare("SELECT *,(select classid from characters where class_id = ClassId) AS classe FROM olympiad_nobles AS o ORDER BY olympiad_points DESC LIMIT 25");
  $sql->execute();
  while($res = $sql->fetch(PDO::FETCH_ASSOC)){
  ?>
  <tr>
    <td align="center"><?php echo $res['char_name']; ?></td>
    <td align="center"><?php echo $res['classe'] ?></td>
    <td align="center"><?php echo $res['competitions_done'] ?></td>
    <td align="center"><?php echo number_format($res['olympiad_points'],0,'.','.'); ?></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php
}
?>

