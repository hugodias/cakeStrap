<?php echo $this->CakeStrap->create('Install');?>
<div class="install">
	<h2><?php echo __('Step 4: Create Config'); ?></h2>

	<?php echo $this->CakeStrap->tag('legend','Meta Tags');?>
	<?php
		echo $this->CakeStrap->input('title');
		echo $this->CakeStrap->input('description');
		echo $this->CakeStrap->input('keywords',array('helpText'=>'Digite as palavras separadas por virgula ex: CakeStrap,CakePhp'));
		
	?>
	<?php echo $this->CakeStrap->tag('legend','Google');?>
	<?php echo $this->CakeStrap->input('analytics');?>
</div>
<div class="form-actions">
	<?php echo $this->CakeStrap->end(__('Save')); ?>
</div>
