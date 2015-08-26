<div class="bg-news">
	<ul class="boxposts3">
		<li>
			<table class="doacoes" width="625">
				<tr>
					<th class="icon2">Icon</td>
					<th class="nome2">Name</th>
					<th class="preco2">From</th>
					<th class="preco2">To</th>
				</tr>
			</table>

<?php if(!isset($pro)){echo 'Protected Page!'; exit;}; 
	error_reporting(0);
	$Pegaid = explode('/',$_GET['pag']);
	$id = $Pegaid[1];
	try{
	
	$pega_noticia = $conexao->prepare("SELECT * FROM web_doacoes WHERE id = (:id)");
	$pega_noticia->bindValue(':id',$id,PDO::PARAM_STR);
	$pega_noticia->execute();
	$res = $pega_noticia->fetch(PDO::FETCH_ASSOC);
	
	
	if($res['promocao'] == 1 && !isset($_SESSION[Servername."login"])){
			echo '<div class="alert alert-danger">
		        <strong>Restricted access!</strong> You must login to see content of this page!
		    </div>';
	}else{
	
	if($pega_noticia->rowCount() == false){
		echo '<div class="alert alert-danger">
	        <strong>Page dont exist!</strong> Page you looking for dont exist!
	    </div>';
	}else{
		echo "


			<table class=\"doacoes\" width=\"625\">
				<tr>
					<td class=\"icon\"><img src=\"images/items/$res[item_id].png\" alt=\"\"/></td>
					<td class=\"nome\"><span class=\"pname\"><i>$res[name]</i></span></td>
					<td class=\"preco\"><span class=\"dprice\"><i>$res[preco_antigo]</i></span></td>
					<td class=\"preco\"><span class=\"pprice\"><i>$res[preco_atual]</i></span></td>
				</tr>
			</table>

		";
		?>
			<table class="doacoes" width="625">
				<tr>
					<th class="icon2">Bank</td>
					<th class="nome2">Transfer reason</th>
					<th class="preco2">SWIFT</th>
					<th class="preco2">Account Nr.</th>
				</tr>
				<tr>
					<td class="icon">Bradesco</td>
					<td class="nome"><span class="pname"><i>Ex: Lineage II Private Server</i></span></td>
					<td class="preco"><span class="dprice"><i>Ex: 0000-0</i></span></td>
					<td class="preco"><span class="pprice"><i>Ex: 00000-0</i></span></td>
				</tr>
				<tr>
					<td class="icon">Itau</td>
					<td class="nome"><span class="pname"><i>Ex: Lineage II Private Server</i></span></td>
					<td class="preco"><span class="dprice"><i>Ex: 0000-0</i></span></td>
					<td class="preco"><span class="pprice"><i>Ex: 00000-0</i></span></td>
				</tr>
				<tr>
					<td class="icon">Caixa Federal</td>
					<td class="nome"><span class="pname"><i>Ex: Lineage II Private Server</i></span></td>
					<td class="preco"><span class="dprice"><i>Ex: 0000-0</i></span></td>
					<td class="preco"><span class="pprice"><i>Ex: 00000-0</i></span></td>
				</tr>
				<tr>
					<td class="icon">Banco Brasil</td>
					<td class="nome"><span class="pname"><i>Ex: Lineage II Private Server</i></span></td>
					<td class="preco"><span class="dprice"><i>Ex: 0000-0</i></span></td>
					<td class="preco"><span class="pprice"><i>Ex: 00000-0</i></span></td>
				</tr>
				<tr>
					<td class="icon">Santander</td>
					<td class="nome"><span class="pname"><i>Ex: Lineage II Private Server</i></span></td>
					<td class="preco"><span class="dprice"><i>Ex: 0000-0</i></span></td>
					<td class="preco"><span class="pprice"><i>Ex: 00000-0</i></span></td>
				</tr>
			</table>

		<?php } ?>


		<div class="pagmento">
			<ul>
				<li><a class="pagseguro" href="#">Pay with Credit Card</a></li>	
				<li><a class="paypal" href="#">Pay with PayPal</a></li>
			</ul>
		</div>



			</li>
		</ul>
		</div>

        <?php
	}
	
	}catch(PDOException $singleerro){
		echo $singleerro->GetMessage;
	}
	
	
?>