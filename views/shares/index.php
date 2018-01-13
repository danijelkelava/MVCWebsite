<div>
	<a class="btn btn-success btn-share" href="/shares/add">Add Todo</a>
	
	<?php foreach($viewmodel as $item) : ?>
		<div class="well">
			<h3><?php echo $item['title']; ?></h3>
		</div>
	<?php endforeach; ?>
	
</div>