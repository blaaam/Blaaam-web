<?php
session_start();
include("_config/conexao.php");
include("_config/login.class.php");
include("_config/configuracoes.php");
include("_function/fun.php");
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
	<title>Lineage 2 Kalev</title>
	<meta charset="UTF-8">
	<meta name="description" content="Lineage ][ Ertheia - Private server">
	<meta name="keywords" content="Our private server provides best of Lineage ][ Ertheia client. Our private server files are made by best Devlopers to give you best experiance">
	<meta name="author" content="l2ertheia.tk">
	<link rel="stylesheet" type="text/css" href="_css/estilo.css">
	<link rel="stylesheet" type="text/css" href="_css/classes.css">
	<link rel="stylesheet" type="text/css" href="_css/form.css">
	<link rel="stylesheet" type="text/css" href="_css/slideshow.css"/>
	<link rel="stylesheet" type="text/css" href="_css/user.login.css">
	<link rel="stylesheet" type="text/css" href="_js/lightbox/css/lightbox.css" />
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
			<li><?php echo $lang['BAR_XP']; ?><strong><?php echo xp ?>x</strong></li>
			<li><?php echo $lang['BAR_SP']; ?><strong><?php echo sp ?>x</strong></li>
			<li><?php echo $lang['BAR_DROP']; ?><strong><?php echo drop ?>x</strong></li>
			<li><?php echo $lang['BAR_ADENA']; ?><strong><?php echo adena ?>x</strong></li>
			<li><?php echo $lang['BAR_SPOIL']; ?><strong><?php echo spoil ?>x</strong></li>
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
				<li><a href="index.php?pag=cadastro"><?php echo $lang['REGISTER']; ?></a></li>
				<li><a href="index.php?pag=info"><?php echo $lang['INFORMATION']; ?></a></li>
				<li><a href="index.php?pag=galeria"><?php echo $lang['GALLERY']; ?></a></li>
				<li><a href="index.php?pag=downloads"><?php echo $lang['DOWNLOAD']; ?></a></li>
				<li><a href="index.php?pag=doacoes"><?php echo $lang['DONATE']; ?></a></li>
				<li><a href="index.php?pag=contato"><?php echo $lang['CONTACTS']; ?></a></li>
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
					<img src="_imagens/img/dummy-640x310-1.jpg" alt="" width="600" height="310" />
					<figcaption><?php echo $lang['SLIDE1']; ?></figcaption>
				</figure>
				<figure>
					<img src="_imagens/img/dummy-640x310-2.jpg" alt="" width="600" height="310" />
					<figcaption><?php echo $lang['SLIDE2']; ?></figcaption>
				</figure>
				<figure>
					<img src="_imagens/img/dummy-640x310-3.jpg" alt="" width="600" height="310" />
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
			  $pro = 'proteção';
			  
			  $pag = isset($_GET['pag']) ? $_GET['pag'] : 'home';
			  $e = explode('/',$pag);
			  $pg = $e[0];
			  
			 if(file_exists("_pags/$pg.php")){
				include"_pags/$pg.php"; 
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
			if(!isset($_SESSION[Servername."login"]) && !isset($_SESSION[Servername."senha"])){	
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

                <span class="admin"><span class="username"><?php echo $lang['RIGHT_WELCOME']; ?></span>  <?php echo $_SESSION[Servername."login"]; ?></span>
              <ul>	
            	<li><a href="index.php?pag=user"><?php echo $lang['RIGHT_MYACC']; ?></a></li>
                <li><a href="index.php?pag=personagens"><?php echo $lang['RIGHT_MYCHARS']; ?></a></li>
            	<li><a href="index.php?pag=change"><?php echo $lang['RIGHT_PASSCHANGE']; ?></a></li>
                <li><a href="index.php?pag=confirm"><?php echo $lang['RIGHT_DONATEOK']; ?></a></li>
                <li><a href="index.php?pag=report"><?php echo $lang['RIGHT_REPORT']; ?></a></li>
                <li><a href="index.php?pag=sair"><?php echo $lang['LOGOUT']; ?></a></li>
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
				    $img = "<img src=\"_imagens/top1.gif\" alt=\"\">";
				  }elseif($i == 2){
				    $img = "<img src=\"_imagens/top2.gif\" alt=\"\">";
				  }elseif($i == 3){
				    $img = "<img src=\"_imagens/top3.gif\" alt=\"\">";
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
				    $img = "<img src=\"_imagens/top1.gif\" alt=\"\">";
				  }elseif($i == 2){
				    $img = "<img src=\"_imagens/top2.gif\" alt=\"\">";
				  }elseif($i == 3){
				    $img = "<img src=\"_imagens/top3.gif\" alt=\"\">";
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
			<td><img name="HopeZone" alt="HopeZone" width="90" height="45" src="http://642507963.r.cdnsun.net/img/_vbanners/lineage2/lineage2-90x60-3.gif" /></td>
			<td><img name="TopZone" alt="TopZone" width="90" height="45" src="http://l2topzone.com/105x48.png" /></td>
			<td><img name="HopeZone" alt="HopeZone" width="90" height="45" src="http://www.top100arena.com/banner/big/big.jpg" /></td>
			</tr>
			<tr>
			<td><img name="HopeZone" alt="HopeZone" width="90" height="45" src="http://www.topservers200.com/button/8989.png" /></td>
			<td><img name="HopeZone" alt="HopeZone" width="90" height="45" src="http://l2network.eu/button.php?u=lineage2ertheia&buttontype=static" /></td>
			<td><img name="HopeZone" alt="HopeZone" width="90" height="45" src="http://www.l2neo.com/display/images/brazil.png" /></td>
			</tr>
			</table>
			
		</section>	
		<div class="title-2">
			<h2><center><?php echo $lang['RIGHT_POLL']; ?></center></h2>
		</div>
		<section class="cont-right">
			<div id="poll">
			<h2><center>Will you use Windows 10?</center></h2>
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
			<center><input type="button" name="vote" class="btn" value="VOTE"><center>
			</form>
			</div>
		</section>
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
	</aside>

	</div>
	<!-- POR FAVOR NÃO REMORVER OS DIREITOS OU AUTORAIS OU ESTARAM QUEBRANDO AS LEIS DE PRIVACIDADE
	INTELECTUAL PODENDO A VIR SER PROCESSADOS (O WEBSITE FOI FEITO GRATUITAMENTE NADA MAIS JUSTO QUE
	DEIXAR OS DIREITOS INTACTOS. MUITO OBRIGADO)-->
<!--	<footer id="rodape">
		<p><?php echo $lang['CREDITS']; ?></p>
	</footer> -->

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
	<script type="text/javascript" src="_js/lightbox/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="_js/lightbox/js/lightbox.js"></script>
    <script type="text/javascript" src="_js/jquery.js" ></script>
    <script type="text/javascript" src="_js/jquery.maskMoney.js" ></script>
    <script type="text/javascript">
        $(document).ready(function(){
              $("input.dinheiro").maskMoney({showSymbol:true, symbol:"€", decimal:",", thousands:"."});
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