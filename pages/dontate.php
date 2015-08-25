<?php if(!isset($pro)){echo 'Protected page!'; exit;};?>
<div class="donate">
			<table class="doacoes" width="628">
				<tr>
					<th class="icon2">Icon</td>
					<th class="nome2">Name</th>
					<th class="preco2">From</th>
					<th class="preco2">To</th>
					<th class="botao2">Donate</th>
				</tr>
			</table>
<?php

$p = isset($_GET['pag']) ? $_GET['pag'] : 1;
$explode = explode('/',$p);
$pg = isset($explode[1]) ? intval($explode[1]) : 1;
$maximo = intval(13);
$inicio = intval(($maximo*$pg) - $maximo);
if($inicio < 0){
	echo '<div class="alert alert-danger">
        <strong>Page not found!</strong> Sorry, this page does not exist.
    </div>';
	echo '<div class="alert alert-danger">
        <strong>Please!</strong> Select an option from the menu if this error Persist contact with the administration.
    </div>';
}else{

$destaque = $conexao->prepare("SELECT * FROM web_doacoes WHERE promocao = 'yes' LIMIT 5");
$destaque->execute();
if($destaque->rowCount() >= 1){
	while($res_destaque = $destaque->fetch(PDO::FETCH_ASSOC)){
?>
			<table class="doacoes_destaque" width="628">
				<tr>
					<td class="icon"><img src="_imagens/itens/<?php echo $res_destaque['item_id'];?>.png" alt=""/></td>
					<td class="nome"><span class="pname"><i><?php echo $res_destaque['name'];?></i></span></td>
					<td class="preco"><span class="dprice"><i><?php echo $res_destaque['preco_antigo'];?></i></span></td>
					<td class="preco"><span class="pprice"><i><?php echo $res_destaque['preco_atual'];?></i></span></td>
					<td class="botao"><a href="index.php?pag=retirar-doacoes/<?php echo $res_destaque['id'] ?>">Make donation</a></td>
				</tr>
			</table>

<?php
}
}
$sql = $conexao->prepare("SELECT * FROM web_doacoes WHERE promocao = 'Nao' ORDER BY id DESC LIMIT $inicio,$maximo");
$sql->execute();
if($sql->rowCount() ==  false){
	echo '<div class="alert alert-danger">
        <strong>Sorry!</strong> There is no other donation items at this moment.
    </div>';
}else{
while($res = $sql->fetch(PDO::FETCH_ASSOC)){
?>


			<table class="doacoes">
				<tr>
					<td class="icon"><img src="_imagens/itens/<?php echo $res['item_id'];?>.png" alt=""/></td>
					<td class="nome"><span class="pname"><i><?php echo $res['name'];?></i></span></td>
					<td class="preco"><span class="dprice"><i><?php echo $res['preco_antigo'];?></i></span></td>
					<td class="preco"><span class="pprice"><i><?php echo $res['preco_atual'];?></i></span></td>
					<td class="botao"><a href="index.php?pag=retirar-doacoes/<?php echo $res['id'] ?>">Make donation</a></td>
				</tr>
			</table>
<?php
}
}
?>

<div id="paginacao">

	<?php
	$sql_res = $conexao->prepare("SELECT * FROM web_doacoes");
	$sql_res->execute();
	$paginas = ceil($sql_res->rowCount()/$maximo);
	$links = 1;
	
	if($sql->rowCount() >= 1){
	for($i = $pg-$links; $i <= $pg-1; $i++){
		if($i <= 0){}else{
			echo '<div class="prev"><a href="index.php?pag=doacoes/'.$i.'">Previus page</a></div>';		
		}	
	}
	}
	
	for($i = $pg+1; $i <= $pg+$links; $i++){
		if($i > $paginas){}else{
			echo '<div class="next"><a href="index.php?pag=doacoes/'.$i.'">Next page</a></div>';	
		}
	}
	
	?>
    </div>
    <?php
	
}
	?>

		</div>

