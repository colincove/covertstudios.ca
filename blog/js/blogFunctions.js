function postComment()
{
if(document.forms["makeCommentForm"]["content"].value=="")
{
var thediv = document.getElementById("contentCommentInput");
var oldClass  = thediv.getAttribute("class",0);
var newClass = "fieldError";
if(oldClass!=null){
newClass = newClass+oldClass;
}
thediv.setAttribute("class",newClass);
}else{

var name=document.forms["makeCommentForm"]["name"].value;
var email=document.forms["makeCommentForm"]["email"].value;
var website=document.forms["makeCommentForm"]["website"].value;
var content=document.forms["makeCommentForm"]["content"].value;
var action=document.forms["makeCommentForm"]["action"].value;
var blogId=document.forms["makeCommentForm"]["blogId"].value;
if(email==""){
email="none";
}
if(name==""){
name="anonymous";
}

var postData  = "name="+name+"&email="+email+"&website="+website+"&content="+content+"&action="+action+"&blogId="+blogId+"";
var xmlHttp = new XMLHttpRequest();
xmlHttp.open("POST","blogActionController.php",true);
xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlHttp.onreadystatechange=function ()
{
  if (xmlHttp.readyState==4 && xmlHttp.status==200)
    {
	document.getElementById("postCommentButton").disabled = false;
	document.getElementById("nameCommentInput").disabled = false;
	document.getElementById("emailCommentInput").disabled = false;
	document.getElementById("websiteCommentInput").disabled = false;
	document.getElementById("postCommentButton").disabled = false;
	document.getElementById("contentCommentInput").disabled = false;
	var thediv = document.getElementById("contentCommentInput");
thediv.setAttribute("class","");
document.forms["makeCommentForm"]["contentCommentInput"].value="";
    document.getElementById("comments").innerHTML=xmlHttp.responseText;
    }
}
document.getElementById("postCommentButton").disabled = true;
	document.getElementById("nameCommentInput").disabled = true;
	document.getElementById("emailCommentInput").disabled =true;
	document.getElementById("websiteCommentInput").disabled = true;
	document.getElementById("contentCommentInput").disabled = true;
document.getElementById("postCommentButton").disabled = true;
xmlHttp.send(postData);
}
}
