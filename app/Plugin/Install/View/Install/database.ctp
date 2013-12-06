
<div class="install">
	<h2><?php echo $title_for_layout; ?></h2>
	<?php echo $this->Form->create('Install');?>
	<?php
		echo $this->CakeStrap->input('datasource', array(
			'default' => 'Database/Mysql',
			'options' => array(
				'Database/Mysql' => 'mysql',
				'Database/Sqlite' => 'sqlite',
				'Database/Postgres' => 'postgres',
				'Database/Sqlserver' => 'mssql',
			)
		));
		echo $this->CakeStrap->input('host', array('default' => 'localhost'));
		echo $this->CakeStrap->input('login', array('default' => 'root'));
		echo $this->CakeStrap->input('password');
		echo $this->CakeStrap->input('database', array('default' => 'cakestrap'));
		echo $this->CakeStrap->input('prefix');
		echo $this->CakeStrap->input('port');
	?>
</div>
<div class="form-actions">
	<?php echo $this->CakeStrap->end('Salvar'); ?>
</div>
