<div class = 'container_8 commentContainer'>



<table class="uiGrid editor" cellspacing="0" cellpadding="1">
<tbody>
<tr>
<td class="grid_2 lowContrast"><div><?php echo $row['name'] ?></br>
<?php echo $row['email'] ?></br>
<?php echo formatDate($row['date']) ?></br>
<a href="<?php echo $row['website'] ?>"><?php echo $row['website'] ?></a></div></td><td class="fieldContainer"><?php echo $row['content'] ?></td>
</tr>
</tbody>
</table>
</div>


