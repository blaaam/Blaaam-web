<form action="" method="post" name="va" id="do">
      <input type="text" name="usuario" id="usuario" placeholder="Char Name" />
      <select name="assao" id="select">
      	<option value="-100">Ban</option>   
        <option value="0">Unban</option>   
      </select>
    <input type="hidden" name="ban" value="banido" />
    <input type="submit" name="button" id="button" value="Continue" class="btn"/>
</form>


<?php
if(isset($_POST['ban']) && $_POST['ban'] == 'banido'){

  $char = $_POST['usuario'];
  $ban  = $_POST['assao'];

  $selecionar = $conexao->prepare("SELECT * FROM characters WHERE char_name = (:char_name)");
  $selecionar->bindValue(':char_name', $char, PDO::PARAM_STR);
  $selecionar->execute();
  if($selecionar->rowCount() >= '1'){
    $alterar = $conexao->prepare("UPDATE accounts SET access_level = (:access_level)");
    $alterar->bindValue(':access_level', $ban, PDO::PARAM_STR);
    $alterar->execute();
    if($_POST['assao'] == '-100'){
      $retornar = "$char User banned Successfully!";
    }elseif($_POST['assao'] == '0'){
      $retornar = "$char User unbanned Successfully!";
    }
    if($alterar >= '1'){
      echo "<div class=\"alert alert-success\">
            <strong>Successfully!</strong> $retornar
      </div>";
    }else{
      echo '<div class="alert alert-danger">
            <strong>Error!</strong> Not posibble to ban this char.
      </div>';
    }
  }else{
      echo '<div class="alert alert-danger">
            <strong>Error!</strong> There is no character with that name.
      </div>';
  }
  
}

?>
