<?php
include('adminModel.php'); 
$con=  mysql_connect("colincoveblog.db.8574327.hostedresource.com","colincoveblog","Sql@345678");
/*
$session;
if(empty($_COOKIE["OurLightSession"]))
{
$session=uniqid();
setcookie("OurLightSession", $session, time()+600);
}else{
$session=$_COOKIE["OurLightSession"];
}*/
if(empty($_COOKIE["AdminSession"]))
{
include('userLogin.php');
}else{
include('adminPanel.php');
}


?>
