<h2 class="form-signin-heading"> <?php echo $label ?></h2>
<?php echo $this->Form->create('User');?>
<?php
	echo $this->Form->input('username',
		array(
			'label' => __('Username'),
			'value' => !empty( $user['User']['username'] ) ? $user['User']['username'] : ''
		));
	echo $this->Form->input('email',array('placeholder' => __('Email')));
	echo $this->Form->input('password',array('placeholder' => __('Password')));
	echo $this->Form->input('role', array(
	    'options' => array('admin' => __('Admin'), 'author' => __('Author')),
	    'selected' => !empty( $user['User']['role'] ) ? $user['User']['role'] : ''
	));
	echo $this->Form->end(__('Submit'));
?>
