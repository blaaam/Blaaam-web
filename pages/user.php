<?php if(!isset($pro)){echo 'Protected page!'; exit;};?>
<?php if(!isset($_SESSION[SERVER_NAME."login"])){
	echo '<div class="alert alert-danger">
        <strong>Restricted access!</strong> Please login to see content.
    </div>';
}else{?>
<span class="admin"><span class="username">Username:</span>  <?php echo $_SESSION[SERVER_NAME."login"]; ?></span>
<table class="ranking">
	<tr>
		<tr><td>Characters in account:</td><td> <?php echo $user->rowCount(); ?></td></tr>
		<tr><td>Accesslevel:</td><td> <?php if ($res_user['accessLevel'] =="0") { echo 'User';} else { echo 'Other';} ?></td></tr>
		<tr><td>Last IP:</td><td> <?php echo $res_user['lastIP'] ?></td></tr>
		<tr><td>Last Server:</td><td> <?php if ($res_user['lastServer'] =="1") { echo 'Bartz';} else { echo 'Unknown';} ?></td></tr>
		<tr><td>Email:</td><td> <?php echo $res_user['email'] ?></td></tr>
		<tr><td>Name:</td><td> <?php echo $res_user['name']?></td></tr>
	</tr>
</table>
<?php
}
?>