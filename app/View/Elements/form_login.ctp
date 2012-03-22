<?php
echo $this->Form->create
(
	'User',
	array
	(
		'url' => array
		(
			'controller' => 'users',
			'action'	 => 'login'
		),
		'class'			=> 'well',
		'inputDefaults' => array
		(
			'label' => false,
			'error' => false
		)
	)
); 


echo $this->Form->input('username',array('placeholder' => 'Username','class' => 'span3'));
echo $this->Form->input('password',array('type' => 'password', 'class' => 'span3'));

echo $this->Form->end(array('label' => 'Login','class' => 'btn btn-primary'))
?>