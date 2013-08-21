<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo Configure::read('Application.name') ?> - <?php echo !empty($title_for_layout) ? $title_for_layout : ''; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <style>
    body {
      padding-top: 60px;
      padding-bottom: 40px;
    }
    </style>
    <?php echo $this->Html->css('bootstrap.min') ?>
    <?php echo $this->Html->css('style') ?>

    <?php
    if (is_file(WWW_ROOT . 'css' . DS . $this->params->controller . '.css')) {
    echo $this->Html->css($this->params->controller);
    }
    if (is_file(WWW_ROOT . 'css' . DS . $this->params->controller . DS . $this->params->action . '.css')) {
    echo $this->Html->css($this->params->controller . '/' . $this->params->action);
    }
    ?>
    <?php echo $this->Html->script('lib/modernizr') ?>
  </head>
  <body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->


    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link(
          Configure::read('Application.name') ,
          AuthComponent::user('id') ? "/home" : "/"
          ,array('class' => 'navbar-brand')) ?>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php if( AuthComponent::user('id') ) { ?>
            <li class="<?php echo $this->params->controller == 'pages' && $this->action == 'index' ? 'active' : '';  ?>">
              <?php echo $this->Html->link('Home','/home') ?>
            </li>
            <?php } ?>
            <?php if( AuthComponent::user('role') == 'admin' ) { ?>
            <li class="<?php echo $this->params->controller == 'users' ? 'active' : '';  ?>">
              <?php echo $this->Html->link('Users','/users') ?>
            </li>
            <?php } ?>
            <li class="<?php echo $this->params->controller == 'users' && $this->params->action == 'add' ? 'active' : '' ?>">
              <?php echo $this->Html->link(__('Register'), array('controller' => 'users', 'action' => 'add')) ?>
            </li>
          </ul>

          <?php if( AuthComponent::user('id') ) { ?>
          <ul class="nav navbar-nav navbar-right">
            <li id="fat-menu" class="dropdown">
              <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-black icon-user"></i>
                <?php echo AuthComponent::user('username') ?> <b class="caret"></b>
              </a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                <li>
                  <?php echo $this->Html->link('<i class="icon-black icon-off"></i> Logout','/users/logout',array('tabindex' => '-1','escape' => false)) ?>
                </li>
              </ul>
            </li>
          </ul>
          <?php } ?>
        </div><!--/.nav-collapse -->
      </div>
    </div>



    <div class="container" role="main" id="main">

      <?php echo $this->Session->flash();?>
      <?php echo $this->fetch('content'); ?>

      <hr>

      <footer>
        <p>&copy; <?php echo Configure::read('Application.name') ?> 2013</p>
      </footer>

    </div> <!-- /container -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo $this->params->webroot ?>js/lib/jquery.min.js"><\/script>')</script>

    <?php
    if (is_file(WWW_ROOT . 'js' . DS . $this->params->controller . '.js')) {
    echo $this->Html->script($this->params->controller);
    }
    if (is_file(WWW_ROOT . 'js' . DS . $this->params->controller . DS . $this->params->action . '.js')) {
    echo $this->Html->script($this->params->controller . '/' . $this->params->action);
    }
    ?>

    <?php echo $this->Html->script(
      array(
        'lib/bootstrap.min',
        'src/scripts.js'
        ));
        ?>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
  </body>
</html>
