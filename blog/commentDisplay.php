<?php

echo 
"<div class = 'grid_8 commentContainer'>".
"<h5>".$row['name']."</h5>".
"<h5>".$row['email']."</h5>".
"<h5>".formatDate($row['date'])."</h5>".
"<h5>".$row['website']."</h5>".
"<h5>".$row['content']."</h5>".
"</div>";

?>
