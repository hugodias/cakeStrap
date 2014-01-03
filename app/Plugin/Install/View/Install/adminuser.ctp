<?php
echo $this->Form->create('User', array(
	'url' => array('controller' => 'install', 'action' => 'adminuser'),
	));
?>
<div class="install">
	<h2><?php echo __('Step 3: Create Admin User'); ?></h2>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('role', array('type'=>'hidden','value' => 'admin'));
	?>
</div>
<div class="form-actions">
	<?php echo $this->Form->end(__('Save')); ?>
</div>

<?php $this->start('steps');?>
	<ul class="install-task-list">
		<li class="done">Check for restrictions</li>
		<li class="done">Create Database file</li>
		<li class="done">Build database</li>
		<li class="active">Create the initial user system</li>
		<li>Create the configuration file</li>
	</ul>
<?php $this->end();?>