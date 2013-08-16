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
		'class'			=> 'form-signin center',
		'inputDefaults' => array
		(
			'label' => false,
			'error' => false
		)
	)
);?>

<h2 class="form-signin-heading"><?php echo Configure::read('Application.name') ?></h2>

<?php echo $this->Form->input('username',array('placeholder' => __('Username or Email'),'class' => 'form-control', 'autofocus')); ?>
<?php echo $this->Form->input('password', array('placeholder' => __('Password'),'type' => 'password', 'class' => 'form-control')) ?>

  <button class="btn btn-large btn-primary btn-block" type="submit">Login</button>
</form>
