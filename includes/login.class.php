<?php  
	class login{
		private $tabela = 'accounts';
		private $accesslevel = '1';
		private $colunaacesslevel = 'accesslevel';

		function logar($usuario,$senha,$conexao){
			$verifica = $conexao->prepare("SELECT * FROM $this->tabela WHERE login =? AND password = ?");
			$verifica->execute(array($usuario,$senha));
			if($verifica->rowCount() >= 1){

				$_SESSION[SERVER_NAME."login"] = $usuario;
				$_SESSION[SERVER_NAME."senha"] = $senha;
				$url = $_SERVER['REQUEST_URI'];
				header("location: $url");

			}else{
			    echo '<div class="alert alert-danger">
			            <strong>Error!</strong> Incorect User/Password.
			          </div>';
			}
		}
	}


?>