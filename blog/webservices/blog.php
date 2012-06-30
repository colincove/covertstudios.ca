<?php
function getPosts($start, $end,$con)
{
$db_selected=mysql_select_db ('colincoveblog', $con);
	
//$query =  sprintf("CREATE VIEW playthroughs AS ".
//"SELECT levelPlaythroughs.date, levelPlaythroughs.score, levelPlaythroughs.loadOut, levelPlaythroughs.user FROM level".$level."Playthroughs LEFT JOIN levelPlaythroughs ON level".$level."Playthroughs.playthroughId = levelPlaythroughs.uid ORDER BY score DESC");
//$result = mysql_query($query, $con) or die(mysql_error());
$query =  sprintf("SELECT uid, title, content, type, date, thumbnail, introduction FROM blogEntry  ORDER BY date DESC LIMIT ".$start.", ".$end);
$result = mysql_query($query, $con) or die(mysql_error());
	
	while ($row = mysql_fetch_assoc($result)) 
	{
	include("blog_entry.php");
	}
}
function getPostAtPage($page=0,$con)
{
getPosts($page, $page+10,$con);
}
function getFrontPage($con)
{
getPostAtPage(0,$con);
}
function displayPost($uid, $con)
{
$db_selected=mysql_select_db ('colincoveblog', $con);
	
//$query =  sprintf("CREATE VIEW playthroughs AS ".
//"SELECT levelPlaythroughs.date, levelPlaythroughs.score, levelPlaythroughs.loadOut, levelPlaythroughs.user FROM level".$level."Playthroughs LEFT JOIN levelPlaythroughs ON level".$level."Playthroughs.playthroughId = levelPlaythroughs.uid ORDER BY score DESC");
//$result = mysql_query($query, $con) or die(mysql_error());
$query =  sprintf("SELECT uid, title, content, type, date, thumbnail FROM blogEntry  WHERE uid= '%s'",
mysql_real_escape_string($uid));
$result = mysql_query($query, $con) or die(mysql_error());
$row = mysql_fetch_assoc($result);
echo $row['content'];
echo "<div id='commentsContainer' >";
include("makeComment.php");
echo "<div id='comments' >";
getComments($uid, 0,10, $con);
echo "</div></div>";
//include("content/".$row['uid'].".html");
}
function getComments($uid,$start, $end, $con)
{
$db_selected=mysql_select_db ('colincoveblog', $con);
$query =  sprintf("SELECT id,content,name,email,website, date FROM comments WHERE blogId = '%s' ORDER BY date DESC LIMIT %s, %s",
mysql_real_escape_string($uid),
mysql_real_escape_string($start),
mysql_real_escape_string($end));
$result = mysql_query($query, $con) or die(mysql_error());
	
	while ($row = mysql_fetch_assoc($result)) 
	{
	include("commentDisplay.php");
	}
	
}

function addComment($content,$name,$email, $website,$blogId,$con)
{
$db_selected=mysql_select_db ('colincoveblog', $con);
$query =  sprintf("INSERT INTO comments (content,name,email,website,blogId) VALUES('%s','%s','%s','%s','%s')",
mysql_real_escape_string($content),
mysql_real_escape_string($name),
mysql_real_escape_string($email),
mysql_real_escape_string($website),
mysql_real_escape_string($blogId)
);
$result = mysql_query($query, $con) or die(mysql_error());
}

?>