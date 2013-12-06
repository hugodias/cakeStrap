<?php
echo $this->CakeStrap->create('User', array(
	'url' => array('controller' => 'install', 'action' => 'adminuser'),
	));
?>
<div class="install">
	<h2><?php echo __('Step 3: Create Admin User'); ?></h2>
	<?php
		echo $this->CakeStrap->input('username');
		echo $this->CakeStrap->input('email');
		echo $this->CakeStrap->input('password');
		echo $this->CakeStrap->input('role', array('type'=>'hidden','value' => 'admin'));
	?>
</div>
<div class="form-actions">
	<?php echo $this->CakeStrap->end(__('Save')); ?>
</div>
