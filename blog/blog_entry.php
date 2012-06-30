<?php

echo 
"<div class = 'grid_8 blogPost'>".
"<h5>".formatDate($row['date'])."</h5>".
"<img src='content/".$row['thumbnail']."_300x165.jpg' class='img_300x165 postThumbnail' align='left' />".
"<img class='topicIcon' src='images/topicIcon.jpg' />".
"<a class='postTitleLink' href='http://www.covertstudios.ca/blog/index.php?viewPost=".$row['uid']."'><h1>".$row['title']."</h1></a>".
"<div>".$row['introduction']."</div>".
"</div>";

?>
