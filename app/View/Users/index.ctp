<div class="row">
  <div class="col-lg-10"><h3><?php echo __('Users')?></h3></div>
  <div class="col-lg-2">
    <?php echo $this->Html->link(__('Add User'),'/users/add',array('class' => 'btn btn-default pull-right','style' => 'margin-top: 15px')) ?>
  </div>
</div>

<div class="row">

	<div class="col-12">
		<?php echo $this->Session->flash() ?>

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
            <?php echo $this->Html->link(__('View'),'/users/view/'.$user['User']['username']) ?> |
            <?php echo $this->Html->link(__('Edit'),'/users/edit/'.$user['User']['id']) ?> |
            <?php echo $this->Html->link(
              __('Delete'),
              '#UsersModal',
              array(
                'class' => 'btn-remove-modal',
                'data-toggle' => 'modal',
                'role'  => 'button',
                'data-uid' => $user['User']['id'],
                'data-uname' => $user['User']['username']
              ));
            ?>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>


<div class="modal fade" id="UsersModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 id="myModalLabel"><?php echo __('Remove user') ?></h4>
      </div>
      <div class="modal-body">
        <p><?php echo __('Are you sure you want to delete the user ') ?><span class="label-uname strong"></span> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel') ?></button>
        <?php echo $this->Html->link(__('Delete'),'/users/delete/#{uid}',array('class' => 'btn btn-danger delete-user-link')) ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
