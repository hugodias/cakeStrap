<?php echo $this->Form->create('Install');?>
<div class="install">
	<h2><?php echo __('Step 4: Create Config'); ?></h2>

	<?php echo $this->Form->tag('legend','Meta Tags');?>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('keywords',array('helpText'=>__('Digite as palavras separadas por virgula ex: CakeStrap,CakePhp')));
		
	?>
	<?php echo $this->Form->tag('legend','Google');?>
	<?php echo $this->Form->input('analytics');?>
</div>
<div class="form-actions">
	<?php echo $this->Form->end(__('Save')); ?>
</div>
