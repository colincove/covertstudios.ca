<?php

function addRaw($uid, $con)
{
$db_selected=mysql_select_db ('colincoveblog', $con);
	$query1 =  sprintf("INSERT INTO contentRaw (uid) VALUES('%s')",
	mysql_real_escape_string($uid));
	mysql_query($query1, $con) or die(mysql_error());
}
function addContent($uid, $type, $con){
$db_selected=mysql_select_db ('colincoveblog', $con);
	$query1 =  sprintf("INSERT INTO content (uid, type) VALUES('%s', '%s')",
	mysql_real_escape_string($uid),
	mysql_real_escape_string($type));
	mysql_query($query1, $con) or die(mysql_error());
}
?>
