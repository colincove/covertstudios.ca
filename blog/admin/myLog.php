<?php
function myLog($msg)
{
$myFile = "testFile.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
fwrite($fh, $msg. "\r\n");
//fputs($fp, $msg );
fclose($fh);
}
?>