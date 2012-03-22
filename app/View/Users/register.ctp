<h2>Register</h2>
<hr>
<div class="row-fluid">
	<div class="span4">
		<?php
		echo $this->Form->create
		(
			'User',
			array
			(
				'url' => array
				(
					'controller' => 'users',
					'action'	 => 'register'
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

		echo $this->Form->end(array('label' => 'Register','class' => 'btn btn-primary'))
		?>		
	</div>
</div>
