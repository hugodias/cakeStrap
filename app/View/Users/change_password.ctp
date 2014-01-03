<div class="row">
  <div class="col-lg-12">
    <h2><?php echo __('Change password') ?></h2>
    <hr>
    <?php echo $this->Form->create('User',array('url' => array(
          'controller' => 'users',
          'action'   => 'change_password')));?>
      <?php if (!empty($hash)) : ?>
        <?php echo $this->Form->input('hash',array('value' => $hash,'type' => 'hidden')); ?>
      <?php endif;?>
      <?php echo $this->Form->input('password',array('label' => __('New password')));?>
      <?php echo $this->Form->input('re_password',array('label' => __('Confirm new password')));?>
    <?php echo $this->Form->end(__('Change my password'),array('class' => 'btn-lg'));?>
  </div>
</div>

