<?php if(!isset($pros)){echo 'Protected Page'; exit;};?>
			<table class="doacoes" width="1076">
				<tr>
					<th class="icon">Donation</td>
					<th class="preco">Payment</th>
					<th class="preco">Donation amount</th>
					<th class="preco">Author</th>
					<th class="preco">QTY</th>
					<th class="nome">Item Name</th>
					<th class="preco">Data</th>
					<th class="preco">Reciept</th>
				</tr>
			</table>
<?php
	$pag = isset($_GET['pag']) && !empty($_GET["pag"]) ? $_GET['pag'] : 1;
	$maximo = 10;
	$inicio = ($pag*$maximo)-$maximo;
	$select = $conexao->prepare("SELECT * FROM web_comprovantes ORDER BY id DESC LIMIT $inicio,$maximo");
	$select->execute();
	$array = $select->fetchAll(PDO::FETCH_ASSOC);
	if($select->rowCount() <= 0){
		    echo '<div class="alert alert-danger">
		              <strong>Error!</strong> No donation made. </a>
		          </div>';
	}

?>

<?php foreach($array as $res){ ?>
			<table class="doacoes" width="1076">
				<tr>
					<td class="icon"><?php echo $res['char_name'];?></td>
					<td class="preco"><span class="pname"><?php echo $res['forma_pag'];?></i></span></td>
					<td class="preco"><span class="dprice"><i><?php echo $res["valor"];?></i></span></td>
					<td class="preco"><span class="pprice"><i><?php echo $res["nome"] ?></i></span></td>
					<td class="preco"><span class="pprice"><i><?php echo count(explode(',',$res['itens']));?></i></span></td>
					<td class="nome"><span class="pname"><?php echo $res["itens"];?></i></span></td>
					<td class="preco"><span class="pprice"><i><?php echo date("d/m/y", strtotime($res["data"]));?> Ć�s <?php echo date("H:i", strtotime($res["data"]));?></i></span></td>
					<td class="preco"><a href="../uploads/comprovantes/<?php echo $res["comprovante"] ?>" id="deletar2"><span class="glyphicon glyphicon-share-alt"></span> Click here</a></td>
				</tr>
			</table>

<?php } ?>

<div id="paginacao">
	<?php
	$sql_res = $conexao->prepare("SELECT * FROM web_comprovantes");
	$sql_res->execute();
	$total = $sql_res->rowCount();
	$paginas = ceil($total/$maximo);
	$links = 1;
	
	if($select->rowCount() >= 1){
	for($i = $pag-$links; $i <= $pag-1; $i++){
		if($i <= 0){}else{
			echo "<a class=\"btn-d2\" href=\"?p=comprovantes&pag=$i\"><span class=\"glyphicon glyphicon-chevron-left\"></span> Previus Page</a>";	
		}	
	}
	}
	
	for($i = $pag+1; $i <= $pag+$links; $i++){
		if($i > $paginas){}else{
			echo "<a class=\"btn-d2\" href=\"?p=comprovantes&pag=$i\">Next page <span class=\"glyphicon glyphicon-chevron-right\"></span> </a>";	
		}
	}


	?>
</div>
