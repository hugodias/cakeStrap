<?php  
echo $this->Form->create
(
	'User',
	array
	(
		'url' => array
		(
			'controller' => 'users',
			'action'	 => $action
		),
		'class'			=> 'well',
		'inputDefaults' => array
		(
			'label' => false,
			'error' => false
		)
	)
); 
?>		
<fieldset>
<legend><?php echo __($label); ?></legend>
<?php
echo $this->Form->input('username',
	array(
		'placeholder' => 'Username',
		'class' => 'span3',
		'value' => !empty( $user['User']['username'] ) ? $user['User']['username'] : ''
	)
);

echo $this->Form->input('password',
	array(
		'type' => 'password', 
		'class' => 'span3',
		'placeholder' => 'Password'
	)
);

echo $this->Form->input('role', array(
    'options' => array('admin' => 'Admin', 'author' => 'Author'),
    'selected' => !empty( $user['User']['role'] ) ? $user['User']['role'] : ''
));
?>
</fieldset>
<?php 
$options = array(
	'label' => __('Submit'),
	'class' => 'btn btn-primary'
);
echo $this->Form->end($options);?>