<div class="row">
  <div class="col-lg-12">
    <h2><?php echo __('Change password') ?></h2>
    <hr>
    <?php
    echo $this->Form->create
    (
      'User',
      array
      (
        'url' => array
        (
          'controller' => 'users',
          'action'   => 'change_password'
        ),
        'class'     => '',
        'inputDefaults' => array
        (
          'label' => false,
          'error' => false
        )
      )
    );
    ?>
    <?php
    if( !empty($hash))
    {
      echo $this->Form->input('hash',array('value' => $hash,'type' => 'hidden'));
    }
    ?>
    <div class="form-group">
      <label for="UserPassword">New password</label>
      <?php echo $this->Form->input('password',
        array(
          'type' => 'password',
          'class' => 'form-control',
          'placeholder' => __('New password')
        )
      );?>
    </div>
    <div class="form-group">
      <label for="UserPassword">Confirm new password</label>
      <?php echo $this->Form->input('re_password',
        array(
          'type' => 'password',
          'class' => 'form-control',
          'placeholder' => __('Confirm new password')
        )
      );?>
    </div>
    <button type="submit" class="btn btn-primary btn-lg">Change my password</button>

  </div>
</div>

