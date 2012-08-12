<?php
$con=  mysql_connect("colincoveblog.db.8574327.hostedresource.com","colincoveblog","Sql@345678");
deletePost($con, $_POST['uid']);
function deletePost($con, $uid)
{
$db_selected=mysql_select_db ('colincoveblog', $con);
$query =  sprintf("DELETE FROM blogEntry WHERE uid ='%s'", 
mysql_real_escape_string($uid));
$result = mysql_query($query, $con) or die(mysql_error());
	//$row = mysql_fetch_assoc($result);
}
?>