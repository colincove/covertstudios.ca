<?php
function getTags($con){
$db_selected=mysql_select_db ('colincoveblog', $con);
$query =  sprintf("SELECT tagId, tag FROM tags");
$result = mysql_query($query, $con) or die(mysql_error());
	
	while ($row = mysql_fetch_assoc($result)) 
	{
	echo("<input type='checkbox' name='tags[]' value='".$row['tagId']."'>".$row['tag']."<br>");
	//include("blog_entry.php");
	}
}
function verifyAdminSession($con, $session){
$db_selected=mysql_select_db ('colincoveblog', $con);
$query =  sprintf("SELECT uid FROM users WHERE uid='%s'", 
mysql_real_escape_string($session));
$result = mysql_query($query, $con) or die(mysql_error());
	
	$row = mysql_fetch_assoc($result);
	if($row['uid']==$session)
	{
	}
}
function login($con, $email, $password)
{
$db_selected=mysql_select_db ('colincoveblog', $con);
$query =  sprintf("SELECT uid,email, name, userPassword, isAdmin FROM users WHERE email='%s'", 
mysql_real_escape_string($email));

$result = mysql_query($query, $con) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	//echo $row["name"]; 
	if(empty($row))
	{
	if($row['userPassword']==hash("md5",$password))
	{
	setcookie("AdminSession", $row['uid'], time()+600);
	header("Location: www.covertstudios.ca/blog/adminrrrrrrrrrrrrrr");
	}else{
	//wrong password
	header("Location: www.covertstudios.ca/blog/adminrrrrrrrrrrrrr");
	}
	}else{
	//wrong email
	header("Location: www.covertstudios.ca/blog/adminrrrrrrrrrrrrrr");
	}
	
}
?>