<?php
//ob_start();
function login($con, $email, $password)
{
$db_selected=mysql_select_db ('colincoveblog', $con);
$query =  sprintf("SELECT uid,email, name, userPassword, isAdmin FROM users WHERE email='%s'", 
mysql_real_escape_string($email));

$result = mysql_query($query, $con) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	//echo $row["name"]; 
	if(empty($row)==false)
	{
	if($row['userPassword']==hash("md5",$password))
	{
	setcookie("AdminSession", $row['uid'], time()+600,'/');
	setcookie("UserInfo", serialize($row), time()+600,'/');
header("Location: index.php?status=login ");
	exit();
	}else{
	//wrong password
	header("Location: index.php?status=wrongpassword");
	exit();
	}
	}else{
	//wrong email
	header("Location: index.php?status=nouserfound");
	exit();
	}
	
}
//include('adminModel.php'); 
//include('webservices/login.php'); 
$con=  mysql_connect("colincoveblog.db.8574327.hostedresource.com","colincoveblog","Sql@345678");
login($con, $_POST['email'], $_POST['password']);
//ob_end_flush();

?>
<html>
</html>