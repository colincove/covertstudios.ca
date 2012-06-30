<div class = 'container_8 commentContainer'>



<table class="uiGrid editor" cellspacing="0" cellpadding="1">
<tbody>
<tr>
<td class="grid_2"><div>
</div></td><td class="fieldContainer"><?php echo $row['name'] ?></br>
<?php echo $row['email'] ?></br>
<a href="<?php echo $row['website'] ?>"><?php echo $row['website'] ?></a></br><?php echo formatDate($row['date']) ?></br></br><div class="commentContent"><?php echo $row['content'] ?></div></td>
</tr>
</tbody>
</table>
</div>


