<?php if(!isset($pros)){echo 'Protected Page'; exit;};?>
<div class="listars">

<a class="btn-d" href="?p=adicionar_doacao"><span class="glyphicon glyphicon-plus"></span>  Create Donation</a>
			<table class="doacoes" width="1076">
				<tr>
					<th class="icon">Icon</td>
					<th class="nome">Name</th>
					<th class="preco">De</th>
					<th class="preco">For</th>
					<th class="preco">Sale</th>
						<th class="botao">Delete</th>
				</tr>
			</table>

<?php

	try{
		
	
	if(isset($_GET['action']) && $_GET['action'] == 'deletar'){
		
		$deleta = $conexao->prepare("DELETE FROM web_doacoes WHERE id = (:id)");
		$deleta->bindValue(':id',intval($_GET['id']),PDO::PARAM_STR);
		$deleta->execute();
		header("location: ?p=donations_list");
	}
	
	if(isset($_GET["action"])&& $_GET["action"] == 'editar'){
	?>
	
 
    <?php
	
	if(isset($_POST['nome'])){
		$altera = $conexao->prepare("UPDATE web_doacoes set name = (:name), preco_antigo = (:preco_antigo), preco_atual = (:preco_atual), promocao = (:promocao) where id = (:id)");
		$altera->bindValue(':name',$_POST['name'],PDO::PARAM_STR);
		$altera->bindValue(':preco_antigo',$_POST['preco_antigo'],PDO::PARAM_STR);
		$altera->bindValue(':preco_atual',$_POST['preco_atual'],PDO::PARAM_STR);
		$altera->bindValue(':id',$_GET['id'],PDO::PARAM_STR);
		$altera->bindValue(':promocao',$_POST["promocao"],PDO::PARAM_STR);
		$altera->execute();
		header("location: ?p=listar-doacoes");	
	}
	
	exit;	
}

	if(isset($_GET['pg'])){
		$pg = intval($_GET['pg']);	
	}else{$pg = 1;}
	
	$maximo = 9;
	
	$inicio = ($pg * $maximo) - $maximo;
	$inicio = $inicio <= '0' ? $inicio = 0 : $inicio = $inicio;

	$seleciona = $conexao->prepare("SELECT * FROM web_doacoes ORDER BY id DESC LIMIT $inicio,$maximo");
	$seleciona->execute();
	if($seleciona->rowCount() <= 0){
		    echo '<div class="alert alert-danger">
		            <strong>Erro listar DoaĆ§Ć£o!</strong> NĆ£o hĆ� doaĆ§Ćµes.
		          </div>';
	}else{
	
	while($res = $seleciona->fetch(PDO::FETCH_ASSOC)){
	?>
    
			<table class="doacoes" width="1076">
				<tr>
					<td class="icon"><img src="/images/items/<?php echo $res['item_id'];?>.png" alt=""/></td>
					<td class="nome"><span class="pname"><i><?php echo $res['name'];?></i></span></td>
					<td class="preco"><span class="dprice"><i><?php echo $res['preco_antigo'];?></i></span></td>
					<td class="preco"><span class="pprice"><i><?php echo $res['preco_atual'];?></i></span></td>
					<td class="preco"><span class="pprice"><i><?php echo $res['promocao'];?></i></span></td>
					<td class="botao"><a href="?p=donation_list&action=deletar&id=<?php echo $res['id'];?>" id="deletar2"><span class="glyphicon glyphicon-remove"></span>  Delete</a></td>
				</tr>
			</table>

    
    <?php	
	}
	}
	
	}catch(PDOException $seleciona_erro){
		print $seleciona_erro->getMessage();
	}
	

?>

<div id="paginacao">
	
    <?php
	$sql_res = $conexao->prepare("SELECT * FROM web_doacoes");
	$sql_res->execute();
	$total = $sql_res->rowCount();
	$paginas = ceil($total/$maximo);
	$link = 1;
	
	if($seleciona->rowCount() >= 1){
		for($i = $pg-$link; $i <= $pg-1;$i++){
		if($i <= 0){}else{
			echo '<a class="btn-d2" href="?p=donations&pg='.$i.'">Previus Page</a>';	
		}	
	}
	}
	
	for($i = $pg+1; $i <= $pg+$link; $i++){
		if($i > $paginas){}else{
		echo '<a class="btn-d2" href="?p=donations_list&pg='.$i.'">Next page</a>';	
		}
	}
	
	?>
    
</div><!--paginacao-->


</div>
    <script type="text/javascript">
        $(document).ready(function(){
              $("input.dinheiro").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
        });
    </script>
