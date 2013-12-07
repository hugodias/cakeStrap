<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width">
	<title><?php echo $title_for_layout; ?> - <?php echo __('CakeStrap'); ?></title>
	<?php echo $this->Html->css(array('bootstrap.min','Install.global'));?>
</head>

<body>

	<div id="wrap" class="install">
		<header>
			<div class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="#" class="navbar-brand"><?php echo Configure::read('Application.name');?></a>
					</div>
				</div>
			</div>
		</header>

		<div class="container" role="main" id="main">

     		<?php echo $this->Session->flash();?>
      		<?php echo $this->fetch('content'); ?>
      		<hr>
       </div> <!-- /container -->

		<footer>
			<div class="container">
        		<p>&copy; <?php echo Configure::read('Application.name') ?> 2013</p>
			</div>
      </footer>

	</div><!-- /install -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo $this->params->webroot ?>js/lib/jquery.min.js"><\/script>')</script>
	<?php echo $this->Html->script(array('lib/bootstrap.min','src/scripts.js'));?>
	</body>
	</html>