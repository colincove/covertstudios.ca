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
?>