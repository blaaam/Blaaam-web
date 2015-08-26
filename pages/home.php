<?php if(!isset($pro)){echo 'Page Protected!'; exit;};?>


<?php

$p = isset($_GET['pag']) ? $_GET['pag'] : 1;
$explode = explode('/',$p);
$pg = isset($explode[1]) ? intval($explode[1]) : 1;
$maximo = intval(4);
$inicio = intval(($maximo*$pg) - $maximo);
if($inicio < 0){
	echo '<div class="alert alert-danger">
        <strong>Page not found!</strong> Sorry, but this page does not exist.
    </div>';
	echo '<div class="alert alert-danger">
        <strong>Please!</strong> Select an option from the menu, if this error stay, contact with the administration.
    </div>';
}else{

$destaque = $conexao->prepare("SELECT * FROM web_noticias WHERE destaque = '1' ORDER BY data DESC LIMIT 9");
$destaque->execute();
if($destaque->rowCount() >= 1){
	while($res_destaque = $destaque->fetch(PDO::FETCH_ASSOC)){
	$noticia = substr($res_destaque['noticia'],0,310);
?>

		<div class="bg-news">
		<ul class="boxposts_destaque">
			<li>
				<span class="thumb">
					<img src="images/shield.png" alt="" width="166" height="166"/>
				</span>
				<span class="content">
					<h1><?php echo $res_destaque['titulo'];?></h1>
					<p><?php echo $noticia; if(strlen($noticia) >= '310'){echo '...';}?></p>
					<span class="datapost">By : <strong><?php echo $res_destaque['autor'];?></strong></span>
					<div class="footerpost">
							<a href="index.php?pag=read_news/<?php echo $res_destaque['id'] ?>">Read full story</a>
							<span class="datapost">Added at: <strong><?php echo date('d/m/Y - H:i', strtotime($res_destaque['data']));?></strong></span>
					</div>
				</span>
			</li>
		</ul>
		</div>

<?php
}
}
if(!isset($_SESSION[SERVER_NAME."login"])){
$sql = $conexao->prepare("SELECT * FROM web_noticias WHERE destaque = '0' AND privado = '0' ORDER BY id DESC LIMIT $inicio,$maximo");
}else{
$sql = $conexao->prepare("SELECT * FROM web_noticias WHERE destaque = '0' ORDER BY id DESC LIMIT $inicio,$maximo");
}
$sql->execute();
if($sql->rowCount() ==  false){
	echo '&nbsp;';
}else{
while($res = $sql->fetch(PDO::FETCH_ASSOC)){
	$noticia = substr($res['noticia'],0,310);
?>
		<div class="bg-news">
		<ul class="boxposts">
			<li>
				<span class="thumb">
					<img src="_imagens/shield.png" alt="" width="166" height="166"/>
				</span>
				<span class="content">
					<h1><?php echo $res['titulo'];?></h1>
					<p><?php echo $noticia; if(strlen($noticia) >= '310'){echo '...';}?></p>
					<span class="datapost">By : <strong><?php echo $res['autor'];?></strong></span>
					<div class="footerpost">
							<a href="index.php?pag=noticias/<?php echo $res['id']; ?>">Read full story</a>
							<span class="datapost">Added at: <strong><?php echo date('d/m/Y - H:i', strtotime($res['data']));?></strong></span>
					</div>
				</span>
			</li>
		</ul>
		</div>

<?php
}
}
?>

<div id="paginacao">

	<?php
//	$sql_res = $conexao->prepare("SELECT * FROM web_noticias");
//	$sql_res->execute();
//	$paginas = ceil($sql_res->rowCount()/$maximo);
//	$links = 1;
	
//	if($sql->rowCount() >= 1){
//	for($i = $pg-$links; $i <= $pg-1; $i++){
//		if($i <= 0){}else{
//			echo '<div class="prev"><a href="index.php?pag=home/'.$i.'">Previous Page</a></div>';		
//		}	
//	}
//	}
	
//	for($i = $pg+1; $i <= $pg+$links; $i++){
//		if($i > $paginas){}else{
//			echo '<div class="next"><a href="index.php?pag=home/'.$i.'">Next Page</a></div>';	
//		}
//	}
	
//	?>
    </div>
    <?php
	
}
	?>

