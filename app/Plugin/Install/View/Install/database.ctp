
<div class="install">
	<h2><?php echo $title_for_layout; ?></h2>
	<?php echo $this->Form->create('Install');?>
	<?php
		echo $this->Form->input('datasource', array(
			'default' => 'Database/Mysql',
			'options' => array(
				'Database/Mysql' => 'mysql',
				'Database/Sqlite' => 'sqlite',
				'Database/Postgres' => 'postgres',
				'Database/Sqlserver' => 'mssql',
			)
		));
		echo $this->Form->input('host', array('default' => 'localhost'));
		echo $this->Form->input('login', array('default' => 'root'));
		echo $this->Form->input('password');
		echo $this->Form->input('database', array('default' => 'cakestrap'));
		echo $this->Form->input('prefix');
		echo $this->Form->input('port');
	?>
</div>
<div class="form-actions">
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
