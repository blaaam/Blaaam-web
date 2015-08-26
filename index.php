<?php
session_start();
include("includes/connection.php");
include("includes/login.class.php");
include("includes/config.php");
include("functions/fun.php");
$class = new login();
ob_start();
$manu = $conexao->prepare("SELECT manutencao FROM web_configs WHERE manutencao = 'false'");
$manu->execute();
if($manu->rowCount() == true && !isset($_SESSION['login'])){
	$manu_pro = '';
	include"_pags/manu.php";
	echo '<title>Site is in Maintance mode!Please come and visit us in few minutes!</title>';
	exit;	
}

header('Cache-control: private'); // IE 6 FIX
 
if(isSet($_GET['lang']))
{
$lang = $_GET['lang'];
 
// register the session and set the cookie
$_SESSION['lang'] = $lang;
 
setcookie('lang', $lang, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
else
{
$lang = 'en';
}
 
switch ($lang) {
  case 'br':
  $lang_file = 'lang.br.php';
  break;
 
  case 'ru':
  $lang_file = 'lang.ru.php';
  break;
 
  case 'lv':
  $lang_file = 'lang.lv.php';
  break;
 
  default:
  $lang_file = 'lang.en.php';
 
}
 
include_once 'languages/'.$lang_file;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title><?php echo SITE_TITLE ?></title>
	<meta charset="UTF-8">
	<meta name="description" content="<?php echo SITE_DESCRIPTION ?>">
	<meta name="keywords" content="<?php echo SITE_KEYWORDS ?>">
	<meta name="author" content="<?php echo SITE_AUTHOR ?>">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/classes.css">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/slideshow.css"/>
	<link rel="stylesheet" type="text/css" href="css/user.login.css">
	<link rel="stylesheet" type="text/css" href="js/lightbox/css/lightbox.css" />
	<style type="text/css">
  			#slideshow .c_slider {
				position: absolute;
				left: 0;
				top: 0;
				width: 400%;
				height: 310px;
				background: url(../<?php echo PATH_SLIDE1 ?>) 0 0 no-repeat,
				url(../<?php echo PATH_SLIDE2 ?>) 600px 0 no-repeat,
				url(../<?php echo PATH_SLIDE3 ?>) 1280px 0 no-repeat;
			}
	</style>
	<link rel="shortcut icon" type="image/png" href="/favicon.jpg"/>
</head>
<body oncontextmenu="return false">

<?php
	$online = $conexao->prepare("SELECT * FROM characters WHERE online <> '0'");
	$online->execute();
?>

<div class="bar">
	<div class="cont_bar">
		<ul class="info_server">
			<li><?php echo $lang['BAR_XP']; ?><strong><?php echo RATE_XP ?>x</strong></li>
			<li><?php echo $lang['BAR_SP']; ?><strong><?php echo RATE_SP ?>x</strong></li>
			<li><?php echo $lang['BAR_DROP']; ?><strong><?php echo RATE_DROP ?>x</strong></li>
			<li><?php echo $lang['BAR_ADENA']; ?><strong><?php echo RATE_ADENA ?>x</strong></li>
			<li><?php echo $lang['BAR_SPOIL']; ?><strong><?php echo RATE_SPOIL ?>x</strong></li>
			<li><?php echo $lang['BAR_ON']; ?><strong><?php print $online->rowCount(); ?></strong></li>
			<li><a href="http://l2kalev.tk/index.php?lang=en"><img name="English" alt="English" src="/languages/gb.gif" width="16" height="11" /></a>&nbsp;</li>
			<li><a href="http://l2kalev.tk/index.php?lang=br"><img name="Brasil" alt="Brasil" src="/languages/BR.png" width="16" height="11" /></a>&nbsp;</li>
			<li><a href="http://l2kalev.tk/index.php?lang=lv"><img name="Latvian" alt="Latvian" src="/languages/lv.png" width="16" height="11" /></a>&nbsp;</li>
			<li><a href="http://l2kalev.tk/index.php?lang=ru"><img name="Russian" alt="Russian" src="/languages/ru.gif" width="16" height="11" /></a>&nbsp;</li>
		</ul>
</div>
</div>
<div id="estrutura">

	<header id="cabecalho">
		<nav id="menu">
			<ul>
			<center>
				<li><a href="index.php?pag=home"><?php echo $lang['HOME']; ?></a></li>
				<li><a href="index.php?pag=register"><?php echo $lang['REGISTER']; ?></a></li>
				<li><a href="index.php?pag=info"><?php echo $lang['INFORMATION']; ?></a></li>
				<li><a href="index.php?pag=gallery"><?php echo $lang['GALLERY']; ?></a></li>
				<li><a href="index.php?pag=downloads"><?php echo $lang['DOWNLOAD']; ?></a></li>
				<li><a href="index.php?pag=donate"><?php echo $lang['DONATE']; ?></a></li>
				<li><a href="index.php?pag=contacts"><?php echo $lang['CONTACTS']; ?></a></li>
				<li><a href="#"><?php echo $lang['INFOTOP']; ?></a>
					<ul>
						<li><a href="index.php?pag=clan"><?php echo $lang['CLANINFO']; ?></a></li>
						<li><a href="index.php?pag=siege"><?php echo $lang['SIEGEINFO']; ?></a></li>
						<li><a href="index.php?pag=drop"><?php echo $lang['DROPINFO']; ?></a></li>
						<li><a href="index.php?pag=hero"><?php echo $lang['HEROINFO']; ?></a></li>
						<li><a href="index.php?pag=ollym"><?php echo $lang['OLLYINFO']; ?></a></li>
						<li><a href="index.php?pag=on"><?php echo $lang['TOPONLINE']; ?></a></li>
						<li><a href="index.php?pag=pk"><?php echo $lang['TOPPK']; ?></a></li>
						<li><a href="index.php?pag=pvp"><?php echo $lang['TOPPVP']; ?></a></li>
						<li><a href="index.php?pag=raid_boss"><?php echo $lang['RAIDBOSSINFO']; ?></a></li>
					</ul>
				</li>
			</center>
			</ul>
		</nav>
		
		<div id="banner">
			<img src="#" width="500" alt="">
		</div>
	
	</header>

	<div id="container">
	<section id="conteudo">
		<div class="title">
			<h2></h2>
		</div>
		<div class="tam-conteudo">

	<span id="sl_play" class="sl_command">&nbsp;</span>
	<span id="sl_pause" class="sl_command">&nbsp;</span>
	<section id="slideshow">
	
		
		<a class="play_commands pause" href="#sl_pause" title="Maintain paused"><?php echo $lang['PAUSE']; ?></a>
		<a class="play_commands play" href="#sl_play" title="Play the animation"><?php echo $lang['PLAY']; ?></a>
		
		<div class="container">
			<div class="c_slider"></div>
			<div class="slider">
				<figure>
					<img src="<?php echo PATH_SLIDE1 ?>" alt="" width="600" height="310" />
					<figcaption><?php echo $lang['SLIDE1']; ?></figcaption>
				</figure>
				<figure>
					<img src="<?php echo PATH_SLIDE2 ?>" alt="" width="600" height="310" />
					<figcaption><?php echo $lang['SLIDE2']; ?></figcaption>
				</figure>
				<figure>
					<img src="<?php echo PATH_SLIDE3 ?>" alt="" width="600" height="310" />
					<figcaption><?php echo $lang['SLIDE3']; ?></figcaption>
				</figure>
			</div>
		</div>
		
		<span id="timeline"></span>
		
		<ul class="dots_commands">
			<li><a title="<?php echo $lang['SSLIDE1']; ?>" href="#sl_i1">Slide 1</a></li>
			<li><a title="<?php echo $lang['SSLIDE2']; ?>" href="#sl_i2">Slide 2</a></li>
			<li><a title="<?php echo $lang['SSLIDE3']; ?>" href="#sl_i3">Slide 3</a></li>
		</ul>
		
	</section>


		      <?php
			  $pro = 'protected';
			  
			  $pag = isset($_GET['pag']) ? $_GET['pag'] : 'home';
			  $e = explode('/',$pag);
			  $pg = $e[0];
			  
			 if(file_exists("pages/$pg.php")){
				include"pages/$pg.php"; 
			  }else{
				echo '<div class="alert alert-danger">
			        <strong> echo $lang["404"]; </strong> echo $lang["MSG1"];
			    </div>';
				echo '<div class="alert alert-danger">
			       $lang["MSG2"];
			    </div>';
			  }
			  
			  ?>
	  	</div>
	</section>

	<aside id="conteudo-lateral">
		<div class="title">
			<h2><?php echo $lang['RIGHT_MENU']; ?></h2>
		</div>
		<section class="cont-right">
			<h2><?php echo $lang['RIGHT_CP']; ?></h2>
			<?php  
			if(!isset($_SESSION[SERVER_NAME."login"]) && !isset($_SESSION[SERVER_NAME."senha"])){	
			?>
			<form action="" class="login" method="post" enctype="multipart/form-data">
				<input type="text" name="usuario" id="usuario" placeholder="<?php echo $lang['RIGHT_EUSER']; ?>"/><br>
				<input type="password" name="senha" id="senha" placeholder="<?php echo $lang['RIGHT_EPASS']; ?>"/>
				<input type="submit" name="logar_usuario" id="cadastrar" class="btn-cadastrar" value="<?php echo $lang['LOGIN']; ?>"/>
			</form>
			<a href="index.php?pag=cadastro" class="btn-cad"><i><?php echo $lang['RIGHT_REGISTER']; ?></i></a><br>
			<a href="index.php?pag=recover" class="btn-cad"><i><?php echo $lang['RIGHT_FPASS']; ?></i></a>
			<?php  
			}else{
			?>
            <div id="login_menu">

                <span class="admin"><span class="username"><?php echo $lang['RIGHT_WELCOME']; ?></span>  <?php echo $_SESSION[SERVER_NAME."login"]; ?></span>
              <ul>	
            	<li><a href="index.php?pag=user"><?php echo $lang['RIGHT_MYACC']; ?></a></li>
                <li><a href="index.php?pag=profile"><?php echo $lang['RIGHT_MYCHARS']; ?></a></li>
            	<li><a href="index.php?pag=change"><?php echo $lang['RIGHT_PASSCHANGE']; ?></a></li>
                <li><a href="index.php?pag=confirm"><?php echo $lang['RIGHT_DONATEOK']; ?></a></li>
                <li><a href="index.php?pag=report"><?php echo $lang['RIGHT_REPORT']; ?></a></li>
                <li><a href="index.php?pag=logout"><?php echo $lang['LOGOUT']; ?></a></li>
              </ul>      
            </div><!--login_menu-->
 			<?php
 			}
			?>

			<?php  
			if(isset($_POST['logar_usuario'])){
				$login = trim(strip_tags($_POST['usuario']));
				$senha = base64_encode(pack("H*", sha1($_POST['senha'])));

				$class->logar($login,$senha,$conexao);
			}	
			?>
		</section>
		<div class="title-2">
			<h2><center><?php echo $lang['RIGHT_TOPOFSERV']; ?></center></h2>
		</div>
		<section class="cont-right">
			<h2><?php echo $lang['RIGHT_TOPOFPK']; ?></h2>

			<table class="ranking">
				<tr>
					<th width="50"><?php echo $lang['RANK_RANK']; ?></th>
					<th width="190"><?php echo $lang['RANK_NAME']; ?></th>
					<th width="80"><?php echo $lang['RANK_PK']; ?></th>
				</tr>
			<?php  
				$i =1;
				$pvp_sql = $conexao->prepare("SELECT char_name,pkkills,level FROM characters WHERE accesslevel = '0' ORDER BY pkkills DESC LIMIT 3");
				$pvp_sql->execute();
				while ($res_pvp = $pvp_sql->fetch(PDO::FETCH_ASSOC)) {

				  if($i == 1){
				    $img = "<img src=\"images/top1.gif\" alt=\"\">";
				  }elseif($i == 2){
				    $img = "<img src=\"images/top2.gif\" alt=\"\">";
				  }elseif($i == 3){
				    $img = "<img src=\"images/top3.gif\" alt=\"\">";
				  }else{
				    $img = $i."&ordm;";
				  }

			?>
				<tr>
					<td><?php echo $img; ?></td>
					<td title="Level: <?php echo $res_pvp['level']; ?>" id="tooltip"><?php echo $res_pvp['char_name']; ?></td>
					<td class="td-right"><?php echo number_format($res_pvp['pkkills'],0,'.','.' ); ?></td>
				</tr>
			<?php
			$i++;
			}
			?>
			</table>
		</section>

		<section class="cont-right">
			<h2><?php echo $lang['RIGHT_TOPOFPVP']; ?></h2>

			<table class="ranking">
				<tr>
					<th width="50"><?php echo $lang['RANK_RANK']; ?></th>
					<th width="190"><?php echo $lang['RANK_NAME']; ?></th>
					<th width="80"><?php echo $lang['RANK_PVP']; ?></th>
				</tr>
			<?php  
				$i =1;
				$pvp_sql = $conexao->prepare("SELECT char_name,pvpkills,level FROM characters WHERE accesslevel = '0' ORDER BY pvpkills DESC LIMIT 3");
				$pvp_sql->execute();
				while ($res_pvp = $pvp_sql->fetch(PDO::FETCH_ASSOC)) {

				  if($i == 1){
				    $img = "<img src=\"images/top1.gif\" alt=\"\">";
				  }elseif($i == 2){
				    $img = "<img src=\"images/top2.gif\" alt=\"\">";
				  }elseif($i == 3){
				    $img = "<img src=\"images/top3.gif\" alt=\"\">";
				  }else{
				    $img = $i."&ordm;";
				  }

			?>
				<tr>
					<td id="rhover"><?php echo $img; ?></td>
					<td title="Level: <?php echo $res_pvp['level']; ?>" id="tooltip"><?php echo $res_pvp['char_name']; ?></td>
					<td id="rhover" class="td-right"><?php echo number_format($res_pvp['pvpkills'],0,'.','.' ); ?></td>
				</tr>
			<?php
			$i++;
			}
			?>
			</table>
		</section>
				<div class="title-2">
			<h2><center><?php echo $lang['RIGHT_STREAM']; ?></center></h2>
		</div>
		<section class="cont-right">
			<div id="stream">
			<iframe class="embedly-embed" src="//cdn.embedly.com/widgets/media.html?src=%2F%2Fwww-cdn.jtvnw.net%2Fswflibs%2FTwitchPlayer.swff%3Fchannel%3Dmonstercats&fv=hostname%3Dwww.twitch.tv%26start_volume%3D25%26channel%3Dmonstercat%26auto_play%3Dtrue&url=http%3A%2F%2Fwww.twitch.tv%2Fmonstercat&image=http%3A%2F%2Fstatic-cdn.jtvnw.net%2Fjtv_user_pictures%2Fmonstercat-profile_image-72a449ee382a5425-600x600.png&key=475de7ab71f64b989019f70088e6ab8c&type=application%2Fx-shockwave-flash&schema=twitch" width="320" height="200" scrolling="no" frameborder="0" allowfullscreen></iframe>
			</div>
		</section>	
		<div class="title-2">
			<h2><center><?php echo $lang['RIGHT_VOTE']; ?></center></h2>
		</div>
		<section class="cont-right">
			
			<!--- VOTE BLOCK -->
			<table class="ranking">
			<tr>
			<td><a href="<?php echo SITE_VOTE1 ?>"><img name="<?php echo SITE_VNAME1 ?>" alt="<?php echo SITE_VNAME1 ?>" width="90" height="45" src="<?php echo PATH_VOTE1 ?>" /></a></td>
			<td><a href="<?php echo SITE_VOTE2 ?>"><img name="<?php echo SITE_VNAME2 ?>" alt="<?php echo SITE_VNAME2 ?>" width="90" height="45" src="<?php echo PATH_VOTE2 ?>" /></a></td>
			<td><a href="<?php echo SITE_VOTE3 ?>"><img name="<?php echo SITE_VNAME3 ?>" alt="<?php echo SITE_VNAME3 ?>" width="90" height="45" src="<?php echo PATH_VOTE3 ?>" /></a></td>
			</tr>
			<tr>
			<td><a href="<?php echo SITE_VOTE4 ?>"><img name="<?php echo SITE_VNAME4 ?>" alt="<?php echo SITE_VNAME4 ?>" width="90" height="45" src="<?php echo PATH_VOTE4 ?>" /></a></td>
			<td><a href="<?php echo SITE_VOTE5 ?>"><img name="<?php echo SITE_VNAME5 ?>" alt="<?php echo SITE_VNAME5 ?>" width="90" height="45" src="<?php echo PATH_VOTE5 ?>" /></a></td>
			<td><a href="<?php echo SITE_VOTE6 ?>"><img name="<?php echo SITE_VNAME6 ?>" alt="<?php echo SITE_VNAME6 ?>" width="90" height="45" src="<?php echo PATH_VOTE6 ?>" /></a></td>
			</tr>
			</table>
			
		</section>	
		<div class="title-2">
			<h2><center><?php echo $lang['RIGHT_POLL']; ?></center></h2>
		</div>
		<?php  
			if(!isset($_SESSION[SERVER_NAME."login"]) && !isset($_SESSION[SERVER_NAME."senha"])){ echo '<div class="alert alert-danger">
				        <strong>Sorry!</strong> You must be logged in to vote!
				    </div>';} else {?>
		<section class="cont-right">
			<div id="poll">
			<h2><center><?php echo POLL_QUESTION ?></center></h2>
			<form>
			<table class="ranking">
			<tr>
			<th><input type="checkbox" name="vote" value="0" onclick="getVote(this.value)"></th><th>Yes, i will use it!</th>
			</tr>
			<tr>
			<th><input type="checkbox" name="vote" value="1" onclick="getVote(this.value)"></th><th>No, im scared of it!</th>
			</tr>
			</table>
			<br />
			<center><input type="button" name="vote" class="btn" value="<?php echo $lang['POLL_VOTE']; ?>"><center>
			</form>
			</div>
		</section>
			<?php }?>
		<div class="title-2">
			<h2><center><?php echo $lang['RIGHT_GALLERY']; ?></center></h2>
		</div>
		<section class="cont-right">
			<div id="gallery2">

			<?php

				$select = $conexao->prepare("SELECT * FROM web_galeria WHERE destaque = '1' ORDER BY id DESC LIMIT 9");
				$select->execute();
				if($select->rowCount() <= 0){
					echo '<div class="alert alert-danger">
				        <strong>Sorry!</strong> Images are not yet added!
				    </div>';
				}
				
				while($res = $select->fetch(PDO::FETCH_ASSOC)){
					echo '<li><a tile="'.$res['titulo'].'" rel="lightbox[roadtrip]" href="'.$res['url'].'"><img src="'.$res['url'].'"></a></li>';	
					
				}

			?>

			</div>
		</section>
		<div class="title-2">
			<h2><center>Statics</center></h2>
		</div>
		<section class="cont-right">
			<div id="statics">
			<a href="http://info.flagcounter.com/UfWP"><img src="http://s06.flagcounter.com/count2/UfWP/bg_000000/txt_F7FDFF/border_381D38/columns_2/maxflags_10/viewers_0/labels_0/pageviews_1/flags_0/percent_0/" alt="Flag Counter" border="0"></a>
			</div>
		</section>
	</aside>

	</div>

	<footer id="rodape">
		<p><?php echo CREDITS ?></p>
	</footer>
</div>
</body>
</html>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-66154329-1', 'auto');
  ga('send', 'pageview');
</script>
	<script type="text/javascript" src="js/lightbox/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/lightbox/js/lightbox.js"></script>
    <script type="text/javascript" src="js/jquery.js" ></script>
    <script type="text/javascript" src="js/jquery.maskMoney.js" ></script>
    <script type="text/javascript">
        $(document).ready(function(){
              $("input.dinheiro").maskMoney({showSymbol:true, symbol:"ā‚¬", decimal:",", thousands:"."});
        });
    </script>
	<script>
function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("poll").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","poll_vote.php?vote="+int,true);
  xmlhttp.send();
}
</script>
<script language="javascript">
 	document.onmousedown=disableclick;
    status="What are you trying to do here? Bad-boy!";
    function disableclick(event)
    {
      if(event.button==2)
       {
         alert(status);
         return false;    
       }
    }
</script>