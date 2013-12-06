
<div class="install">
	<h2><?php echo $title_for_layout; ?></h2>
	<?php echo $this->Form->create('Install');?>
	<?php
		echo $this->CakeStrap->input('datasource', array(
			'placeholder' => __('Database'),
			'default' => 'Database/Mysql',
			'options' => array(
				'Database/Mysql' => 'mysql',
				'Database/Sqlite' => 'sqlite',
				'Database/Postgres' => 'postgres',
				'Database/Sqlserver' => 'mssql',
			),
		));
		echo $this->CakeStrap->input('host', array(
			'placeholder' => __('Host'),
			'default' => 'localhost',
			'tooltip' => __('Database hostname or IP Address'),
			'before' => '<span class="add-on"><i class="icon-home"></i></span>',
		));
		echo $this->CakeStrap->input('login', array(
			'placeholder' => __('Login'),
			'default' => 'root',
			'tooltip' => __('Database login/username'),
			'before' => '<span class="add-on"><i class="icon-user"></i></span>',
		));
		echo $this->CakeStrap->input('password', array(
			'placeholder' => __('Password'),
			'tooltip' => __('Database password'),
			'before' => '<span class="add-on"><i class="icon-key"></i></span>',
		));
		echo $this->CakeStrap->input('database', array(
			'placeholder' => __('Name'),
			'default' => 'croogo',
			'tooltip' => __('Database name'),
			'before' => '<span class="add-on"><i class="icon-briefcase"></i></span>',
		));
		echo $this->CakeStrap->input('prefix', array(
			'placeholder' => __('Prefix'),
			'tooltip' => __('Table prefix (leave blank if unknown)'),
			'before' => '<span class="add-on"><i class="icon-minus"></i></span>',
		));
		echo $this->CakeStrap->input('port', array(
			'placeholder' => __('Port'),
			'tooltip' => __('Database port (leave blank if unknown)'),
			'before' => '<span class="add-on"><i class="icon-asterisk"></i></span>',
		));
	?>
</div>
<div class="form-actions">
	<?php echo $this->CakeStrap->end('Salvar'); ?>
</div>
