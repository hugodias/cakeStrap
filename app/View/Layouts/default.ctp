<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>CakeStrap v0.2</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">
	<style>
	body {
	  padding-top: 60px;
	  padding-bottom: 40px;
	}
	</style>
	<?php echo $this->Html->css('bootstrap.min') ?>
	<?php echo $this->Html->css('style') ?>
</head>
<body>
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <?php echo $this->Html->link( Configure::read('Application.name') ,"/",array('class' => 'brand')) ?>
          <div class="nav-collapse">
            <ul class="nav">
              <?php if( AuthComponent::user('id') ) { ?>
              <li class="<?php echo $this->params->controller == 'users' && $this->action == 'home' ? 'active' : '';  ?>">
                <?php echo $this->Html->link('Home','/users/home') ?>
              </li>
              <?php } ?>
              <li class="<?php echo $this->action == 'register' ? 'active' : ''; ?>">
                <?php echo $this->Html->link(__('Register'),'/users/register') ?>
              </li>

              
            </ul>
            <ul class="nav pull-right">
              <?php if( AuthComponent::user('id') ) { ?>
                <li><?php echo $this->Html->link('Logout','/users/logout') ?></li>
              <?php } ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container" role="main" id="main">

      <?php echo $this->Session->flash();?>
    	<?php echo $this->fetch('content'); ?>

      <hr>

      <footer>
        <p>&copy; <?php echo Configure::read('Application.name') ?> 2012</p>
      </footer>

    </div> <!-- /container -->


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo $this->params->webroot ?>js/lib/jquery-1.7.2.min.js"><\/script>')</script>

    <?php echo $this->Html->script(
      array(
        'lib/modernizr',
        'lib/bootstrap.min',
        'src/scripts.js'
      ));
      ?>

    <script>
    	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    	s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>

</body>
</html>
