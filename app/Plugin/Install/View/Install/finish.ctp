<div class="install">
	<h2><?php echo $title_for_layout; ?></h2>
	<p class="success">
		<?php echo __('The user %s has been created with administrative rights.<br>',sprintf('<strong>%s</strong>', $user['username']));
	?>
	</p>

	<p>
		<?php echo __('Visit their website: %s', $this->Html->link(Router::url('/', true))); ?>
	</p>
</div>

