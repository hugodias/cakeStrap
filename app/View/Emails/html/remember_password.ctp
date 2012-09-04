<h2><?php echo Configure::read('Application.name') ?></h2>

<p>For resetting your password, visit the link below: <?php echo $this->Html->link(__('Register new password'),'/users/remember_password_step_2/'.$hash) ?></p>

<p>If you did not request a new password, please ignore this email.</p>