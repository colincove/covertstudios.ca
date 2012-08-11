<?php
$userInfo =unserialize($_COOKIE["UserInfo"]); 
?>
<html>
<head>
<script type="text/javascript" src="js/forms.js"></script>
<script type="text/javascript" src="js/XMLHttpRequestFactory.js"></script>
<script type="text/javascript" src="lightBox/js/prototype.js"></script>
<script type="text/javascript" src="lightBox/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="lightBox/js/lightbox.js"></script>
<link rel="stylesheet" href="lightBox/css/lightbox.css" type="text/css" media="screen" />
</head>
<body style="width: 100%;">

<form action="upload-file.php" method="post" target="upload_target"
style="width: 100%; height: 100px;"
enctype="multipart/form-data" id="file_upload_form" name="file_upload_form" >

<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="radio" name="image" value="gallery" /> gallery<br />
<input type="radio" name="image" value="300x165" /> 300x165
<input type="radio" name="image" value="620x460" /> 620x460
<input type="radio" name="image" value="thumb" checked /> thumb
<!--<input type="button" onClick="uploadImage()" name="submit" value="Submit" />-->
<input type="submit" name="submit" value="Submit" />

</form>
<form action="webservices/post.php" id="post-submit-form" method="post" target="post_target" style="width: 100%;">
User:<?php echo $userInfo["name"] ?><button onClick="location.href='logoutAction.php'">Logout</button>
<div style="" >
<?php getTags($con); ?>
<div>
<div style="width: 100%; height: 500px;">
<div style="width: 500px; height: 500px; float:left;">
<textarea style="width: 100%; height: 100px;" id="title" name="title" ></textarea>
<textarea style="width: 100%; height: 400px;" id="introduction" name="introduction" ></textarea>

</div>

<textarea type="text" style="width: 800px; height: 500px;" id="post-input" name="content" ></textarea>

</div>
<input type= "text" id="thumb_id" name="thumbnail" />
<button onClick="submitPost()"  type="button" />Submit Post</button>
<!--<input type="submit" name="submit" value="Submit post" />-->
</form>

<iframe id="upload_target" width="0" height="0" name="upload_target" src="" style="width:300;height:50;border:0px solid #fff;"></iframe>
<iframe id="post_target" width="0" height="0" name="post_target" src="" style="width:300;height:50;border:0px solid #fff;"></iframe>

<button type="button" onClick="addGallery()" >Add Gallery</button>
<button type="button" onClick="addCode()" >Add Code</button>
</body>
</html>