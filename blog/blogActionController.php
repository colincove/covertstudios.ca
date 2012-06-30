<?php
  $con=  mysql_connect("colincoveblog.db.8574327.hostedresource.com","colincoveblog","Sql@345678");
  include('utils/dateUtil.php');
switch($_POST['action'])
{
case 'makeComment':
include("webservices/makeCommentAction.php");
makeComment($_POST['content'],
 $_POST['name'],
 $_POST['email'],
 $_POST['website'],
 $_POST['blogId'],
 $con);
break;
}
?>