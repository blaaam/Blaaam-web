<?php if(!isset($pro)){echo $lang['PROTECTED']; exit;};?>
		<hgroup>
			<h2><?php echo $lang['CAD_SYS']; ?></h2>
		<!--	<p><?php echo $lang['CAD_NOTICE']; ?></p>

      <p></p>
			-->
		</hgroup>

 <!-- <section class="termos">
    <h2><?php echo $lang['CAD_TERM']; ?></h2>
    <p>- <span class="title-termos">Nr. 1:</span><?php echo $lang['CAD_TERM1']; ?></p>

    <p>- <span class="title-termos">Nr. 2:</span><?php echo $lang['CAD_TERM2']; ?></p>

     <p>- <span class="title-termos">Nr. 3:</span><?php echo $lang['CAD_TERM3']; ?></p>

    <p>- <span class="title-termos">Nr. 4:</span><?php echo $lang['CAD_TERM4']; ?></p>

    <p>- <span class="title-termos">Nr. 5:</span><?php echo $lang['CAD_TERM5']; ?></p>

    <p>- <span class="title-termos">Nr. 6:</span><?php echo $lang['CAD_TERM6']; ?></p>

    <p>- <span class="title-termos">Nr. 7:</span><?php echo $lang['CAD_TERM7']; ?></p>

    <p>- <span class="title-termos">Nr. 8:</span><?php echo $lang['CAD_TERM8']; ?></p>

    <p>- <span class="title-termos">Nr. 9:</span><?php echo $lang['CAD_TERM9']; ?></p>

    <p>- <span class="title-termos">Nr. 10:</span><?php echo $lang['CAD_TERM10']; ?></p>

 </section> 
-->

<form action="" class="cadastro" method="post" enctype="multipart/form-data">
	<input type="text" name="nome" id="nome" placeholder="<?php echo $lang['CAD_NAME']; ?>"/>
	<input type="text" name="usuario" id="usuario" placeholder="<?php echo $lang['CAD_USERNAME']; ?>"/><br>
  <input type="text" name="pergunta" id="pergunta" placeholder="<?php echo $lang['CAD_SECURITY']; ?>"/>
  <input type="text" name="resposta" id="resposta" placeholder="<?php echo $lang['CAD_ANSWER']; ?>"/><br>
	<input type="password" name="senha" id="senha" placeholder="<?php echo $lang['CAD_PASS']; ?>"/>
	<input type="password" name="rsenha" id="rsenha" placeholder="<?php echo $lang['CAD_PASSAGAIN']; ?>"/><br>
	<input type="text" name="email" id="email" placeholder="<?php echo $lang['CAD_EMAIL']; ?>"/>
	<input type="submit" name="cadastrar" id="cadastrar" class="btn-cadastrar" value="<?php echo $lang['CAD_REGISTER']; ?>"/>
</form>


<?php  
if(isset($_POST['cadastrar'])){
  $nome       = trim(strip_tags($_POST['nome']));
  $usuario    = trim(strip_tags($_POST['usuario']));
  $pergunta   = trim(strip_tags($_POST['pergunta']));
  $resposta   = trim(strip_tags($_POST['resposta']));
  $senha      = $_POST['senha'];
  $rsenha     = $_POST['rsenha'];
  $email      = trim(strip_tags($_POST['email']));

  if($nome == false){
    echo '<div class="alert alert-danger">
            <strong>Error!</strong> Please enter name. 
          </div>';
  }elseif($usuario == false){
    echo '<div class="alert alert-danger">
            <strong>Error!</strong> Please enter username.
          </div>';
  }elseif($pergunta == false){
    echo '<div class="alert alert-danger">
            <strong>Error!</strong> Please enter security Question.
          </div>';
  }elseif($resposta == false){
    echo '<div class="alert alert-danger">
            <strong>Error!</strong> Please enter security question answer.
          </div>';    
  }elseif($_POST['senha'] == false){
    echo '<div class="alert alert-danger">
            <strong>Error!</strong> Please enter password.
          </div>';
  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo '<div class="alert alert-danger">
            <strong>Error!</strong> This e-mail is allready registred.
          </div>';
  }elseif(strlen($_POST['senha']) < 4){
    echo '<div class="alert alert-danger">
            <strong>Error!</strong> Your password needs to be at least 4 digits.
          </div>';
  }elseif($senha != $rsenha){
    echo '<div class="alert alert-danger">
            <strong>Error!</strong> The passwords do not match.
          </div>';
  }elseif($email == false){
    echo '<div class="alert alert-danger">
            <strong>Error!</strong> Please enter the e-mail.
          </div>';
  }else{

    try{

      $verifica_usuario = $conexao->prepare("SELECT login FROM accounts WHERE login = (:usuario)");
      $verifica_usuario->bindValue(':usuario', $usuario, PDO::PARAM_STR);
      $verifica_usuario->execute();

      $verifica_email = $conexao->prepare("SELECT email FROM accounts WHERE email = (:email)");
      $verifica_email->bindValue(':email', $email, PDO::PARAM_STR);
      $verifica_email->execute();

      if($verifica_usuario->rowCount() == true){
        echo '<div class="alert alert-danger">
                <strong>Error!</strong> This User is already registered, select another and try again.
              </div>';
      }elseif($verifica_email->rowCount() == true){
        echo '<div class="alert alert-danger">
                <strong>Error!</strong> This email is already registered, select another and try again.
              </div>';
      }else{

        $cadastrar = $conexao->prepare("INSERT INTO accounts (name, login, password, email, question, reply) VALUES (:nome, :usuario, :senha, :email, :pergunta, :resposta)");
        $cadastrar->bindValue(':nome', $nome, PDO::PARAM_STR);
        $cadastrar->bindValue(':usuario', $usuario, PDO::PARAM_STR);
        $cadastrar->bindValue(':pergunta', $pergunta, PDO::PARAM_STR);
        $cadastrar->bindValue(':resposta', $resposta, PDO::PARAM_STR);
        $cadastrar->bindValue(':senha', $senha, PDO::PARAM_STR);
        $cadastrar->bindValue(':email', $email, PDO::PARAM_STR);
        $cadastrar->execute();
        setcookie("cadastrou", time(), time()+3600);
        header("location: index.php?pag=register");


      }

      }catch(PDOException $erro_cadastro){
        print $erro_cadastro->getMessage();
      }
  }
}

if(isset($_COOKIE['cadastrou'])){
    echo '<div class="alert alert-success">
              <strong>Registration successfully!</strong> You can now start playing. Have a good game!
          </div>';
  setcookie("cadastrou", time(), time()-3600);
}

?>
