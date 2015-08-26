<?php if(!isset($pro)){echo 'Protected page!'; exit;}; ?>
<?php if(!isset($_SESSION[SERVER_NAME."login"])){
	echo '<div class="alert alert-danger">
        <strong>Access restricted!</strong> You must be loged in to see content!
    </div>';
}else{?>

<?php
//Not done yet with class display!	
$things = array(
  		 '0' => 'Human Fighter',
		 '1' => 'Warrior',
		 '2' => 'Gladiator',
		 '3' => 'Warlord',
		 '4' => 'Human Knight',
		 '5' => 'Paladin',
		 '6' => 'Dark Avenger',
		 '7' => 'Rogue',
		 '8' => 'Treasure Hunter',
		 '9' => 'Hawkeye',
		 '10' => 'Human Mystic',
		 '11' => 'Human Wizard',
		 '12' => 'Sorcerer',
		 '13' => 'Necromancer',
		 '14' => 'Warlock',
		 '15' => 'Cleric',
		 '16' => 'Bishop',
		 '17' => 'Prophet',
		 '18' => 'Elven Fighter',
		 '19' => 'Elven Knight',
		 '20' => 'Temple Knight',
		 '21' => 'Sword Singer',
		 '22' => 'Elven Scout',
		 '23' => 'Plains Walker',
		 '24' => 'Silver Ranger',
		 '25' => 'Elven Mystic',
		 '26' => 'Elven Wizard',
		 '27' => 'Spellsinger',
		 '28' => 'Elemental Summoner',
		 '29' => 'Elven Oracle',
		 '30' => 'Elven Elder',
		 '31' => 'Dark Fighter',
		 '32' => 'Palus Knight',
		 '33' => 'Shillien Knight',
		 '34' => 'Bladedancer',
		 '35' => 'Assassin',
		 '36' => 'Abyss Walker',
		 '37' => 'Phantom Ranger',
		 '38' => 'Dark Mystic',
		 '39' => 'Dark Wizard',
		 '40' => 'Spellhowler',
		 '41' => 'Phantom Summoner',
		 '42' => 'Shillien Oracle',
		 '43' => 'Shillien Elder',
		 '44' => 'Orc Fighter',
		 '45' => 'Orc Raider',
		 '46' => 'Destroyer',
		 '47' => 'Monk',
		 '48' => 'Tyrant',
		 '49' => 'Orc Mystic',
		 '50' => 'Orc Shaman',
		 '51' => 'Overlord',
		 '52' => 'Warcryer',
		 '53' => 'Dwarf Fighter',
		 '54' => 'Scavenger',
		 '55' => 'Bounty Hunter',
		 '56' => 'Artisan',
		 '57' => 'Warsmith',
		 '88' => 'Duelist',
		 '89' => 'Dreadnought',
		 '90' => 'Phoenix Knight',
		 '91' => 'Hell Knight',
		 '92' => 'Sagittarius',
		 '93' => 'Adventurer',
		 '94' => 'Archmage',
		 '95' => 'Soultaker',
		 '96' => 'Arcana Lord',
		 '97' => 'Cardinal',
		 '98' => 'Hierophant',
		 '99' => 'Evas Templar',
		 '100' => 'Sword Muse',
		 '101' => 'Wind Rider',
		 '102' => 'Moonlight Sentinel',
		 '103' => 'Mystic Muse',
		 '104' => 'Elemental Master',
		 '105' => 'Evas Saint',
		 '106' => 'Shillien Templar',
		 '107' => 'Spectral Dancer',
		 '108' => 'Ghost Hunter',
		 '109' => 'Ghost Sentinel',
		 '110' => 'Storm Screamer',
		 '111' => 'Spectral Master',
		 '112' => 'Shillien Saint',
		 '113' => 'Titan',
		 '114' => 'Grand Khavatari',
		 '115' => 'Dominator',
		 '116' => 'Doom Cryer',
		 '117' => 'Fortune Seeker',
		 '118' => 'Maestro',
		 '119' => 'World Trap',
		 '120' => 'Player Trap',
		 '121' => 'Double Ghost',
		 '122' => 'Siege Attacker',
		 '123' => 'Male Kamael Soldier',
		 '124' => 'Female Kamael Soldier',
		 '125' => 'Trooper',
		 '126' => 'Warder',
		 '127' => 'Berserker',
		 '128' => 'Male Soul Breaker',
		 '129' => 'Female Soul Breaker',
		 '130' => 'Arbalester',
		 '131' => 'Doombringer',
		 '132' => 'Male Soul Hound',
		 '133' => 'Female Soul Hound',
		 '134' => 'Trickster',
		 '135' => 'Inspector',
		 '136' => 'Judicator',
		 '139' => 'Sigel Knight',
		 '140' => 'Tyrr Warrior',
		 '141' => 'Othell Rogue',
		 '142' => 'Yul Archer',
		 '143' => 'Feoh Wizard',
		 '144' => 'Iss Enchanter',
		 '145' => 'Wynn Summoner',
		 '146' => 'Aeore Healer',
		 '148' => 'Sigel Phoenix Knight',
		 '149' => 'Sigel Hell Knight',
		 '150' => 'Sigel Evas Templar',
		 '151' => 'Sigel Shillien Templar',
		 '152' => 'Tyrr Duelist',
		 '153' => 'Tyrr Dreadnought',
		 '154' => 'Tyrr Titan',
		 '155' => 'Tyrr Grand Khavatari',
		 '156' => 'Tyrr Maestro',
		 '157' => 'Tyrr Doombringer',
		 '158' => 'Othell Adventurer',
		 '159' => 'Othell Wind Rider',
		 '160' => 'Othell Ghost Hunter',
		 '161' => 'Othell Fortune Seeker',
		 '162' => 'Yul Sagittarius',
		 '163' => 'Yul Moonlight Sentinel',
		 '164' => 'Yul Ghost Sentinel',
		 '165' => 'Yul Trickster',
		 '166' => 'Feoh Archmage',
		 '167' => 'Feoh Soultaker',
		 '168' => 'Feoh Mystic Muse',
		 '169' => 'Feoh Storm Screamer',
		 '170' => 'Feoh Soulhounds',
		 '171' => 'Iss Hierophant',
		 '172' => 'Iss Sword Muse',
		 '173' => 'Iss Spectral Dancer',
		 '174' => 'Iss Dominator',
		 '175' => 'Iss Doomcryer',
		 '176' => 'Wynn Arcana Lord',
		 '177' => 'Wynn Elemental Master',
		 '178' => 'Wynn Spectral Master',
		 '179' => 'Aeore Cardinal',
		 '180' => 'Aeore Evas Saint',
		 '181' => 'Aeore Shillien Saint',
		 '182' => 'Etheria Fighter',
		 '183' => 'Etheria Wizard',
		 '184' => 'Marauder',
		 '185' => 'Cloud Breaker',
		 '186' => 'Ripper',
		 '187' => 'Stratomancer',
		 '188' => 'Eviscerator',
		 '189' => 'Sayhas Seer'
);




	function online($str){
		$div = time() - (time() - $str);
		$div1 = ($div % 86400);
		$div2 = ($div % 3600);
		
		$dias = floor($div/86400);
		$horas = floor($div1/3600);
		$minutos = floor($div2/60);
		
		return $retotno = "$dias Day's $horas Hour's $minutos Minutes";
		
	}
	$PegaPersonagens = $conexao->prepare("SELECT *,(SELECT clan_name FROM clan_data WHERE characters.clanid = clan_id) AS clan FROM characters WHERE account_name = ?");
	$PegaPersonagens->execute(array($res_user['login']));
	if($PegaPersonagens->rowCount() <= 0){
		echo "<div id=\"no\">You don't have characters yet!</div>";	
	}
	$a = $PegaPersonagens->fetchAll(PDO::FETCH_ASSOC);
	
	foreach($a as $res){
		$res['clan'] = empty($res['clan']) ? 'No clan' : $res['clan'];
		$res['online'] = $res['online'] == 1 ? 'Yes' : 'No';
		$res['nobless'] = $res['nobless'] == 1 ? 'Yes' : 'No';
		echo "
			<span class='admin'><span class='username'>Profile:</span> $res[account_name]</span>
			<table class='ranking'>
				<tr>
					<tr><td>Characters in the account:</td><td> $res[char_name]</td></tr>
					<tr><td>Level:</td><td> $res[level]</td></tr>
					<tr><td>Class:</td><td>".$things[$res['classid']]."</td></tr>
					<tr><td>Clan:</td><td> $res[clan]</td></tr>
					<tr><td>PvPs:</td><td> $res[pvpkills]</td></tr>
					<tr><td>Pks:</td><td> $res[pkkills]</td></tr>
					<tr><td>Title:</td><td> $res[title]</td></tr>
					<tr><td>Reputation:</td><td> $res[reputation]</td></tr>
					<tr><td>Online:</td><td> $res[online]</td></tr>
					<tr><td>Online time:</td><td> ".online($res['onlinetime'])."</td></tr>
					<tr><td>Nobless:</td><td> $res[nobless]</td></tr>
				</tr>
			</table>";
	}
	
?>
	

<?php
}
?>
