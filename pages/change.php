<?php if(!isset($pro)){echo 'Protected page!'; exit;};?>
<?php if(!isset($_SESSION[SERVER_NAME."login"])){
	echo '<div class="alert alert-danger">
        <strong>Restricted access!</strong> You must be login to see the page.
    </div>';
}else{?>
		<hgroup>
			<center><h2>Password change</h2></center>
	<form action="" method="post" class="change-pass">
    <input type="text" placeholder="Enter login name" name="login">
    <input type="password" placeholder="Enter old password" name="senha">
    <input type="password" placeholder="Enter new password" name="new">
    <input type="password" placeholder="Enter new password" name="renew">
    <input type="hidden" name="change">
    <input type="submit" value="Change password" class="btn">
</form>
<?php
if(isset($_POST['change'])){
	$login = strip_tags($_POST['login']);
	$senha = $_POST['senha'];	
	$new   = $_POST['new'];	
	$renew = $_POST['renew'];	
	if($login == false){
		echo '<div class="alert alert-danger">
        <strong>Error changing!</strong> Fill in the login field.
	    </div>';
	}elseif($_POST['senha'] == false){
		echo '<div class="alert alert-danger">
        <strong>Error changing!</strong> Please enter old password field.
	    </div>';
	}elseif($_POST['new'] == false){
		echo '<div class="alert alert-danger">
        <strong>Error changing!</strong> Please enter new password.
	    </div>';
	}elseif($_POST['renew'] == false){
		echo '<div class="alert alert-danger">
        <strong>Error changing!</strong> Please enter new password field again.
	    </div>';
	}else{
		try{
			$verifica = $conexao->prepare("SELECT login,password FROM accounts WHERE login = (:login) AND password = (:senha)");
			$verifica->bindValue(':login',$login,PDO::PARAM_STR);
			$verifica->bindValue(':senha',$senha,PDO::PARAM_STR);
			$verifica->execute();
			if($verifica->rowCount() == false){
		        echo '<div class="alert alert-danger">
                <strong>Error changing!</strong> Login or password incorrect, try again ..
	            </div>';
			}elseif($new != $renew){
		        echo '<div class="alert alert-danger">
                <strong>Error changing!</strong> Error confirming old password.
	            </div>';
			}else{
				$update = $conexao->prepare("UPDATE accounts SET password = (:senha) WHERE login = (:login)");
				$update->bindValue(':senha',$new,PDO::PARAM_STR);
				$update->bindValue(':login',$login,PDO::PARAM_STR);
				$update->execute();	
				setcookie("change", time(), time()+3600);	
				header("location: index.php?pag=change");
			}
		}catch(PDOException $ERRO_ALTERARSENHA){
			echo $ERRO_ALTERARSENHA->getMessage();
		}
	}
}
if(isset($_COOKIE['change'])){
    echo '<div class="alert alert-success">
              <strong>Sucssefull!</strong> Your password has been changed!
          </div>';
	setcookie("change", time(), time()-1);	
}
?>
</hgroup>
<?php
}
?>
