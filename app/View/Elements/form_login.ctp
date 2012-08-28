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


echo $this->Form->input('username',array('placeholder' => __('Username'),'class' => 'span12'));
echo $this->Form->input('password',array('placeholder' => __('Password'),'type' => 'password', 'class' => 'span12'));

?> 
<button class="btn btn-primary"><i class="icon-play-circle icon-white"></i> Login</button> 
</form>