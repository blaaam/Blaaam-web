<html>
<head>
<meta http-equiv="refresh" content="5">
</head>
<body>
<?php
include"../../../includes/config.php";
// full path to login file
$filename = PATH_LOGINSERVER;
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

$fsize = round(filesize(PATH_LOGINSERVER)/1024/1024,2);
$lines = read_file(PATH_LOGINSERVER, LINES_COUNT);
	
	
	foreach ($lines as $line) {

	echo "<font color='yellow'> $line</font><br />";
}
	
} else {
    echo "<font color='white'><strong>The log file does not exist</strong><br />To add file log, go to web root/_admin/paginas/log/ and edit index2.php!</font>";
}


?>
<div id="footer">&nbsp;</div>
</body>
</html>
