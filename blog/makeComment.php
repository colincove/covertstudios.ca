<?php

?>
<div>
<form method="POST" action="blogActionController.php" name="makeCommentForm" >
<div class="large_form" id="reg_form_box">

<table class="uiGrid editor" cellspacing="0" cellpadding="1">
<tbody>
<tr>
<td class="label"><label>Name:</label></td><td class="fieldContainer"><input type="text" id="nameCommentInput" name="name"/></td>
</tr>
<tr>
<td class="label"><label>Email:</label>  </td><td class="fieldContainer"> <input type="text" id="emailCommentInput" name ="email"/></td>
</tr>
<tr>
<td class="label"><label>Website: </label></td><td class="fieldContainer"> <input type="text"id="websiteCommentInput" name ="website"/></td>
</tr>
</tbody>
</table> 

<textarea id="contentCommentInput" name="content" rows="3"cols="30"></textarea>
</div>
<!-- <input type="text"  id="contentCommentInput" name="content"/><br/>
<input type="submit" value="Post comment"/>-->
<input type="button"value="Post comment" onClick="postComment()" id="postCommentButton"/>
<input type="hidden" name="blogId" value="<?php echo $_GET['viewPost'] ?>">
<input type="hidden" name="action" value="makeComment">
</form>
</div>