
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
<?php $this->start('steps');?>
	<ul class="install-task-list">
		<li class="done">Check for restrictions</li>
		<li class="active">Create Database file</li>
		<li>Build database</li>
		<li>Create the initial user system</li>
		<li>Create the configuration file</li>
	</ul>
<?php $this->end();?>