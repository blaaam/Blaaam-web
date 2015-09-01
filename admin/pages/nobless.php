<form action="" method="post" name="nobles" id="do">
      <input type="text" name="nb_user" id="nb_user" placeholder="Login" />
      <input type="text" name="nb_name" id="nb_name" placeholder="Characters name" />
      <select name="nbo" id="select">
      <option value="" selected="selected">Select</option>
      <option value="1">Add nobless status</option>
      <option value="0">Remove nobless status</option>
      </select>
    <input type="hidden" name="nbs" value="ok" />
    <input name="button" type="submit" class="btn" id="button" value="Continue" />
</form>


<?php
if(isset($_POST['nbs']) && $_POST['nbs'] == 'ok'){

  $nb_user = $_POST['nb_user'];
  $nb_nome = $_POST['nb_name'];
  $bovl = $_POST['nbo'];

  if($nb_user == false){
    echo '<div class="alert alert-danger">
        <strong>Error!</strong> Please enter login field.
      </div>';    
  }elseif($nb_nome == false){
    echo '<div class="alert alert-danger">
        <strong>Error!</strong> Please enter characters name field.
      </div>';    
  }else{
   
    try{
      

  $verificar_nobre = $conexao->prepare("SELECT * FROM characters WHERE account_name = (:account_name) AND char_name = (:char_name)");
  $verificar_nobre->bindValue(':account_name', $nb_user, PDO::PARAM_STR);
  $verificar_nobre->bindValue(':char_name', $nb_nome, PDO::PARAM_STR);
  $verificar_nobre->execute();
  while($res_nobre = $verificar_nobre->fetch(PDO::FETCH_ASSOC));

  if($verificar_nobre->rowCount() == '1'){
     $alterar_nobre = $conexao->prepare("UPDATE characters SET nobless = (:nobless) WHERE account_name = (:account_name) AND char_name = (:char_name)");
    $alterar_nobre->bindValue(':nobless', $bovl, PDO::PARAM_STR);
    $alterar_nobre->bindValue(':account_name', $nb_user, PDO::PARAM_STR);
    $alterar_nobre->bindValue(':char_name', $nb_nome, PDO::PARAM_STR);
    $alterar_nobre->execute();
    setcookie("change", time(), time()+3600); 
    header("location: ?p=nobless");


  }

    }catch(PDOException $e){
      print $e;
    }
  }
}

if(isset($_COOKIE['change'])){
      echo "<div class=\"alert alert-success\">
          <strong>Success!</strong> Nobless status have been changed.
        </div>";
  setcookie("change", time(), time()-1);  
}


?>
