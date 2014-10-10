
<div class="row">
	<div class="col-md-6 col-md-offset-3 alert alert-<?php echo $type ?>" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Fermer</span></button>
		<?php if (count($messages) > 1) : ?>
		<ul>
			<?php foreach ($messages as $message) : ?>
			<li><?php echo $message ?></li>
			<?php endforeach; ?>
		</ul>
		<?php else : ?>
		<p>
			<?php foreach ($messages as $message) : ?>
				<?php echo $message ?>
			<?php endforeach; ?>
		</p>
		<?php endif ?>
	</div>
</div>
