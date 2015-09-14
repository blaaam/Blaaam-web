<?php if(!isset($pros)){echo 'Protected Page'; exit;};

// Create connection
$conn = new mysqli($host, $user, $senha, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT PATH_LOGINSERVER, PATH_GAMESERVER, SERVER_NAME, RATE_XP, RATE_SP, RATE_DROP, RATE_ADENA, RATE_SPOIL, PATH_LOGO, PATH_SLIDE1, PATH_SLIDE2, PATH_SLIDE3, SITE_VNAME1, SITE_VNAME2, SITE_VNAME3, SITE_VNAME4, SITE_VNAME5, SITE_VNAME6, PATH_VOTE1, PATH_VOTE2, PATH_VOTE3, PATH_VOTE4, PATH_VOTE5, PATH_VOTE6, SITE_VOTE1, SITE_VOTE2, SITE_VOTE3, SITE_VOTE4, SITE_VOTE5, SITE_VOTE6, CREDITS, DOWNLOAD_SYS_1, DOWNLOAD_SYS_2, DOWNLOAD_ANIM_1, DOWNLOAD_ANIM_2, DOWNLOAD_SYSTEX_1, DOWNLOAD_SYSTEX_2, DOWNLOAD_FULL_EXE_1, DOWNLOAD_FULL_EXE_2, DOWNLOAD_FULL_RAR_1, DOWNLOAD_FULL_RAR_2, DOWNLOAD_CLIENT_1, DOWNLOAD_CLIENT_2, SITE_TITLE, SITE_EMAIL, item_id, DropItemId, MAX_ENCHANT, SITE_DESCRIPTION, SITE_KEYWORDS, SITE_AUTHOR, POLL_QUESTION, POLL_ANSWER1, POLL_ANSWER2 FROM configuration";

$result=mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){

?> 
 <form method="post" action="">
        <div id="field">
		<table border="0">
            <tr>
				<td>Path to Login server log file :</td>
				<td><input type="text" name="PATH_LOGINSERVER" value="<?php echo $row["PATH_LOGINSERVER"] ?>"></td>
				<td>&nbsp;</td>
				<td>Path to Game server log file :</td>
				<td><input type="text" name="PATH_GAMESERVER" value="<?php echo $row["PATH_GAMESERVER"] ?>"></td>
			</tr>
			<tr>
				<td>Write your server name here :</td>
				<td><input type="text" name="SERVER_NAME" value="<?php echo $row["SERVER_NAME"] ?>"></td>
				<td>&nbsp;</td>
				<td>Server rate XP, will be displayed in top-bar at web pages :</td>
				<td><input type="text" name="RATE_XP" value="<?php echo $row["RATE_XP"] ?>"></td>
			</tr>
			<tr>
				<td>Server rate SP, will be displayed in top-bar at web pages :</td>
				<td><input type="text" name="RATE_SP" value="<?php echo $row["RATE_SP"] ?>"></td>
				<td>&nbsp;</td>
				<td>Server rate DROP, will be displayed in top-bar at web pages :</td>
				<td><input type="text" name="RATE_DROP" value="<?php echo $row["RATE_DROP"] ?>"></td>
			</tr>
			<tr>
				<td>Server rate ADENA, will be displayed in top-bar at web pages :</td>
				<td><input type="text" name="RATE_ADENA" value="<?php echo $row["RATE_ADENA"] ?>"></td>
				<td>&nbsp;</td>
				<td>Server rate SPOIL, will be displayed in top-bar at web pages :</td>
				<td><input type="text" name="RATE_SPOIL" value="<?php echo $row["RATE_SPOIL"] ?>"></td>
			</tr>
			<tr>
				<td>Path to logo file (Not used currently) :</td>
				<td><input type="text" name="PATH_LOGO" value="<?php echo $row["PATH_LOGO"] ?>"></td>
				<td>&nbsp;</td>
				<td>Path to image for first slide in web page :</td>
				<td><input type="text" name="PATH_SLIDE1" value="<?php echo $row["PATH_SLIDE1"] ?>"></td>
			</tr>
			<tr>
				<td>Path to image for second slide in web page :</td>
				<td><input type="text" name="PATH_SLIDE2" value="<?php echo $row["PATH_SLIDE2"] ?>"></td>
				<td>&nbsp;</td>
				<td>Path to image for third slide in web page :</td>
				<td><input type="text" name="PATH_SLIDE3" value="<?php echo $row["PATH_SLIDE3"] ?>"></td>
			</tr>
			<tr>
				<td>VOTE Site banner name for first vote (Only address) :</td>
				<td><input type="text" name="SITE_VNAME1" value="<?php echo $row["SITE_VNAME1"] ?>"></td>
				<td>&nbsp;</td>
				<td>VOTE Site banner name link for second vote (Only address) :</td>
				<td><input type="text" name="SITE_VNAME2" value="<?php echo $row["SITE_VNAME2"] ?>"></td>
			</tr>
			<tr>
				<td>VOTE Site banner name link for third vote (Only address) :</td>
				<td><input type="text" name="SITE_VNAME3" value="<?php echo $row["SITE_VNAME3"] ?>"></td>
				<td>&nbsp;</td>
				<td>VOTE Site banner name link for forth vote (Only address) :</td>
				<td><input type="text" name="SITE_VNAME4" value="<?php echo $row["SITE_VNAME4"] ?>"></td>
			</tr>
			<tr>
				<td>VOTE Site banner name link for five vote (Only address) :</td>
				<td><input type="text" name="SITE_VNAME5" value="<?php echo $row["SITE_VNAME5"] ?>"></td>
				<td>&nbsp;</td>
				<td>VOTE Site banner name link for six vote (Only address) :</td>
				<td><input type="text" name="SITE_VNAME6" value="<?php echo $row["SITE_VNAME6"] ?>"></td>
			</tr>
			<tr>
				<td>VOTE Site banner image for first vote (Only image) :</td>
				<td><input type="text" name="PATH_VOTE1" value="<?php echo $row["PATH_VOTE1"] ?>"></td>
				<td>&nbsp;</td>
				<td>VOTE Site banner image for second vote (Only image) :</td>
				<td><input type="text" name="PATH_VOTE2" value="<?php echo $row["PATH_VOTE2"] ?>"></td>
			</tr>
			<tr>
				<td>VOTE Site banner image for third vote (Only image) :</td>
				<td><input type="text" name="PATH_VOTE3" value="<?php echo $row["PATH_VOTE3"] ?>"></td>
				<td>&nbsp;</td>
				<td>VOTE Site banner image for forth vote (Only image) :</td>
				<td><input type="text" name="PATH_VOTE4" value="<?php echo $row["PATH_VOTE4"] ?>"></td>
			</tr>
			<tr>
				<td>VOTE Site banner image for five vote (Only image) :</td>
				<td><input type="text" name="PATH_VOTE5" value="<?php echo $row["PATH_VOTE5"] ?>"></td>
				<td>&nbsp;</td>
				<td>VOTE Site banner image for six vote (Only image) :</td>
				<td><input type="text" name="PATH_VOTE6" value="<?php echo $row["PATH_VOTE6"] ?>"></td>
			</tr>
			<tr>
				<td>VOTE Site banner address link for first vote (Only address) :</td>
				<td><input type="text" name="SITE_VOTE1" value="<?php echo $row["SITE_VOTE1"] ?>"></td>
				<td>&nbsp;</td>
				<td>VOTE Site banner address link for second vote (Only address) :</td>
				<td><input type="text" name="SITE_VOTE2" value="<?php echo $row["SITE_VOTE2"] ?>"></td>
			</tr>
			<tr>
				<td>VOTE Site banner address link for third vote (Only address) :</td>
				<td><input type="text" name="SITE_VOTE3" value="<?php echo $row["SITE_VOTE3"] ?>"></td>
				<td>&nbsp;</td>
				<td>VOTE Site banner address link for forth vote (Only address) :</td>
				<td><input type="text" name="SITE_VOTE4" value="<?php echo $row["SITE_VOTE4"] ?>"></td>
			</tr>
			<tr>
				<td>VOTE Site banner address link for five vote (Only address) :</td>
				<td><input type="text" name="SITE_VOTE5" value="<?php echo $row["SITE_VOTE5"] ?>"></td>
				<td>&nbsp;</td>
				<td>VOTE Site banner address link for six vote (Only address) :</td>
				<td><input type="text" name="SITE_VOTE6" value="<?php echo $row["SITE_VOTE6"] ?>"></td>
			</tr>
			<tr>
				<td>Credits which will be displayed at bottom at web in the footer section :</td>
				<td><input type="text" name="CREDITS" value="<?php echo $row["CREDITS"] ?>"></td>
				<td>&nbsp;</td>
				<td>Site to download System map mirror 1 :</td>
				<td><input type="text" name="DOWNLOAD_SYS_1" value="<?php echo $row["DOWNLOAD_SYS_1"] ?>"></td>
			</tr>
			<tr>
				<td>Site to download System map mirror 2 :</td>
				<td><input type="text" name="DOWNLOAD_SYS_2" value="<?php echo $row["DOWNLOAD_SYS_2"] ?>"></td>
				<td>&nbsp;</td>
				<td>Site to download Animations map mirror 1 :</td>
				<td><input type="text" name="DOWNLOAD_ANIM_1" value="<?php echo $row["DOWNLOAD_ANIM_1"] ?>"></td>
			</tr>
			<tr>
				<td>Site to download Animations map mirror 2 :</td>
				<td><input type="text" name="DOWNLOAD_ANIM_2" value="<?php echo $row["DOWNLOAD_ANIM_2"] ?>"></td>
				<td>&nbsp;</td>
				<td>Site to download System textures map mirror 1 :</td>
				<td><input type="text" name="DOWNLOAD_SYSTEX_1" value="<?php echo $row["DOWNLOAD_SYSTEX_1"] ?>"></td>
			</tr>
			<tr>
				<td>Site to download System textures map mirror 2 :</td>
				<td><input type="text" name="DOWNLOAD_SYSTEX_2" value="<?php echo $row["DOWNLOAD_SYSTEX_2"] ?>"></td>
				<td>&nbsp;</td>
				<td>Site to download full patch installation mirror 1 :</td>
				<td><input type="text" name="DOWNLOAD_FULL_EXE_1" value="<?php echo $row["DOWNLOAD_FULL_EXE_1"] ?>"></td>
			</tr>
			<tr>
				<td>Site to download full patch installation mirror 2 :</td>
				<td><input type="text" name="DOWNLOAD_FULL_EXE_2" value="<?php echo $row["DOWNLOAD_FULL_EXE_2"] ?>"></td>
				<td>&nbsp;</td>
				<td>Site to download full patch archived mirror 1 :</td>
				<td><input type="text" name="DOWNLOAD_FULL_RAR_1" value="<?php echo $row["DOWNLOAD_FULL_RAR_1"] ?>"></td>
			</tr>
			<tr>
				<td>Site to download full patch archived mirror 2 :</td>
				<td><input type="text" name="DOWNLOAD_FULL_RAR_2" value="<?php echo $row["DOWNLOAD_FULL_RAR_2"] ?>"></td>
				<td>&nbsp;</td>
				<td>Site to download game client mirror 1 :</td>
				<td><input type="text" name="DOWNLOAD_CLIENT_1" value="<?php echo $row["DOWNLOAD_CLIENT_1"] ?>"></td>
			</tr>
			<tr>
				<td>Site to download game client mirror 2 :</td>
				<td><input type="text" name="DOWNLOAD_CLIENT_2" value="<?php echo $row["DOWNLOAD_CLIENT_2"] ?>"></td>
				<td>&nbsp;</td>
				<td>Title for meta tag  :</td>
				<td><input type="text" name="SITE_TITLE" value="<?php echo $row["SITE_TITLE"] ?>"></td>
			</tr>
			<tr>
				<td>Site e-mail :</td>
				<td><input type="text" name="SITE_EMAIL" value="<?php echo $row["SITE_EMAIL"] ?>"></td>
				<td>&nbsp;</td>
				<td>Database (Will add more of database entry's here) :</td>
				<td><input type="text" name="item_id" value="<?php echo $row["item_id"] ?>"></td>
			</tr>
			<tr>
				<td>Drop item id :</td>
				<td><input type="text" name="DropItemId" value="<?php echo $row["DropItemId"] ?>"></td>
				<td>&nbsp;</td>
				<td>Max enchant rate for your server :</td>
				<td><input type="text" name="MAX_ENCHANT" value="<?php echo $row["MAX_ENCHANT"] ?>"></td>
			</tr>
			</table>
			<center><input type= "submit" name = "send" value="Edit!"></center>
        </div>
</form>

<?php } ?>
<?php

	if(isset($_POST['send'])){
	
	
						
			$mod = $conexao->prepare("UPDATE configuration SET PATH_LOGINSERVER = (:PATH_LOGINSERVER), PATH_GAMESERVER = (:PATH_GAMESERVER), SERVER_NAME = (:SERVER_NAME)");
			$mod->bindValue(':PATH_LOGINSERVER',$_POST['PATH_LOGINSERVER'],PDO::PARAM_STR);
			$mod->bindValue(':PATH_GAMESERVER',$_POST['PATH_GAMESERVER'],PDO::PARAM_STR);
			$mod->bindValue(':SERVER_NAME',$_POST['SERVER_NAME'],PDO::PARAM_STR);
			$mod->execute();
		    echo '<div class="alert alert-success">
		              <strong>Success!</strong> Setting was updated.
		          </div>';
			
		}
?>