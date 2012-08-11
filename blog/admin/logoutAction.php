<?php

	setcookie("AdminSession", '', time()-10);
header("Location: index.php");
?>
<html>
</html>