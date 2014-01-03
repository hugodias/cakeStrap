<?php
$breadcrumb = array(
	array(
		'label' => 'Users',
		'link'	=> '/users'
	),
	array(
		'label'	=> $user['username']
	)
);
echo $this->element('breadcrumb',array('links' => $breadcrumb));
?>

<h3><?php echo $user['username'] ?></h3>
<hr>
<div class="media">
  <a class="pull-left" href="#">
  	<img class="media-object" src="https://secure.gravatar.com/avatar/<?php echo md5($user['email']) ?>?s=80&d=mm">
  </a>
  <div class="media-body">
    <h4 class="media-heading"><?php echo $user['username'] ?></h4>
    <strong>Email: </strong><?php echo $user['email'] ?><br/>
	<strong>Role: </strong><?php echo $user['role'] ?>
  </div>
</div>
