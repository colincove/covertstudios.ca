<?php

include('myLog.php');
include('webservices/content.php');
$con=  mysql_connect("colincoveblog.db.8574327.hostedresource.com","colincoveblog","Sql@345678");
myLog('upload-file');
myLog($_FILES["file"]["type"]);
if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/pjpeg"))
		&& ($_FILES["file"]["size"] < 500000))
{
	if ($_FILES["file"]["error"] > 0)
	{
		//echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
	}
	else
	{
		//echo "Upload: " . $_FILES["file"]["name"] . "<br />";
		//echo "Type: " . $_FILES["file"]["type"] . "<br />";
		//echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
		//echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

		if (file_exists("upload/" . $_FILES["file"]["name"]))
		{
			//echo $_FILES["file"]["name"] . " already exists. ";
		}
		else
		{
		$uid = uniqid();
			move_uploaded_file($_FILES["file"]["tmp_name"],
			"../content/" .$uid.'.jpg');
			addRaw($uid,$con);
			processImage($uid,"../content/" .$uid.'.jpg', $con);
			echo $uid;
			exit();
			//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
		}
	}
}
else
{
	echo "-1";
}
/*1	thumb
			2	300x165
			3	620x460
			4	gallery*/
function processImage($uid,$filename, $con)
{
switch($_POST['image'])
{
case 'gallery':
addContent($uid, 4,$con);
break;
case '300x165':
createThumbnail($uid,$filename, 300, 165);
addContent($uid, 2,$con);
break;
case 'thumb':
createThumbnail($uid,$filename, 300, 165);
addContent($uid, 1,$con);
break;
case '620x460':
createThumbnail($uid,$filename,620,460 );
addContent($uid, 3,$con);
}


}
function createThumbnail($uid,$filename, $newwidth, $newheight){
// Get new sizes
list($width, $height) = getimagesize($filename);

// Load
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($filename);

// Resize
imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// Output
//$fh = fopen("../content/".$uid."_50.jpg", 'w') or die("can't open file");
//fwrite($fh,$thumb);
//fputs($fp, $msg );
//fclose($fh);
imagejpeg($thumb, "../content/".$uid."_".$newwidth."x".$newheight.".jpg");
}
?>