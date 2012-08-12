<?php
$con=  mysql_connect("colincoveblog.db.8574327.hostedresource.com","colincoveblog","Sql@345678");
hidePost($con, $_POST['uid'], $_POST['state']);
function hidePost($con, $uid, $state)
{
$db_selected=mysql_select_db ('colincoveblog', $con);
$query =  sprintf("UPDATE blogEntry SET visible = %s WHERE uid ='%s'", 
mysql_real_escape_string($state),
mysql_real_escape_string($uid));
$result = mysql_query($query, $con) or die(mysql_error());
echo $query;
	//$row = mysql_fetch_assoc($result);
}
?>