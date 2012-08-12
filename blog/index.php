<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<link rel="stylesheet" type="text/css" href="shadowbox-3.0.3/shadowbox.css">
<link rel="stylesheet" type="text/css" href="css/blogStyle.css">
<link rel="stylesheet" type="text/css" href="css/navStyle.css">
<link rel="stylesheet" type="text/css" href="css/headerStyle.css">
<link rel="stylesheet" type="text/css" href="css/grid.css">
<link rel="stylesheet" type="text/css" href="css/comments.css">
<link rel="stylesheet" type="text/css" href="css/cssreset.css">
<link href="css/prettify.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/prettify.js"></script>
<script type="text/javascript" src="shadowbox-3.0.3/shadowbox.js"></script>
<script type="text/javascript" src="admin/js/adminFunctions.js" ></script>
<script type="text/javascript">
Shadowbox.init({
    handleOversize: "drag",
    modal: true
});
</script>
	<link type="text/css" href="pikachoose-4.4.3/styles/bottom.css" rel="stylesheet" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.js"></script>
		<script type="text/javascript" src="pikachoose-4.4.3/lib/jquery.pikachoose.js"></script>
				<script type="text/javascript" src="js/blogFunctions.js"></script>
		<script language="javascript">
			$(document).ready(
				function (){
					$("#pikame").PikaChoose({carousel:true});
				});
		</script>
</head>
<body onload="prettyPrint()">
<div class="container container_12 centeringDiv"  >
<?php
include('blogHeader.php');
include('utils/dateUtil.php');
?>
<!--<div class="container container_12" >-->
<div class="grid_8 blogContent">
<?php
 include("webservices/blog.php");
 $con=  mysql_connect("colincoveblog.db.8574327.hostedresource.com","colincoveblog","Sql@345678");
if(isset($_GET['viewPost']))
{
displayPost($_GET['viewPost'], $con);
}else{
 getFrontPage($con);
}

 ?>
 
 </div>
 <?php
 include('blogNav.php');
 ?>
 </div>
 <!--</div>-->
</body>
</html>
