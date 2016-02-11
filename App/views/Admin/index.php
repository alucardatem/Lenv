<form action='/administation/admin/new' method="POST" >
	<table>
		<tr>
			<td>Title</td>
			<td><input type="text" name='add_news_title'/></td>
		</tr>
		<tr>
			<td>Content</td>
			<td><textarea name='add_news_content'></textarea></td>
		</tr>
		<tr>
			<td>Author</td>
			<td><input type="text" name="add_news_author"></td>
		</tr>
		<tr>
			<td><input type="submit" name='Add' value="Add"></td>
			<td><input type='button' name='Clear' value="Clear"></td>
		</tr>
	</table>
</form>


<form action='/administration/admin/edit' method="POST" style='display:none'>
<div class='body-container'>
	<div class='content-container'>
		<?php
			foreach($newsItem as $key=>$item) {
				?>
				<div class="news_item">
					<div class="news_title"><?=$item['news_title']?></div>
					<div class="news_body"><?=$item['news_body']?></div>
					<div class="news_author"><?=$item['news_author']?></div>
					<div class="news_timestamp"><?=$item['news_timestamp']?></div>
					</div>
					<input type="hidden" name="news_item" value="<?=$key?>"/>
					<input type="submit" name="Edit" value="Edit">
				</div>

				<?php
			}
		?>
	</div>
</div>

</form>