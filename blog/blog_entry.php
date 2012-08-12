


<div class = 'grid_8 blogPost'>

<?php
if(empty($_COOKIE["AdminSession"])==false)
{

echo '<img src="admin/image/x.png" onclick="deletePost(\''.$row['uid'].'\')" /><img src="admin/image/hide.png" onclick="hidePost(\''.$row['uid'].'\',\''.$row['visible'].'\')" />';
if($row['visible']=='0')
{
echo " CURENTLY HIDDEN";
}
}
 ?>
<h5><?php echo formatDate($row['date']) ?></h5>
<img src='content/<?php echo $row['thumbnail'] ?>_300x165.jpg' class='img_300x165 postThumbnail' align='left' />
<img class='topicIcon' src='images/topicIcon.jpg' />
<a class='postTitleLink' href='http://www.covertstudios.ca/blog/index.php?viewPost="<?php echo $row['uid'] ?>"'><h1><?php echo $row['title'] ?></h1></a>
<div><?php echo $row['introduction'] ?></div>
</div>


