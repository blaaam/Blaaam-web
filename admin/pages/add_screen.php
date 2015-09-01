<?php if(!isset($pros)){echo 'Protected page'; exit;};?>


<form action="" method="post" enctype="multipart/form-data">

	<input type="text" name="titulo" placeholder="Name of image">
	<select name="destaque" id="">
		<option value="">You want to highlight this?</option>
		<option value="1">Yes</option>
		<option value="0">No</option>
	</select>    
    <input type="file" name="arquivo" id="file">
    
    <input type="submit" name="send" value="Add image" class="btn">
    
</form>

<?php

	if(isset($_POST['send'])){
		
	$titulo = strip_tags(trim($_POST['titulo']));
	$destaque = $_POST['destaque'];
	$file = $_FILES['arquivo'];
	$extensao = strtolower(end(explode('.', $file['name'])));
	$tamanho = ceil($file['size'] / 1024);
	if($tamanho <= '1000'){
		$tamanho = "$tamanho KB";	
	}else{
		$tamanho = number_format($tamanho)." MB";	
	}
	$name = time().".$extensao";
	$pasta = "../uploads/gallery/$name";
	
	$permitido = array('image/jpg','image/png','image/jpeg','image/pjpeg','image/gif','image/bmp');
	
	if(!in_array($file['type'],$permitido)){
		    echo '<div class="alert alert-danger">
		              <strong>Error!</strong> File type not allowed. </a>
		          </div>';
	}else{
	
	$upload = move_uploaded_file($_FILES['arquivo']['tmp_name'],$pasta);
	if($upload){
		$insert = $conexao->prepare("INSERT INTO web_galeria (titulo,url,tamanho,destaque) VALUES (:titulo,:url,:tamanho,:destaque)");	
		$insert->bindValue(':titulo',$titulo,PDO::PARAM_STR);
		$insert->bindValue(':url',"uploads/gallery/$name",PDO::PARAM_STR);
		$insert->bindValue(':tamanho',$tamanho,PDO::PARAM_STR);
		$insert->bindValue(':destaque',$destaque,PDO::PARAM_STR);
		$insert->execute();
        setcookie("foto", time(), time()+3600);
        header("location: ?p=add_screen");

	}else{
		    echo '<div class="alert alert-danger">
		              <strong>Error!</strong> This image is not added. </a>
		          </div>';
	}
	
	}
	}

if(isset($_COOKIE['foto'])){
		    echo '<div class="alert alert-success">
		              <strong>Image added Successfully!</strong> This image was added to your site. </a>
		          </div>';
  setcookie("foto", time(), time()-3600);
}

?>

