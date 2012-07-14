<?php  
$breadcrumb = array(
	array(
		'label' => 'Users',
		'link'	=> '/users/home'
	),
	array(
		'label'	=> $user['User']['username']
	)
);
echo $this->element('breadcrumb',array('links' => $breadcrumb)); 
?>	


<h3><?php echo $user['User']['username'] ?></h3>
<hr>
<strong>Username: </strong><?php echo $user['User']['username'] ?><br/>
<strong>Role: </strong><?php echo $user['User']['role'] ?>