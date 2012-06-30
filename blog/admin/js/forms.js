var thumbnail;
function init() {
	document.getElementById('file_upload_form').onsubmit=function() {
		document.getElementById("upload_target").onload = uploadDone;
	}
}
window.onload=init;
function uploadImage(){
sendRequest('upload-file.php',uploadImageCallback);
//xmlhttp.open("POST","ajax_test.asp",true);
//xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//xmlhttp.send("fname=Henry&lname=Ford");


}

function uploadImageCallback(data)
{
alert(data);
}
function uploadDone()
{
imgId=getDataFromiFrame();
if(imgId!=='-1'){

imageType=getCheckedValue(document.forms['file_upload_form'].elements['image']);
alert(imageType);
switch(imageType)
{
case 'gallery':
		document.getElementById('post-input').value+="<li><a href='content/"+imgId+".jpg' rel='lightbox' >"+
		"<img src='content/"+imgId+".jpg'/></a><span></span></li>"
break;
case '300x165':
document.getElementById('post-input').value+="<a href='content/"+imgId+".jpg' rel='lightbox' class='link_300x165'> "+
"<img src='content/"+imgId+"_300x165.jpg'  class='img_300x165' align='left' "+
"/></a>";
break;
case 'thumb':
thumbnail=imgId;
document.getElementById('thumb_id').value=imgId;
break;
case '620x460':
document.getElementById('post-input').value+="<img src='content/"+imgId+"_620x460.jpg'  class='img_620x460' />"
}
}else{
alert('problem loading image');
}
}
function getDataFromiFrame()
{
var iFrame =  document.getElementById('upload_target');
var iFrameBody;
   if ( iFrame.contentDocument ) 
   { // FF
     iFrameBody = iFrame.contentDocument.getElementsByTagName('body')[0];
   }
   else if ( iFrame.contentWindow ) 
   { // IE
     iFrameBody = iFrame.contentWindow.document.getElementsByTagName('body')[0];
   }
//document.getElementById('post-input').value += frames['upload_target'].document.getElementsByTagName("body")[0].innerHTML;
return iFrameBody.innerHTML;
}
function addGallery()
{
document.getElementById('post-input').value+='<div class="galleryContainer" >'+
	'<ul id="pikame" class="jcarousel-skin-pika">'+
	'</ul>'+
'</div>';
}

function addCode()
{
document.getElementById('post-input').value+="<pre class='prettyprint' >"+
"</pre>";
}

// return the value of the radio button that is checked

// return an empty string if none are checked, or

// there are no radio buttons

function getCheckedValue(radioObj) {

	if(!radioObj)

		return "";

	var radioLength = radioObj.length;

	if(radioLength == undefined)

		if(radioObj.checked)

			return radioObj.value;

		else

			return "";

	for(var i = 0; i < radioLength; i++) {

		if(radioObj[i].checked) {

			return radioObj[i].value;

		}

	}

	return "";

}
function submitPost()
{
document.getElementById('post-input').value.replace("Microsoft", "W3Schools");
if(typeof thumbnail=='undefined')
{
alert('please select a thumbnail for image');

}else{
document.getElementById('post-submit-form').submit();
}
}

/*function insertTextAtCursor(text) {
    var sel, range, html;
    if (window.getSelection) {
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();
            range.insertNode( document.createTextNode(text) );
        }
    } else if (document.selection && document.selection.createRange) {
        document.selection.createRange().text = text;
    }
}*/


