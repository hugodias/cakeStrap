<div class="row">
  <div class="col-lg-4 col-lg-offset-4">
    <?php
    echo $this->Form->create
    (
      'User',
      array
      (
        'class'     => '',
        'inputDefaults' => array
        (
          'error' => false
        )
      )
    );
    ?>
    <div class="center">
      <h2><?php echo $label ?></h2>
    </div>

    <hr>
      <div class="form-group">
        <?php
        echo $this->Form->input('username',
          array(
            'placeholder' => __('Username'),
            'class' => 'form-control',
            'value' => !empty( $user['User']['username'] ) ? $user['User']['username'] : ''
          )
        );
        ?>
      </div>
      <div class="form-group">
        <?php
        echo $this->Form->input('email',
          array(
            'type' => 'email',
            'class' => 'form-control',
            'placeholder' => __('Email'),
            'value' => !empty( $user['User']['email'] ) ? $user['User']['email'] : ''
          )
        );
        ?>
      </div>
      <div class="form-group">
        <?php
        echo $this->Form->input('password',
          array(
            'type' => 'password',
            'class' => 'form-control',
            'placeholder' => __('Password'),
            'value' => false
          )
        );
        ?>
      </div>
      <div class="form-group">
        <?php
        echo $this->Form->input('role', array(
            'options' => array('admin' => __('Admin'), 'author' => __('Author')),
            'class' => 'form-control',
            'selected' => !empty( $user['User']['role'] ) ? $user['User']['role'] : ''
        ));
        ?>
      </div>
      <button type="submit" class="btn btn-default"><?php echo __("Submit") ?></button>
    </form>


  </div>
</div>
