<?php
$con=  mysql_connect("colincoveblog.db.8574327.hostedresource.com","colincoveblog","Sql@345678");

$id=uniqid();
$content = fopen('../../content/'.$id.'.html','wb');
fwrite($content,mysql_real_escape_string($_POST['content']));
fclose($content);

$db_selected=mysql_select_db ('colincoveblog', $con);
	$query1 =  sprintf("INSERT INTO blogEntry (uid, title, content, thumbnail, introduction) VALUES('%s','%s','%s','%s', '%s')",
	mysql_real_escape_string($id),
	mysql_real_escape_string($_POST['title']),
	mysql_real_escape_string($_POST['content']),
	mysql_real_escape_string($_POST['thumbnail']),
	mysql_real_escape_string($_POST['introduction']));
	mysql_query($query1, $con) or die(mysql_error());

	$tagCount = count($_POST['tags']);
	if($tagCount>0)
	{
	$tagQuery  ="INSERT INTO blogTags VALUES(null,'".$id."','".$_POST['tags'][0]."')";
	
	for($i=1; $i<$tagCount;$i++)
	{
	$tagQuery=$tagQuery.", (null,'".$id."','".$_POST['tags'][$i]."')";
	}
	$tagQuery=$tagQuery.";";
	mysql_query($tagQuery, $con) or die(mysql_error());
	}
echo 'Success!';
?>
