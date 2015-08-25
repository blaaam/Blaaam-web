<?php
// Connect PHP PDO
$host	= "localhost"; //IP da hospedagem, dedicado ou servidor Local
$dbname	= "lineag2"; //Nome do banco de dados
$user	= "root";//usuario do Mysql (Padrao = root)
$senha	= "uP1AYjXDGQkstMFg4I4sSgJhLL1SZC6XT0bnRQbfCdGEBLNj0pQCT0jvtnmIfQA";//senha do mysql (padrao sem senha)
//Para melhor segunrança coloque um nome de usuario bem dificil, e uma senha contendo numeros e letras

//Não mecher daqui para baixo (conexao com banco de dados)
try {
	$conexao = new PDO ("mysql:host=$host;dbname=$dbname", "$user", "$senha");
	$conexao->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>
