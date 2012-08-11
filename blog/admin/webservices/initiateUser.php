<?php
function insertUser()
{
$con=  mysql_connect("colincoveblog.db.8574327.hostedresource.com","colincoveblog","Sql@345678");
$db_selected=mysql_select_db ('colincoveblog', $con);
$query =  sprintf("INSERT INTO users (uid, email, name, userPassword, isAdmin) VALUES('%s', 'cove.colin@gmail.com', 'Colin','%s', TRUE)",
mysql_real_escape_string(uniqid()),
mysql_real_escape_string(hash("md5","television01")));
echo($query);
$result = mysql_query($query, $con) or die(mysql_error());
}
insertUser();
?>