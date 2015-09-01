<?php
include"../includes/connection.php";
include"../includes/config.php";
?>
<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/estilo.css" />
	<link rel="stylesheet" href="../css/classes.css" />
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<title><?php echo SERVER_NAME ?></title>
	<script type="text/javascript" src="scripts/jscripts/jquery.js"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
</head>

<body>

	<?php
	if(!isset($_SESSION["logins"])){
	?>
    
    	<div id="login">
        	
            <div id="glob">Administration Panel</div><!--glob-->
            
			<form action="" class="login" method="post" enctype="multipart/form-data">
				<input type="text" name="login" id="usuario" placeholder="User name"/>
				<input type="password" name="senha" id="senha" placeholder="Password"/>
				<input type="submit" name="logarse" id="cadastrar" class="btn-cadastrar" value="Login"/>
			</form>
            
           	<?php
			if(isset($_POST['logarse'])){
					
				$login = $_POST['login'];
				$senha = base64_encode(pack('H*', sha1($_POST['senha'])));	
				
				try{
					
					$verifica = $conexao->prepare("SELECT * FROM accounts WHERE login = (:login) AND password = (:senha) AND (accessLevel = '1')");
					$verifica->bindValue(':login',$login,PDO::PARAM_STR);
					$verifica->bindValue(':senha',$senha,PDO::PARAM_STR);
					$verifica->execute();
					
					if($verifica->rowCount() == true){
						$_SESSION['logins'] = $login;
						$url = $_SERVER['REQUEST_URI'];
					    echo '<div class="alert alert-success">
					            <strong>Succesful!</strong>Authenfication was secessful, now redirecting. <img src="../_imagens/loads/loader.gif" class="loader" alt=""/>
					          </div>';
						header("Refresh:3, $url");
					}else{
					    echo '<div class="alert alert-danger">
					            <strong>Error!</strong> This user are not registred as adminstrator.
					          </div>';
					}
					
				}catch(PDOException $erro_logar){
					print $erro_logar->getMessage();	
				}
				
			}
			?>
            
        </div><!--login-->
    
    
    <?php
	exit;
	}
	?>

	<div id="box">
    
    	<div id="header">
        
        	<div id="logo"></div><!--logo-->
        
        </div><!--header-->
  

	    <?php
			$donate_count = $conexao->prepare("SELECT id FROM web_comprovantes");
			$donate_count->execute();

			$report_count = $conexao->prepare("SELECT id FROM web_report");
			$report_count->execute();
		?>
		<div id='cssmenu' class="f-nav">
		<ul>
		  <li class="active has-sub right-user"><a href="?p=home"><span><h5>Welcome - <span><?php echo $_SESSION["logins"];?></span></h5> </span></a>
		      <ul>
		         <li class='has-sub'><a href='?p=logout'><span><span class="glyphicon glyphicon-off"></span> Logout</span></a></li>
			  </ul>
		  </li>
		  <li class='has-sub'><a href='#'><span><span class="glyphicon glyphicon-menu-hamburger"></span> Website administration</span></a>
		      <ul>
		         <li class='has-sub'><a href='#'><span><span class="glyphicon glyphicon-globe"></span> Posts</span></a>
		            <ul>
		               <li><a href='?p=add_news'><span><span class="glyphicon glyphicon-pencil"></span> Add Post</span></a></li>
		               <li class='last'><a href='?p=news'><span><span class="glyphicon glyphicon-book"></span> Show Posts</span></a></li>
		            </ul>
		         </li>
		         <li class='has-sub'><a href='#'><span><span class="glyphicon glyphicon-picture"></span> ScreenShots</span></a>
		            <ul>
		               <li><a href='?p=add_screen'><span><span class="glyphicon glyphicon-camera"></span> Add ScreenShot</span></a></li>
		               <li class='last'><a href='?p=gallery'><span><span class="glyphicon glyphicon-book"></span> Show ScreenShots</span></a></li>
		            </ul>
		         </li>
		         <li class='has-sub'><a href='#'><span><span class="glyphicon glyphicon-shopping-cart"></span> Donations</span></a>
		            <ul>
		               <li><a href='?p=add_donation'><span><span class="glyphicon glyphicon-plus"></span> Add Donation</span></a></li>
		               <li class='last'><a href='?p=donations_list'><span><span class="glyphicon glyphicon-book"></span> Show Donations</span></a></li>
		            </ul>
		         </li>
		         <li class='has-sub'><a href='?p=donations'><span><span class="glyphicon glyphicon-ok-sign"></span> Confirmed Donations <span class="compreved"><?php echo $donate_count->rowCount() ;?></span></span></a></li>
		         <li class='has-sub'><a href='?p=reported'><span><span class="glyphicon glyphicon-bullhorn"></span> Reported Players <span class="reported"><?php echo $report_count->rowCount() ;?></span></span></a></li>
		         <li class='has-sub'><a href='?p=maintenance'><span><span class="glyphicon glyphicon-warning-sign"></span> Maintance Module </span></a></li>
				 <li class='has-sub'><a href='#'><span><span class="glyphicon glyphicon-wrench"></span> Configs</span></a>
		            <ul>
		               <li><a href='#'><span><span class="glyphicon glyphicon-lock"></span> Languages</span></a></li>
		               <li><a href='#'><span><span class="glyphicon glyphicon-lock"></span> Configs</span></a></li>
		            </ul>
		         </li>
		      </ul>

		   </li>
		   <li class='has-sub'><a href='#'><span><span class="glyphicon glyphicon-menu-hamburger"></span> Server Administration </span></a>
		      <ul>
		         <li class='has-sub'><a href='#'><span><span class="glyphicon glyphicon-wrench"></span> Functions</span></a>
		            <ul>
		               <li><a href='?p=nick_change'><span><span class="glyphicon glyphicon-edit"></span> Change Characters Nick</span></a></li>
		               <li><a href='?p=nobless'><span><span class="glyphicon glyphicon-star"></span> Give nobless status</span></a></li>
		               <li><a href='?p=delete_char1'><span><span class="glyphicon glyphicon-remove"></span> Delete chars with 1LVL</span></a></li>
		               <li><a href='?p=info_server'><span><span class="glyphicon glyphicon-tasks"></span> Server Information</span></a></li>
		               <li><a href='?p=clan'><span><span class="glyphicon glyphicon-list"></span> Show Clans</span></a></li>
		               <li><a href='?p=recomendations'><span><span class="glyphicon glyphicon-plus"></span> Add/Remove recomendation</span></a></li>
		               <li class='last'><a href='?p=ban'><span><span class="glyphicon glyphicon-lock"></span> Add/Remove BAN</span></a></li>
		            </ul>
		         </li>
				 <li class='has-sub'><a href='?p=log'><span><span class="glyphicon glyphicon-list"></span> Logs</span></a>
		            <ul>
		               <li><a href='?p=gameserver'><span><span class="glyphicon glyphicon-list"></span> Gameserver</span></a></li>
		               <li><a href='?p=loginserver'><span><span class="glyphicon glyphicon-list"></span> Loginserver</span></a></li>
		            </ul>
		         </li>
		      </ul>
		   </li>
		   
	
		</ul>
		</div>

        <div id="conteudo">
    	    
	        <div class="conteuinter">
        	<?php
			$pros = 'proteção';
			
			if(!isset($_GET['p'])){
				$p = "home";	
			}else{
				$p = $_GET['p'];	
			}
			
			if(file_exists("pages/$p.php")){
				include"pages/$p.php";	
			}
			
			?>
			</div>
        </div><!--conteudo-->
    
    </div><!--box-->

</body>
</html>



<!-- TinyMCE -->
<script type="text/javascript" src="scripts/jscripts/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript" src="../js/jquery.js" ></script>
    <script type="text/javascript" src="../js/jquery.maskMoney.js" ></script>
    <script type="text/javascript">
        $(document).ready(function(){
              $("input.dinheiro").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
        });
    </script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,media",
		theme_advanced_buttons4 :"",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});


</script>
<script>
jQuery("document").ready(function($){
    
    var div = $('#cssmenu');
    
    $(window).scroll(function () {
        if ($(this).scrollTop() &gt; 100) {
            div.addClass("f-nav");
        } else {
            div.removeClass("f-nav");
        }
    });
 
});
</script>	
<!-- /TinyMCE -->
