function deletePost(uid)
{
var confirmDelete=confirm("Are you sure you want to delete this post?");
if(confirmDelete==true){
var postData  = "uid="+uid;
var xmlHttp = new XMLHttpRequest();
xmlHttp.open("POST","admin/webservices/deletePost.php",true);
xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlHttp.onreadystatechange=function ()
{
  if (xmlHttp.readyState==4 && xmlHttp.status==200)
    {
	document.location.reload(true);
    }
}
xmlHttp.send(postData);
}
}
function hidePost(uid, currentState)
{
var newState;
if(currentState=='1'){
newState='FALSE';
}else{
newState='TRUE';
}
var postData  = "uid="+uid+"&state="+newState;
var xmlHttp = new XMLHttpRequest();
xmlHttp.open("POST","admin/webservices/hidePost.php",true);
xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlHttp.onreadystatechange=function ()
{
  if (xmlHttp.readyState==4 && xmlHttp.status==200)
    {
	alert(xmlHttp.responseText);
	document.location.reload(true);
    }
}
xmlHttp.send(postData);

}
