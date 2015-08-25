<?php if(!isset($pro)){echo 'Protected page!'; exit;}; ?>


<div id="conteudo_titulo"><h2>Our server Gallery</h2></div>

<div id="gallery">

<?php

	$select = $conexao->prepare("SELECT * FROM web_galeria ORDER BY id DESC");
	$select->execute();
	if($select->rowCount() <= 0){
		echo "<strong>No images have been added yet!</strong>";	
	}
	
	while($res = $select->fetch(PDO::FETCH_ASSOC)){
		echo '<li><a tile="'.$res['titulo'].'" rel="lightbox[roadtrip]" href="'.$res['url'].'"><img src="'.$res['url'].'"></a></li>';	
		
	}

?>

</div>
