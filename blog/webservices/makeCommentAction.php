<?php
 include("blog.php");
 function makeComment($content,$name,$email,$website,$blogId, $con)
 {
 addComment($content,
 $name,
 $email,
 $website,
 $blogId,
 $con);
 getComments( $blogId,0, 10, $con);
echo "dddd";
 }
?>