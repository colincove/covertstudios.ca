<?php

 function formatDate($date)
 {
$monthArray = array( '01'=>'Jan',
'02'=>'Feb',
'03'=>'Mar',
'04'=>'Apr',
'05'=>'May',
'06'=>'Jun',
'07'=>'Jul',
'08'=>'Aug',
'09'=>'Sept',
'10'=>'Oct',
'11'=>'Nov',
'12'=>'Dec', 12);
$dateTimeSplit = explode(" ",$date );
$dateSplit = explode("-",$dateTimeSplit[0]);
return $monthArray[$dateSplit[1]]." ".$dateSplit[2].", ".$dateSplit[0]." ".formatTime($dateTimeSplit[1]);
}
function formatTime($time)
{
$timeSplit = explode(":",$time);
$hours=$timeSplit[0];
$minutes=$timeSplit[1];
$am_pm="am";
if($hours>12)
{
$am_pm="pm";
}
return convertHoursFrom24($hours).":".$minutes." ".$am_pm;
}
function convertHoursFrom24($hours){
if($hours>12){
return $hours-12;
}
return $hours;
}
?>