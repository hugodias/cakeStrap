<div class="row-fluid">
	<div class="hero-unit">
		<div class="row-fluid">
			<div class="span8">
			<h1><?php echo Configure::read('Application.name') ?> v 0.3</h1>	
			<hr>
			<h3>Features</h3>
			<ul>
				<li>
					<strong>Front-end</strong>
					<ul>
						<li> <i class="icon-ok"></i> <a href="http://html5boilerplate.com/" target="_blank">HTML5 Boilerplate</a> </li>
						<li> <i class="icon-ok"></i> <a href="http://twitter.github.com/bootstrap/" target="_blank"> Twitter Bootsrap 2.1.0</a> </li>
						<li> <i class="icon-ok"></i> <a href="http://www.modernizr.com/" target="_blank"> Modernizr</a> </li>						
					</ul>
				</li>
				<li>
					<strong>Back-end</strong>
					<ul>
						<li> <i class="icon-ok"></i> <a href="http://cakephp.org/" target="_blank">CakePHP</a> 2.2.0 Security Login</li>
						<li> <i class="icon-ok"></i> Users <a href="http://en.wikipedia.org/wiki/Crud" target="_blank">CRUD</a></li>		
					</ul>
				</li>

			</ul>
			<hr>
			<h3> Ready Scripts </h3>
			<div class="checkjs">
				Loading scripts...<br/><br/>
			</div>

			</div>
			<div class="span4">
				<h3>Login</h3>
				<hr>
				<?php echo $this->element('form_login') ?>
			</div>		

		</div>

		
		
	</div>
</div>