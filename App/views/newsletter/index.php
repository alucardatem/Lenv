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
				</div>
				<?php
			}
		?>
	</div>
</div>