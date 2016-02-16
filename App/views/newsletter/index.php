<div class="row">
	<div class="col-md-4">
		<div class="panel-group" id="panel-843108">
			<?php
				//var_dump($newsItem);
				$i=0;
				foreach($newsItem as $key=>$item) {
			?>
					<div class="panel panel-default">
						<div class="panel-heading">
							 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-843108" href="#panel-element-<?=$i?>"><?=$item['title']?></a>
						</div>
						<div id="panel-element-<?=$i?>" class="panel-collapse collapse">
							<div class="panel-body">
								<?=$item['content']?>
							</div>
						</div>
					</div>
			<?php
					++$i;
				}
			?>
		</div>
	</div>
	<div class="col-md-8">
	</div>
</div>