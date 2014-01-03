<div class="index install">
	<h2><?php echo $title_for_layout; ?></h2>
	<?php
	$check = true;

		// tmp is writable
	if (is_writable(TMP)) {
		echo '<p class="btn btn-success btn-lg btn-block"><span class="glyphicon  glyphicon-ok"></span> ' . __('Your tmp directory is writable.') . '</p>';
	} else {
		$check = false;
		echo '<p class="btn btn-danger btn-lg btn-block">' . __('Your tmp directory is NOT writable.') . '</p>';
	}

		// config is writable
	if (is_writable(APP . 'Config')) {
		echo '<p class="btn btn-success btn-lg btn-block"><span class="glyphicon  glyphicon-ok"></span> ' . __('Your config directory is writable.') . '</p>';
	} else {
		$check = false;
		echo '<p class="btn btn-danger btn-lg btn-block">' . __('Your config directory is NOT writable.') . '</p>';
	}


		// php version
	$minPhpVersion = '5.2.8';
	$operator = '>=';
	if (version_compare(phpversion(), $minPhpVersion, $operator)) {
		echo '<p class="btn btn-success btn-lg btn-block"><span class="glyphicon  glyphicon-ok"></span> ' . sprintf(__('PHP version %s %s %s'), phpversion(), $operator, $minPhpVersion) . '</p>';
	} else {
		$check = false;
		echo '<p class="btn btn-danger btn-lg btn-block">' . sprintf(__('PHP version %s < %s'), phpversion(), $minPhpVersion) . '</p>';
	}

		// cakephp version
	$minCakeVersion = '2.4.0';
	$cakeVersion = Configure::version();
	$operator = '>';
	if (version_compare($cakeVersion, $minCakeVersion, $operator)) {
		echo '<p class="btn btn-success btn-lg btn-block"><span class="glyphicon  glyphicon-ok"></span> ' . __('CakePhp version %s %s %s', $cakeVersion, $operator, $minCakeVersion) . '</p>';
	} else {
		$check = false;
		echo '<p class="btn btn-danger btn-lg btn-block">' . __('CakePHP version %s < %s', $cakeVersion, $minCakeVersion) . '</p>';
	}

	?>
</div>
<div class="form-actions form-group">
	<?php if ($check): ?>
		<?php echo $this->Html->link(__('Install'), array('action' => 'database'), array('class' => 'btn btn-primary')); ?>
	<?php else: ?>
		<?php echo $this->Html->tag('p',__('Installation cannot continue as minimum requirements are not met.'));?>
	<?php endif;?>
</div>

<?php $this->start('steps');?>
	<ul class="install-task-list">
		<li class="active">Check for restrictions</li>
		<li>Create Database file</li>
		<li>Build database</li>
		<li>Create the initial user system</li>
		<li>Create the configuration file</li>
	</ul>
<?php $this->end();?>
