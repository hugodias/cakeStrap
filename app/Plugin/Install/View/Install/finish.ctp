<div class="install">
	<h2><?php echo $title_for_layout; ?></h2>
	<p class="success">
		<?php echo __('The user %s has been created with administrative rights.<br>',sprintf('<strong>%s</strong>', $user['username']));?>
	</p>
	<p><?php echo __('Visit their website: %s', $this->Html->link(Router::url('/', true) . 'users')); ?></p>
</div>

<?php $this->start('steps');?>
	<ul class="install-task-list">
		<li class="done"><?php echo __('Check for restrictions');?></li>
		<li class="done"><?php echo __('Create Database file');?></li>
		<li class="done"><?php echo __('Build database');?></li>
		<li class="done"><?php echo __('Create the initial user system');?></li>
		<li class="done"><?php echo __('Create the configuration file');?></li>
		<li class="active"><?php echo $this->Html->link(__('Visit their website'),Router::url('/', true) . 'users');?></li>
	</ul>
<?php $this->end();?>