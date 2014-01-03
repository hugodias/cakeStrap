<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width">
	<title><?php echo $title_for_layout; ?> - <?php echo __('CakeStrap'); ?></title>
	<?php echo $this->Html->css(array('bootstrap.min','Install.global'));?>
</head>

<body>
	<div class="body-wrapper">
		<div class="page-outer">
			<div id="page">
				<div id="main">
					<header class="branding">
						<h2><?php echo Configure::read('Application.name') ?> </h2>
					</header>
					<section class="container page-wrapper clearfix" role="main">
			     		<?php echo $this->Session->flash();?>
			     		<div class="sidebar-first">
			     			<?php echo $this->fetch('steps') ?>
			     		</div>
			     		<div class="content">
			      			<?php echo $this->fetch('content'); ?>
			     		</div>
			        </section> <!-- /container -->

					<footer>
						<hr>
			        	<p>&copy; <?php echo Configure::read('Application.name') ?> 2013</p>
			      	</footer>
				</div><!-- /install -->
			</div>
		</div>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo $this->params->webroot ?>js/lib/jquery.min.js"><\/script>')</script>
	<?php echo $this->Html->script(array('lib/bootstrap.min','src/scripts.js'));?>
</body>
</html>