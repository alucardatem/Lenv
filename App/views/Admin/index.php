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

<style>
	.form-horizontal .control-label{
   text-align:left !important; 
   width: 5em;
}
</style>

<div class="col-md-12">
	<form class="form-horizontal" role="form" action='/~rotariudan/Lenv/admin/new' method="POST" >
		<div class="form-group">
			 
			<label for="add_news_title" class="col-sm-2 control-label">
				Title
			</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="add_news_title" name='add_news_title' />
			</div>
		</div>
		<div class="form-group">
			 
			<label for="add_news_author" class="col-sm-2 control-label">
				Author
			</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="add_news_author" name='add_news_author' />
			</div>
		</div>
		<div class="form-group">
			 
			<label for="add_news_content" class="col-sm-2 control-label">
				Body
			</label>
			<div class="col-sm-10">
			<textarea class="form-control" id="add_news_content" name='add_news_content'></textarea>
			
			</div>
		</div>


		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				 
				<button type="submit" class="btn btn-default" name='Add' id="Add">
					Add
				</button>
				<button type="submit" class="btn btn-default" name='Logout' id="Logout">
					Logout
				</button>
			</div>
		</div>
	</form>
</div>
