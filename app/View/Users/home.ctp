<div class="row-fluid">
	
	<div class="span12">
		<?php echo $this->Session->flash() ?>
		
		<h2><?php echo __('You are logged in') ?>, <strong><?php echo AuthComponent::user('username') ?></strong> </h2>
		<hr>
		<h3><?php echo __('All Users')?></h3>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th><?php echo __('Username') ?></th>
					<th><?php echo __('Role') ?></th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $users as $user ){ ?>
				<tr>
					<td width="50px"><?php echo $user['User']['id'] ?></td>
					<td><?php echo $user['User']['username'] ?></td>
					<td><?php echo $user['User']['role'] ?></td>
					<td width="150px">
						<?php echo $this->Html->link(__('View'),'/users/view/'.$user['User']['id']) ?> | 
						<?php echo $this->Html->link(__('Edit'),'/users/edit/'.$user['User']['id']) ?> |
						<?php echo $this->Html->link(__('Delete'),'/users/delete/'.$user['User']['id']) ?> 
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

</div>