<h2><?php echo __('Change password') ?></h2>
<?php  
echo $this->Form->create
(
	'User',
	array
	(
		'url' => array
		(
			'controller' => 'users',
			'action'	 => 'change_password'
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
<?php

if( !empty($hash))
{
	echo $this->Form->input('hash',array('value' => $hash,'type' => 'hidden'));
}

echo $this->Form->input('password',
	array(
		'type' => 'password', 
		'class' => 'span3',
		'placeholder' => __('New password')
	)
);

echo $this->Form->input('re_password',
	array(
		'type' => 'password', 
		'class' => 'span3',
		'placeholder' => __('Confirm new password')
	)
);

?>
</fieldset>
<?php 
$options = array(
	'label' => __('Submit'),
	'class' => 'btn btn-primary'
);
echo $this->Form->end($options);?>