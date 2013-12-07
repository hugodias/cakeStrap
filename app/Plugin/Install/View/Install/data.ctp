<div class="install">
	<h2><?php echo $title_for_layout; ?></h2>
	<p> <?php echo __('Create tables');?> </p>
</div>

<div class="form-actions">
	<?php
	echo $this->Html->link(__('Build database'), array(
		'plugin' => 'install',
		'controller' => 'install',
		'action' => 'data',
		'run' => 1,
	), array(
		'class' => 'btn btn-primary',
	));
	?>
</div>