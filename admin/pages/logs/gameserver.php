<html>
<head>
<meta http-equiv="refresh" content="5">
</head>
<body>
<?php
include"../../../includes/config.php";
// full path to text file
define("PATH_GAMESERVER", "C:/Users/Autonets/Desktop/lineage2/lineage2/game/log/java0.log");
$filename = PATH_GAMESERVER;
// number of lines to read from the end of file
define("LINES_COUNT", 100);


if (file_exists($filename)) {
	
	function read_file($file, $lines) {
    //global $fsize;
    $handle = fopen($file, "r");
    $linecounter = $lines;
    $pos = -2;
    $beginning = False;
    $text = array();
    while ($linecounter > 0) {
        $t = " ";
        while ($t != "\n") {
            if(fseek($handle, $pos, SEEK_END) == -1) {
                $beginning = true; 
                break; 
            }
            $t = fgetc($handle);
            $pos --;
        }
        $linecounter --;
        if ($beginning) {
            rewind($handle);
        }
        $text[$lines-$linecounter-1] = fgets($handle);
        if ($beginning) break;
    }
    fclose ($handle);
    return array_reverse($text);
}

$fsize = round(filesize(PATH_GAMESERVER)/1024/1024,2);
$lines = read_file(PATH_GAMESERVER, LINES_COUNT);
	
	
	foreach ($lines as $line) {

	echo "<font color='yellow'> $line</font><br />";
}
	
} else {
    echo "<font color='white'><strong>The log file does not exist</strong><br />To add file log, go to web root/admin/pages/log/ and edit gameserver.php!</font>";
}


?>
<div id="footer">&nbsp;</div>
</body>
</html>
