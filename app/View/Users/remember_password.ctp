<div class="row">
	<div class="col-lg-12">
	<?php echo $this->Form->create('User',array('url' => array(
				'controller' => 'users',
				'action'	 => 'remember_password')));?>
				
		<h2><?php echo __('Forgot your password?') ?></h2>
		<hr>
		<?php echo $this->Html->tag('p',__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua.'));?>
	    <?php echo $this->Form->input('email',array(
										    		'placeholder' => __('E-mail'),
										    		'label' => __('Email address'),
										    		'class' => 'email-field')); ?>
		<?php echo $this->Form->end(__('Next step'),array('class' => 'btn-lg'));?>
	</div>
</div>
