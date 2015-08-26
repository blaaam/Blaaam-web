<?php if(!isset($pro)){echo 'Protected Page!'; exit;}; 
	error_reporting(0);
	$Pegaid = explode('/',$_GET['pag']);
	$id = $Pegaid[1];
	try{
	
	$setvisitas = $conexao->prepare("UPDATE web_noticias SET visitas = (visitas+1) WHERE id = (:id)");
	$setvisitas->bindValue(':id',$id,PDO::PARAM_STR);	
	$setvisitas->execute();
	
	$pega_noticia = $conexao->prepare("SELECT * FROM web_noticias WHERE id = (:id)");
	$pega_noticia->bindValue(':id',$id,PDO::PARAM_STR);
	$pega_noticia->execute();
	$res = $pega_noticia->fetch(PDO::FETCH_ASSOC);
	
	
	if($res['privado'] == 1 && !isset($_SESSION[SERVER_NAME."login"])){
			echo '<div class="alert alert-danger">
		        <strong>Restricted access!</strong>You must register to access this page!
		    </div>';
	}else{
	
	if($pega_noticia->rowCount() == false){
		echo '<div class="alert alert-danger">
	        <strong>Page dont exists!</strong> Page you looking for dont exist!
	    </div>';
	}else{
		echo "

		<div class=\"bg-news\">
		<ul class=\"boxposts_destaque\">
			<li>
				<span class=\"thumb\">
					<img src=\"images/shield.png\" alt=\"\" width=\"166\" height=\"166\"/>
				</span>
				<span class=\"content\">
					<h1>$res[titulo]</h1>
					<p>$res[noticia]</p>
							<span class=\"datapost\">Added at: <strong>".date('d/m/Y - H:i', strtotime($res['data']))."</strong></span>
					<div class=\"footerpost\">


		";
		?>
			<span class="post_autor">Posted by : <strong><?php echo $res['autor']; ?></strong></span>
		<span class="datapost">
        <div id="curtir_conteudo">
			<span class="datapost"><strong><?php echo $res[visitas]?> </strong>Views</span>


		<?php } ?>
        </div>
        	</span>
					</div>
				</span>
			</li>
		</ul>
		</div>

        <?php
	}
	
	}catch(PDOException $singleerro){
		echo $singleerro->GetMessage;
	}
	
	
?>