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
