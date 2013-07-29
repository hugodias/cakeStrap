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
		'class'			=> 'form-horizontal form-signin',
		'inputDefaults' => array
		(
			'label' => false,
			'error' => false
		)
	)
);
?>
<h2 class="form-signin-heading"> <?php echo $label ?></h2>
<?php
echo $this->Form->input('username',
	array(
		'placeholder' => __('Username'),
		'class' => 'form-control',
		'value' => !empty( $user['User']['username'] ) ? $user['User']['username'] : ''
	)
);
echo $this->Form->input('email',
	array(
		'type' => 'text',
		'class' => 'form-control',
		'placeholder' => __('Email')
	)
);

echo $this->Form->input('password',
	array(
		'type' => 'password',
		'class' => 'form-control',
		'placeholder' => __('Password')
	)
);



echo $this->Form->input('role', array(
    'options' => array('admin' => __('Admin'), 'author' => __('Author')),
    'class' => 'form-control',
    'selected' => !empty( $user['User']['role'] ) ? $user['User']['role'] : ''
));
?>

<?php
$options = array(
	'label' => __('Submit'),
	'class' => 'btn btn-primary'
);
echo $this->Form->end($options);?>
