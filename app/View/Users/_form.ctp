<div class="row">
  <div class="col-lg-4 col-lg-offset-4">
    <?php echo $this->Form->create('User');?>
    <div class="center">
      <h2><?php echo $label ?></h2>
    </div>

    <hr>
        <?php echo $this->Form->input('username',array(
            'value' => !empty( $user['username'] ) ? $user['username'] : ''));?>
      
        <?php echo $this->Form->input('email', array(
            'placeholder' => __('Email'),
            'value' => !empty( $user['email'] ) ? $user['email'] : ''));?>
     
        <?php echo $this->Form->input('password',array('value' => false));?>
      
        <?php echo $this->Form->input('role', array(
            'options' => array('admin' => __('Admin'), 'author' => __('Author')),
            'selected' => !empty( $user['role'] ) ? $user['role'] : ''));?>
      
        <?php echo $this->Form->end(__("Submit"));?>
  </div>
</div>
