<?php echo $this->Form->create('Install');?>
<div class="install">
	<h2><?php echo __('Step 4: Create Config'); ?></h2>

	<?php echo $this->Html->tag('legend','Meta Tags');?>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('keywords',array('helpText'=>__('Digite as palavras separadas por virgula ex: CakeStrap,CakePhp')));
		
	?>
	<?php echo $this->Html->tag('legend','Google');?>
	<?php echo $this->Form->input('analytics');?>
</div>
<div class="form-actions">
	<?php echo $this->Form->end(__('Save')); ?>
</div>

<?php $this->start('steps');?>
	<ul class="install-task-list">
		<li class="done">Check for restrictions</li>
		<li class="done">Create Database file</li>
		<li class="done">Build database</li>
		<li class="done">Create the initial user system</li>
		<li class="active">Create the configuration file</li>
	</ul>
<?php $this->end();?>